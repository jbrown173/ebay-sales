<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\brandsCRUDController;
use App\Http\Controllers\EbaylistingsCRUDController;
use App\Http\Controllers\ManufacturersCRUDController;
use App\Http\Controllers\RazorsCRUDController;
use App\Http\Controllers\WhetstonesCRUDController;

class DraftListingController extends Controller
{
    public function index()
    {
		$result = (new RazorsCRUDController)->index();
        //$data = $result;
        echo '<pre>';
        //print_r($result->data);
        echo '</pre>';
		$data['razors'] = $result->razors;
		$data['brand'] = $result->brand;
		$data['scalematerial'] = $result->scalematerial;
		return view('draftlisting.index', $data);
    }
}
