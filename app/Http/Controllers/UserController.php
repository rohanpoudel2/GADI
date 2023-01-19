<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        try {
            $users = User::where('is_admin', 0)->get();
            return view('dashboard.showDataTable', compact('users'));
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            return view('dashboard.showDataTable', compact('users'));
        }
    }

    public function create()
    {
        return view('dashboard.addNew');
    }

    public function destroy(Request $request)
    {
        try {
            $request->validate(['id' => 'required|integer',]);

            $user = User::find($request->id);
            if ($user) {
                $user->delete();
                return redirect()->route('dashboard')->with('success', 'User has been destroyed.');
            } else {
                return redirect()->route('dashboard')->with('error', 'User Not Found');
            }
        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->with('error', $th->getMessage());
        }

    }
}