<?php
namespace App\Http\Controllers;

use App\Models\manufacturers;
use App\Models\Razors;
use App\Models\brands;
use Illuminate\Http\Request;
use App\Models\File;

class RazorsCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['razors'] = Razors::join('manufacturers', 'manufacturerId', '=', 'manufacturers.id')
            ->join('brands', 'brandId', '=', 'brands.id')
            ->join('scalematerial', 'scaleMaterialId', '=', 'scalematerial.id')
			->select('razors.*', 'manufacturers.name as manufName', 'brands.name as brandName', 'scalematerial.name as scaleMaterial')
			->get();

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
            'brandId' => 'int',
            'manufacturerId' => 'int',
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
            'guessedCountryMadeIn' => 'string',
            'imageId' => 'int'
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
		$razor->imageId = $request->imageId;
        $razor->save();
        return redirect()->route('razors.index')
            ->with('success', 'Razor record has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Razors  $razor
     * @return \Illuminate\Http\Response
     */
    public function show(Razors $razor)
    {
        return view('razors.show', compact('razor'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Razors  $razor
     * @return \Illuminate\Http\Response
     */
    public function edit(Razors $razor)
    {
        $manufacturers = Manufacturers::select('name', 'id')->get();
        $brands = brands::select('name', 'id')->get();
        return view('razors.edit', compact('razor', 'manufacturers', 'brands'));
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
            'brandId' => 'int',
            'manufacturerId' => 'int',
            'tangTextFront' => 'string',
            'tangTextBack' => 'string',
            'bladeTextFront' => 'string',
			'earliestYear' => 'string',
			'latestYear' => 'string',
            'scaleMaterialId' => 'int',
            'scaleText' => 'string',
            'scaleDescription' => 'string',
            'bladeDescription' => 'string',
            'conditionWhenBought' => 'string',
			'knownCountryMadeIn' => 'string',
			'guessedCountryMadeIn' => 'string',
			'imageId' => 'string'
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
		$razor->imageId = $request->imageId;
        $razor->save();
        return redirect()->route('razors.index')
            ->with('success', 'Razor Has Been updated successfully');
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
            ->with('success', 'Razor has been deleted successfully');
    }
    
	/**
	* Upload image.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
    public function uploadx(Request $request)
    {
		$file = $request->file('file');
		$request->file('file')->store('images', 'public');
		return redirect()->route('razors')
		->with('success', 'Razor image has been uploaded successfully');
    }
    
    public function upload(Request $req)
    {
		$req->validate([
			'file' => 'required|mimes:jpg,png|max:40048'
		]);
		$fileModel = new File;
		if ($req->file()) {
			$fileName = time().'_'.$req->file->getClientOriginalName();
			$filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
			$fileModel->name = time().'_'.$req->file->getClientOriginalName();
			$fileModel->file_path = '/storage/' . $filePath;
			$fileModel->save();
			return back()
			->with('success','File has been uploaded.')
			->with('file', $fileName);
		}
    }
}
