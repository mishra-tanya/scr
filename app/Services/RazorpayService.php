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
        try {
            $order = $this->api->order->create([
                'amount' => $amount * 100,
                'currency' => $currency,
                'payment_capture' => 1,
            ]);
            return $order;
        } catch (\Exception $e) {
            dd($e->getMessage()); // Print the error message for debugging
        }
    }

    public function fetchPayment($paymentId)
    {
        return $this->api->payment->fetch($paymentId);
    }
}
