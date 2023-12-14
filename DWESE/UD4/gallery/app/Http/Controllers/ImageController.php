<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ImageController extends Controller
{
  /**
   * Show the empty gallery.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('gallery');
  }

  /**
   * Show the gallery with images.
   *
   * @return \Illuminate\Http\Response
   */
  public function showGallery()
  {
    // Get all files from the public/images folder
    $files = File::files(public_path('images'));
    $images = []; // Initialize the array

    // Loop through files and save the names in the array
    foreach ($files as $file) {
      $images[] = $file->getRelativePathname();
    }

    // Return the view with the array of images
    return view('gallery', ['images' => $images]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   */
  public function store(Request $request)
  {
    // Validate the image must be an image and its size must be less than 2MB
    $request->validate([
      'image_src' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [ // Custom error messages
      'image_src.required' => 'Please select an image.',
      'image_src.image' => 'The file must be an image.',
      'image_src.mimes' => 'The file must be of type JPEG, PNG, JPG or GIF.',
      'image_src.max' => 'The maximum size allowed is 2 MB.',
    ]);

    // Get the file and rename it
    $image = $request->file('image_src'); // Get the file
    $reImage = time() . '-' . $image->getClientOriginalName(); // Rename the file with timestamp and original name
    $destinationPath = public_path('/images'); // Get the path
    $image->move($destinationPath, $reImage); // Move the file

    // Return the view with success message
    return redirect()->route('image.index')
      ->with('success', 'Image uploaded successfully');
  }
}
