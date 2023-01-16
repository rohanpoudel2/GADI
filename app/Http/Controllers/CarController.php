<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        //
        if($request->route()->getName() == "dashboard.showCars")
        {
            $cars = Car::with('brand')->get();
            return view('dashboard.showDataTable',compact('cars'));
        }
        else
        {
            $cars = Car::with('brand')->get(5)->paginate(5);
            return view('shop', compact('cars'));
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $brands = Brand::get();
        return view('dashboard.addNew',compact('brands'));
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
        
        $data = $request->validate([
            'brand' => 'required|integer|exists:brands,id',
            'type' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'engine' => 'required|string',
            'power' => 'required|integer',
            'topspeed' => 'required|integer',
            'interior' => 'required|string',
            'transmission' => 'required|string',
            'description' => 'required|string|max:2000',
            'price' => 'required|numeric',
        ]);

        $path = $request->file('image')->store('public/images');
        $data['image']=$path;
        $brand = Brand::findOrFail($data['brand']);
        $car = $brand->cars()->create($data);

        return redirect()->route('dashboard')->with('success', 'Car has been added.');
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