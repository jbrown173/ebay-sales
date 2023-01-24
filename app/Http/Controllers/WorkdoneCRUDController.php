<?php
namespace App\Http\Controllers;
use App\Models\Razors;
use Illuminate\Http\Request;
class EbaylistingsCRUDController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$data['razors'] = Razors::orderBy('id','desc')->paginate(5);
return view('razors.index', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('razors.create');
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
'brandId' => 'required',
'manufacturerId' => 'required',
'tangTextFront' => 'required',
'tangTextBack' => 'required',
'bladeTextFront' => 'required',
'earliestYear' => 'required',
'latestYear' => 'required',
'scaleMaterialId' => 'required',
'scaleText' => 'required',
'scaleDescription' => 'required',
'bladeDescription' => 'required',
'conditionWhenBought' => 'required',
'knownCountryMadeIn' => 'required',
'guessedCountryMadeIn' => 'required'
]);
$razor = new Razors;
$razor->brandId = $request->brandId;
$razor->manufacturerId = $request->manufacturerId;
$razor->tangTextFront = $request->tangTextFront;
$razor->tangTextBack = $request->tangTextBack;
$razor->bladeTextFront = $request->bladeTextFront;
$razor->earliestYear = $request->earliestYear;
$razor->latestYear = $request->latestYear;
$razor->scaleMaterialId = $request->scaleMaterialId;
$razor->scaleText = $request->scaleText;
$razor->scaleDescription = $request->scaleDescription;
$razor->bladeDescription = $request->bladeDescription;
$razor->conditionWhenBought = $request->conditionWhenBought;
$razor->knownCountryMadeIn = $request->knownCountryMadeIn;
$razor->guessedCountryMadeIn = $request->guessedCountryMadeIn;
$razor->save();
return redirect()->route('razors.index')
->with('success','Razor record has been created successfully.');
}
/**
* Display the specified resource.
*
* @param  \App\Razors  $razor
* @return \Illuminate\Http\Response
*/
public function show(Razors $razor)
{
return view('razors.show',compact('razor'));
}
/**
* Show the form for editing the specified resource.
*
* @param  \App\Razors  $razor
* @return \Illuminate\Http\Response
*/
public function edit(Razors $razor)
{
return view('razors.edit',compact('razor'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\Razors  $razor
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$request->validate([
    'brandId' => 'required',
    'manufacturerId' => 'required',
    'tangTextFront' => 'required',
    'tangTextBack' => 'required',
    'bladeTextFront' => 'required',
    'earliestYear' => 'required',
    'latestYear' => 'required',
    'scaleMaterialId' => 'required',
    'scaleText' => 'required',
    'scaleDescription' => 'required',
    'bladeDescription' => 'required',
    'conditionWhenBought' => 'required',
    'knownCountryMadeIn' => 'required',
    'guessedCountryMadeIn' => 'required'
]);
$razor = new Razors;
$razor->brandId = $request->brandId;
$razor->manufacturerId = $request->manufacturerId;
$razor->tangTextFront = $request->tangTextFront;
$razor->tangTextBack = $request->tangTextBack;
$razor->bladeTextFront = $request->bladeTextFront;
$razor->earliestYear = $request->earliestYear;
$razor->latestYear = $request->latestYear;
$razor->scaleMaterialId = $request->scaleMaterialId;
$razor->scaleText = $request->scaleText;
$razor->scaleDescription = $request->scaleDescription;
$razor->bladeDescription = $request->bladeDescription;
$razor->conditionWhenBought = $request->conditionWhenBought;
$razor->knownCountryMadeIn = $request->knownCountryMadeIn;
$razor->guessedCountryMadeIn = $request->guessedCountryMadeIn;
$razor->save();
return redirect()->route('razors.index')
->with('success','Razor Has Been updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\Razors  $razor
* @return \Illuminate\Http\Response
*/
public function destroy(Razors $razor)
{
$razor->delete();
return redirect()->route('razors.index')
->with('success','Razor has been deleted successfully');
}
}
