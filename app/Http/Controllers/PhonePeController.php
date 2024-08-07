<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\Models\Reg_User;

class PhonePeController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $user = Auth::user();
        $transactionId = uniqid(); 
        $userId = $user->id;

        DB::table('transactions')->insert([
            'transaction_id' => $transactionId,
            'user_id' => $userId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $data = [
            'merchantId' => env('PHONEPE_MERCHANT_ID'),
            'merchantTransactionId' => $transactionId,
            'merchantUserId' => 'MUID123',
            'amount' => 4000*100,
            'redirectUrl' => route('phonepe.callback'),
            'redirectMode' => 'POST',
            'callbackUrl' => route('phonepe.callback'),
            'paymentInstrument' => [
                'type' => 'PAY_PAGE',
            ],
        ];
        $encode = base64_encode(json_encode($data));

        $saltKey = env('PHONEPE_API_KEY');
        $saltIndex = 1;

        $string = $encode . '/pg/v1/pay' . $saltKey;
        $sha256 = hash('sha256', $string);

        $finalXHeader = $sha256 . '###' . $saltIndex;

        $url = "https://api.phonepe.com/apis/hermes/pg/v1/pay";
        $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-VERIFY' => $finalXHeader
            ])
            ->post($url, ['request' => $encode]);
        $rData = $response->json();
        // dd($rData);

        return redirect()->to($rData['data']['instrumentResponse']['redirectInfo']['url']);
    }

    public function handleCallback(Request $request)
    {
        // dd($request);
        $input = $request->all();
      
        // dd($input);
        if ($input['code'] == 'PAYMENT_SUCCESS') {
            $transaction = DB::table('transactions')
                ->where('transaction_id', $input['transactionId'])
                ->first();
    
            if ($transaction) {
                $user = Reg_User::find($transaction->user_id);
                
                if ($user) {
                    $user->payment_status = 1;
                    $user->payment_id = $input['providerReferenceId'];
                    $user->save();
                }
    
                // DB::table('transactions')->where('transaction_id', $input['transactionId'])->delete();
            }
            return redirect()->route('payment.success')->with('status', 'Payment successful!');
        }

        return redirect()->route('payment.failed')->with('status', 'Payment failed!');
    }
}
