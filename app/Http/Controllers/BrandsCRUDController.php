<?php
namespace App\Http\Controllers;

use App\Models\brands;
use Illuminate\Http\Request;

class brandsCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['brands'] = brands::join('manufacturers', 'manufacturerId', '=', 'manufacturers.id')
            ->get(['brands.*', 'manufacturers.name as manufName']);

        return view('brands.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);
        $brand = new brands;
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->manufacturerId = $request->manufacturerId;
        $brand->save();
        return redirect()->route('brands.index')
            ->with('success', 'brand record has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Brands  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brands $brand)
    {
        return view('brands.show', compact('brand'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brands  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brands $brand)
    {
        return view('brands.edit', compact('brand'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brands  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

        ]);
        $brand = new brands;
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->manufacturerId = $request->manufacturerId;
        $brand->save();
        return redirect()->route('brands.index')
            ->with('success', 'brand Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\brands  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(brands $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')
            ->with('success', 'brand has been deleted successfully');
    }
}
