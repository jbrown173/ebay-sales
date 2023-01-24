<?php
namespace App\Http\Controllers;
use App\Models\manufacturers;
use Illuminate\Http\Request;
class ManufacturersCRUDController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$data['manufacturers'] = manufacturers::orderBy('id','desc')->paginate(5);
return view('manufacturers.index', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('manufacturers.create');
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
'country' => 'required',
'years' => 'required',
'description' => '',
'name' => 'required'
]);
$manufacturer = new Manufacturers;
$manufacturer->country = $request->country;
$manufacturer->years = $request->years;
$manufacturer->description = $request->description;
$manufacturer->name = $request->name;
$manufacturer->save();
return redirect()->route('manufacturers.index')
->with('success','Manufacturer record has been created successfully.');
}
/**
* Display the specified resource.
*
* @param  \App\Manufacturers  $manufacturer
* @return \Illuminate\Http\Response
*/
public function show(Manufacturers $manufacturer)
{
return view('manufacturers.show',compact('manufacturer'));
}
/**
* Show the form for editing the specified resource.
*
* @param  \App\Manufacturers  $manufacturer
* @return \Illuminate\Http\Response
*/
public function edit(Manufacturers $manufacturer)
{
return view('manufacturers.edit',compact('manufacturer'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Manufacturers  $manufacturer
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$request->validate([
    'country' => 'required',
    'years' => 'required',
    'description' => 'required',
    'name' => 'required'
]);
$manufacturer = new Manufacturers;
$manufacturer->country = $request->country;
$manufacturer->years = $request->years;
$manufacturer->description = $request->description;
$manufacturer->name = $request->name;
$manufacturer->save();
return redirect()->route('razors.index')
->with('success','Razor Has Been updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Manufacturers  $manufacturer
* @return \Illuminate\Http\Response
*/
public function destroy(Manufacturers $manufacturer)
{
$manufacturer->delete();
return redirect()->route('manufacturers.index')
->with('success','Razor has been deleted successfully');
}
}
