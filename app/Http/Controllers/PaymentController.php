<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function index($id)
    {
        try {
            $car = Car::findOrFail($id);
            return view('checkout', compact('car'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function checkout($id)
    {
        try {
            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            $user = Auth::user();
            $car = Car::findOrFail($id);

            $carName = $car->model;
            $carBrandName = $car->brand->name;
            $carId = $car->id;

            $userID = $user->id;
            $userEmail = $user->email;

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $carBrandName . " " . $carName
                            ],
                            'unit_amount' => $car->price,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('featured.car', ['successPayment' => "👍🏼 Payment Successful"]),
                'cancel_url' => route('featured.car', ['failedPayment' => '👎🏻 Payment Failed']),
                'metadata' => [
                    'user_id' => $userID,
                    'email' => $userEmail,
                ],
            ]);

            // $payment = new Payment;
            // $payment->transaction_id = $paymentIntent->id;
            // $payment->user_id = $user->id;
            // $payment->car_id = $car->id;
            // $payment->amount = $paymentIntent->amount;
            // $payment->status = true;
            // $payment->save();

            return redirect()->away($session->url);
        } catch (\Throwable $th) {
            return redirect()->route('featured.car')->with('error', '👎🏻' . $th->getMessage());
        }

    }
}