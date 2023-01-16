<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PhpParser\Node\Stmt\TryCatch;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        //
        $brands = Brand::get();
        return view('dashboard.showDataTable', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        //
        return view('dashboard.addNew');
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
            'image' => 'required|image|mimes:png,jpeg,jpg|max:2048',
            'name' => 'required|string|max:255'
        ]);


        $path = $request->file('image')->store('public/images');
        $data['image'] = $path;
        Brand::create($data);

        return redirect()->route('dashboard')->with('success', 'Brand has been added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) : View | RedirectResponse
    {
        //
        $request->validate(['id' => 'required|integer',]);

        $brand = Brand::find($request->id);

        if ($brand) {
            return view('dashboard.addNew',compact('brand'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Brand Not Found.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request):RedirectResponse
    {
        //
        try {
            
            $data = $request->validate([
                'id' => 'required|integer',
                'image' => 'image|mimes:png,jpeg,jpg|max:2048',
                'name' => 'required|string|max:255'
            ]);
            $brand = Brand::findorFail($request->id);

            if(!$request->hasFile('image')){
                $data['image'] = $brand->image;
            }else{
                $path = $request->file('image')->store('public/images');
                $data['image'] = $path;
            }
            $brand->update($data);
            return redirect()->route('dashboard')->with('success', 'Brand has been updated.');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->with('error', 'Brand has not been updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): RedirectResponse
    {
        //
        $request->validate(['id' => 'required|integer',]);

        $brand = Brand::find($request->id);
        if ($brand) {
            $brand->cars()->delete();
            $brand->delete();
            return redirect()->route('dashboard')->with('success', 'Brand has been added.');
        } else {
            return redirect()->route('dashboard')->with('error', 'Brand Not Found.');
        }

    }
}