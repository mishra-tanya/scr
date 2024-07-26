<?php

namespace App\Services;

use Razorpay\Api\Api;

class RazorpayService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
    }
    public function createOrder($amount, $currency = 'INR')
    {
        return $this->api->order->create([
            'amount' => 1 * 100,
            'currency' => $currency,
            'payment_capture' => 1,
        ]);
    }

    public function fetchPayment($paymentId)
    {
        return $this->api->payment->fetch($paymentId);
    }
}
