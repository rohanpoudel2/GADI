<?php

namespace App\Http\Controllers;

use App\Models\TestRide;
use Illuminate\Http\Request;

class TestRideController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'car_id' => 'required|integer|exists:cars,id',
                'name' => 'required|string|max:256',
                'email' => 'required|email',
            ]);

            if (!isset($data['booking_date'])) {
                $data['booking_date'] = date('Y-m-d', strtotime("+15 days"));
            }


            $testRide = TestRide::create($data);

            return redirect()->route('featured.car')->with('success', 'Test Ride Confirmed for 15 Days from now 👍🏼');
        } catch (\Throwable $th) {
            return redirect()->route('featured.car')->with('error', '👎🏻' . $th->getMessage());
        }

    }
}