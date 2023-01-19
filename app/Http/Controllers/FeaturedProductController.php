<?php

namespace App\Http\Controllers;

use App\Models\FeaturedProduct;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Car;

class FeaturedProductController extends Controller
{
    public function index(Request $request): View
    {
        $featuredCount = FeaturedProduct::get()->count();
        $successPayment = $request->input('successPayment');
        $failedPayment = $request->input('failedPayment');

        if ($featuredCount != 0) {
            $featured = FeaturedProduct::with('car')->get();
            if ($successPayment) {
                return view('home', compact('featured'))->with('success', 'Payment Successful');
            } elseif ($failedPayment) {
                return view('home', compact('featured'))->with('error', 'Payment failed');
            } else {
                return view('home', compact('featured'));
            }
        } else {
            if ($successPayment) {
                return view('home')->with('success', 'Payment Successful');
            } elseif ($failedPayment) {
                return view('home')->with('error', 'Payment failed');
            } else {
                return view('home');
            }
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'featured' => 'required|integer|exists:cars,id',
                'tagline' => 'required|string|max:500',
            ]);

            $car = Car::findOrFail($request->featured);
            $featured = $car->featuredproduct()->create($data);

            return redirect()->route('dashboard')->with('success', 'Featured Product Added 👍🏼');

        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->with('error', $th->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $data = $request->validate([
                'id' => 'required|integer|exists:featured_products,id'
            ]);

            FeaturedProduct::find($request->id)->delete();

            return redirect()->route('dashboard')->with('success', 'Featured Product Deleted 👍🏼');

        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->with('error', $th->getMessage());
        }
    }
}