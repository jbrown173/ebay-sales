<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\File;


class ImageUploadController extends Controller
{
/**
* Show the application imageUpload.
*
* @return \Illuminate\Http\Response
*/
public function index()
	{
		return view('imageUploads.index');
	}


/**
* Show the application imageUploadPost.
*
* @return \Illuminate\Http\Response
*/

	public function imageUploadPost(Request $req)
	{	
		$validator = $req->validate([
			'image' => 'required|mimes:jpg,png|max:40048'
		]);
		$fileModel = new File;
		if ($req->file()) {
			$fileName = time().'_'.$req->image->getClientOriginalName();
			$filePath = $req->file('image')->storeAs('uploads', $fileName, 'public');
			$fileModel->name = time().'_'.$req->image->getClientOriginalName();
			$fileModel->file_path = '/storage/' . $filePath;
			$fileModel->save();
			
			return response()->json([
				'success'   => 'Image Upload Successfully',
				'uploaded_image' => '<img src="/storage/'. $filePath .'" class="img-thumbnail" width="300" />',
				'class_name'  => 'alert-success',
				'image_dbKey' => $fileModel->id
			]);
		}
		return response()->json(['error'=>$validator->errors()->all()]);
	}
}