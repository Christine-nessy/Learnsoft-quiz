<!-- resources/views/upload.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 600px;
        background-color: #003C43;
        color: white;
        height: 300px;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .card-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .form-control {
        border-radius: 5px;
        padding: 10px;
        height: 45px;
    }

    .form-control-file {
      align-items: center;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
 
</style>
<div class="container">
    <h2>Upload Video</h2>
    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="video">Video File</label>
            <input type="file" class="form-control" id="video" name="video" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
