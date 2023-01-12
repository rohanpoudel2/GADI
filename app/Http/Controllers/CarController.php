<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        //
        $cars = Car::with('brand')->paginate(5);
        return view('shop', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('dashboard.addNew');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'brand_id' => 'required|integer|exists:brands,id',
            'type' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'engine' => 'required|string',
            'power' => 'required|integer',
            'topspeed' => 'required|integer',
            'interior' => 'required|string',
            'transmission' => 'required|string',
            'description' => 'required|string|min:100|max:2000',
            'colors' => 'required|string',
            'price' => 'required|float',
        ]);

        $path = $request->file('image')->store('public/images');
        $data['image'] = $path;
        $brand = Brand::find($data['brand_id']);
        $brand->cars()->create($data);

        return redirect()->back()->with('success', 'Car had been added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}