@extends('layouts.app')

@section('content')

<a href="{{ route('quizzes.create') }}" class="btn btn-primary mb-3 mt-4" style="float:right;">Create New Quiz</a>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th>Quiz Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->title }}</td>
                        <td>
                             <!-- Edit Button -->
                    <a href="{{ route('quizzes.create', $quiz->id) }}" class="btn btn-success btn-xs">  <i class="fa fa-edit"></i></a>
                    <a href="{{ route('quizzes.show',  $quiz->id) }}" class="btn btn-success btn-xs mr-1"> <i class="fa fa-eye"></i></a>
                    <!-- Delete Button -->
                    
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection