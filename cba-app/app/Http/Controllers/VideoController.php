<?php
// app/Http/Controllers/VideoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:5120000' // Max size is in kilobytes
        ]);

        Log::info('Validation passed.');

        // Handle the file upload
        if ($request->hasFile('video')) {
            Log::info('File found in request.');
            $videoFile = $request->file('video');
            $path = $videoFile->store('videos', 'public'); // Save to the 'public/videos' directory
            Log::info('File stored at path: ' . $path);

            // Save video information in the database
            $video = new Video();
            $video->title = $request->input('title');
            $video->path = $path;

            if ($video->save()) {
                Log::info('Video saved to database.');
                return redirect()->route('videos.create')->with('success', 'Video uploaded successfully.');
            } else {
                Log::error('Failed to save video to the database.');
                return redirect()->route('videos.create')->with('error', 'Failed to save video information to the database.');
            }
        } else {
            Log::error('No file found in request.');
        }

        return redirect()->route('videos.create')->with('error', 'Video upload failed.');
    }

    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }
}
