@extends('layouts.app')

@section('content')
<style> 

.table {
    width: 100%;

}

.table th,
.table td {
    padding: 8px;
    vertical-align: top;
}

.table th {
    font-weight: bold;
    background-color: #f8f9fa; /* Table header background color */
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f8f9fa; /* Alternating row background color */
}

.btn-primary {
    background-color: #007bff; /* Primary button background color */
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3; /* Primary button hover background color */
    border-color: #0056b3;
}

.btn-info {
    background-color: #17a2b8; /* Info button background color */
    border-color: #17a2b8;
}

.btn-info:hover {
    background-color: #117a8b; /* Info button hover background color */
    border-color: #117a8b;
}

</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-4">
            <h2>Uploaded Media</h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('media.create') }}" class="btn btn-primary mt-4 mb-4">Upload New Media</a>
        </div>
    </div>
    @if($media->isEmpty())
        <p>No media files uploaded yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>File</th>
                    <th>Action</th> <!-- Add a new column for the "Preview" button -->
                </tr>
            </thead>
            <tbody>
                @foreach ($media as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->type }}</td>
                    <td>
                        @if ($item->type === 'video')
                            <video width="320" height="240" controls>
                                <source src="{{ asset($item->file_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <a href="{{ asset($item->file_path) }}" target="_blank">Download Document</a>
                        @endif
                    </td>
                    <td> <!-- Add a "Preview" button for documents -->
                        @if ($item->type === 'document')
                            <a href="{{ asset($item->file_path) }}" class="btn btn-info" target="_blank">Preview</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection