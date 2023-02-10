<?php
namespace App\Http\Controllers;

use App\Models\ebaylistings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EbaylistingsCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['ebaylistings'] = Ebaylistings::join('razors', 'razorId', '=', 'razors.id')
		->join('manufacturers', 'razors.manufacturerId', '=', 'manufacturers.id')
		->join('brands', 'brandId', '=', 'brands.id')	
		->select('ebaylistings.*', 'manufacturers.name as manufName', 'brands.name as brandName', 'razors.id as razorId')
		->get();

        return view('ebaylistings.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ebaylistings.create');
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
            'ebayNum' => 'required',
            'razorId' => 'required',
            'url' => 'required',
            'note' => 'required'
        ]);
        $ebaylisting = new Razors;
        $ebaylisting->ebayNum = $request->ebayNum;
        $ebaylisting->razorId = $request->razorId;
        $ebaylisting->url = $request->url;
        $ebaylisting->note = $request->note;
        $ebaylisting->save();
        return redirect()->route('ebaylistings.index')
            ->with('success', 'Ebay Listing record has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ebaylistings  $ebaylistings
     * @return \Illuminate\Http\Response
     */
    public function show(ebaylistings $ebaylisting)
    {
        return view('ebaylistings.show', compact('ebaylisting'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ebaylistings  $razor
     * @return \Illuminate\Http\Response
     */
    public function edit(ebaylistings $ebaylisting)
    {
        return view('ebaylistings.edit', compact('ebaylisting'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ebaylistings  $razor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ebayNum)
    {
        $request->validate([
            'ebayNum' => 'required',
            'razorId' => 'required',
            'url' => 'required',
            'note' => 'required'
        ]);
        $ebaylisting = new ebaylistings;
        $ebaylisting->ebayNum = $request->ebayNum;
        $ebaylisting->razorId = $request->razorId;
        $ebaylisting->url = $request->url;
        $ebaylisting->note = $request->note;
        $ebaylisting->save();
        return redirect()->route('razors.index')
            ->with('success', 'Ebay Listing Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ebaylistings  $ebaylisting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ebaylistings $ebaylisting)
    {
        $ebaylisting->delete();
        return redirect()->route('ebaylistings.index')
            ->with('success', 'Ebay Listing has been deleted successfully');
    }
}
