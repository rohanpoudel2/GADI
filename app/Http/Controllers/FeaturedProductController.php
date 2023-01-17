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
        if ($featuredCount != 0) {
            $featured = FeaturedProduct::with('car')->get();
            return view('home', compact('featured'));
        } else {
            return view('home');
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
}