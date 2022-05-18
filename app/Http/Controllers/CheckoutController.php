<?php

namespace App\Http\Controllers;

use Stripe;

use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    public function checkout() {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

		$amount = 55.5; //price
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'AED',
			'description' => 'Payment From All About Laravel',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

        return view('user.checkout')->with(['intent' => $intent]);

    }

    public function afterPayment()
    {
        echo 'Payment Received, Thanks you for using our services.';
    }
}