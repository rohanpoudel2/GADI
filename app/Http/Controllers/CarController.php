<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Providers\CountServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Pagination\Paginator;

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
        if ($request->route()->getName() == "dashboard.showCars") {
            $cars = Car::with('brand')->get();
            return view('dashboard.showDataTable', compact('cars'));
        } else {
            $cars = Car::with('brand')->paginate(5);
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
        return view('dashboard.addNew', compact('brands'));
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
        $data['image'] = $path;
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
    public function edit(Request $request): View|RedirectResponse
    {
        //
        $request->validate(['id' => 'required|integer']);
        $car = Car::with('brand')->find($request->id);
        $brands = Brand::get();
        if ($car) {
            return view('dashboard.addNew', compact('car', 'brands'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Car Not Found.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): RedirectResponse
    {
        //
        try {
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

            $car = Car::findorFail($request->id);

            if (!$request->hasFile('image')) {
                $data['image'] = $car->image;
            } else {
                $path = $request->file('image')->store('public/images');
                $data['image'] = $path;
            }

            $car->brand()->associate($request->brand);
            $car->save();
            $car->update($data);
            return redirect()->route('dashboard')->with('success', 'Car has been updated.');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->with('error', 'Car has not been updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): RedirectResponse
    {
        //
        $request->validate(['id' => 'required|integer']);

        $car = Car::find($request->id);
        if ($car) {
            $car->delete();
            return redirect()->route('dashboard')->with('success', 'Car has been Destroyed');
        } else {
            return redirect()->route('dashboard')->with('error', 'Car not found');
        }
    }
}