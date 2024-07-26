<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Services\RazorpayService;
use App\Models\Reg_User;

class PaymentIntegrationController extends Controller
{
    protected $razorpayService;

    public function __construct(RazorpayService $razorpayService)
    {
        $this->razorpayService = $razorpayService;
    }

    public function initiatePayment(Request $request)
    {
        $order = $this->razorpayService->createOrder($request->amount);

        return view('payment.payment_order', [
            'order' => $order,
            'razorpayKey' => env('RAZORPAY_KEY_ID'),
        ]);
    }

    public function handlePayment(Request $request)
    { 
        $request->validate([
        'razorpay_payment_id' => 'required|string',
        'user_email' => 'required|email|exists:reg_users,email', 
        ]);
        // $user=Auth::user();
        $userEmail = $request->input('user_email');
        $paymentId = $request->input('razorpay_payment_id');
        $payment = $this->razorpayService->fetchPayment($paymentId);

        if ($payment->status == 'captured') {
            $user = Reg_User::where('email', $userEmail)->first();
            if ($user) {
                $user->payment_status = 1;
                $user->payment_id = $paymentId;
                $user->save();
    
                return redirect()->route('payment.success');
            } 
        }

        return redirect()->route('payment.failed');
    }
}
