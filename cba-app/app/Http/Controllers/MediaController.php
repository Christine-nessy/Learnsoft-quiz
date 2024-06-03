<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
  
public function index()
{
    $media = Media::all();
    // return view('media.index', compact('media'));
    // or
     return view('media.index')->with('media', $media);
}
public function create()
{
    return view('media.create');
}
    /**
     * Store a newly created media file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:video,document',
            'media' => 'required|file|max:10240',
        ]);
    
        // Use dd() to inspect the validated data
        // dd($validatedData);
    
        // Process the uploaded media file
        $file = $request->file('media');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('media'), $fileName); // Ensure that 'media' directory exists in the public directory
    
        // Create a new Media model instance
        $media = new Media();
        $media->title = $validatedData['title'];
        $media->type = $validatedData['type'];
        $media->file_path = '/media/' . $fileName; // Adjust the file path accordingly
    
        // Save the Media model instance to the database
        $media->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Media file uploaded successfully.');
    }

    
}
