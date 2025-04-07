<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadImageRequest;

class ImageUploadController extends Controller
{

    public function upload(UploadImageRequest $request)
    {
        // $validated = $request->validated();
        // $uploadPath = public_path('uploads');
        // if (!file_exists($uploadPath)) {
        //     mkdir($uploadPath, 0755, true);
        // }
        // if ($request->file('image')) {
        //     $imageName = time() . '.' . $request->image->extension();
        //     $request->image->move($uploadPath, $imageName);

        //     return redirect()->route('image.form')
        //         ->with('success', 'Image uploaded successfully!')
        //         ->with('image', $imageName);
        // }
        // return redirect()->route('image.form')->with('error', 'Image upload failed.');
    }
    public function listImages()
    {
        $images = glob(public_path('uploads/*.*')); // Retrieve all files in the uploads directory

        $images = array_map(function ($image) {
            return asset('uploads/' . basename($image)); // Convert file paths to URLs
        }, $images);
        
        return view('images', compact('images'));
    }
}
