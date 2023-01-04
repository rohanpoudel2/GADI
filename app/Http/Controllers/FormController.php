<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class FormController extends Controller
{
  public function testRideForm(Request $request)
  {

    $data = $request->input();

    $validator = Validator::make($data, [
      'name' => 'required|string',
      'email' => 'required|email',
      'model' => 'required|string|exists:cars,name'
    ]);

    if ($validator->fails()) {
      return redirect('/error')
        ->withErrors($validator)
        ->withInput();
    }

    DB::table('test_rides')->insert([
      'name' => $data['name'],
      'email' => $data['email'],
      'model' => $data['model'],
      'test_ride_date' => DB::raw('DATE_ADD(CURDATE(), INTERVAL 15 DAY)'),
    ]);

    return redirect('/');

  }
}