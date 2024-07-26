<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB; 
use Ixudra\Curl\Facades\Curl;
use App\Models\Reg_User;

class PhonePeController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $user = Auth::user();
        $transactionId = uniqid(); 
        $userId=$user->id;
// dd($userId);
        DB::table('transactions')->insert([
            'transaction_id' => $transactionId,
            'user_id' => $userId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $data = array (
            'merchantId' => env('PHONEPE_MERCHANT_ID'),
            'merchantTransactionId' => $transactionId,
            'merchantUserId' => 'MUID123',
            'amount' => 100,
            'redirectUrl' => route('phonepe.callback'),
            'redirectMode' => 'POST',
            'callbackUrl' => route('phonepe.callback'),
            // 'mobileNumber' => '9999999999',
            'paymentInstrument' => 
            array (
            'type' => 'PAY_PAGE',
            ),
        );
        $encode = base64_encode(json_encode($data));

        $saltKey = env('PHONEPE_API_KEY');
        $saltIndex = 1;

        $string = $encode.'/pg/v1/pay'.$saltKey;
        $sha256 = hash('sha256',$string);

        $finalXHeader = $sha256.'###'.$saltIndex;

        $url = "https://api.phonepe.com/apis/hermes/pg/v1/pay";
        $response = Curl::to($url)
                ->withHeader('Content-Type:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withData(json_encode(['request' => $encode]))
                ->post();

        // dd($response);
        $rData = json_decode($response);

        return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
    }

    public function handleCallback(Request $request)
    {
        $input = $request->all();
        $saltKey = env('PHONEPE_API_KEY');
        $saltIndex = 1;

        $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;

        $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/pay/status/'.$input['merchantId'].'/'.$input['transactionId'])
                ->withHeader('Content-Type:application/json')
                ->withHeader('accept:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
                ->get();

                $responseData = json_decode($response);
                // dd($responseData);

                if ($responseData->data->responseCode == 'SUCCESS') {
                    $transaction = DB::table('transactions')
                    ->where('transaction_id', $input['transactionId'])
                    ->first();
        
                if ($transaction) {
                    $user = Reg_User::find($transaction->user_id);
                    
                    if ($user) {
                        $user->payment_status = 1;
                        $user->payment_id = $input['transactionId'];
                        $user->save();
                    }
        
                    // DB::table('transactions')->where('transaction_id', $input['transactionId'])->delete();
                }
                return redirect()->route('payment.success')->with('status', 'Payment successful!');

                }
        return redirect()->route('payment.failed')->with('status', 'Payment failed!');
    }
}
