<!-- resources/views/videos/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Uploaded Videos</h2>
    @foreach($videos as $video)
        <div class="video-item">
            <h3>{{ $video->title }}</h3>
            <video width="320" height="240" controls>
                <source src="{{ Storage::url($video->path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @endforeach
</div>
@endsection
