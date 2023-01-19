<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->get();

        return view('wishList', compact('wishlist'));
    }

    public function create(Request $request)
    {
        try {
            $data = $request->validate([
                'car_id' => 'required|exists:cars,id'
            ]);
            $user = Auth::user();
            $wishlist = $user->wishlists()->create($data);

            return redirect()->route('wishlist.show')->with('success', '👍🏼 Car Added to wishlist');

        } catch (\Throwable $th) {
            return redirect()->route('wishlist.show')->with('error', '👎🏻 ' . $th->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $data = $request->validate([
                'id' => 'required|exists:wishlists,id'
            ]);

            $wishlist = Wishlist::find($request->id);

            $wishlist->delete();

            return redirect()->route('wishlist.show')->with('success', '👍🏼 Car Deleted from wishlist');


        } catch (\Throwable $th) {
            return redirect()->route('wishlist.show')->with('error', '👎🏻 ' . $th->getMessage());
        }
    }
}