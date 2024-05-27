@extends('layouts.app')

@section('content')

        <form action="{{ route('quizzes.store') }}" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Quiz Name</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="duration">Duration (optional)</label>
                    <input type="number" class="form-control" id="duration" name="duration"  min="1">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="questions">Select Questions</label>
                    <select multiple class="form-control" id="questions" name="questions[]" required  style="height: 150px;">
                        @foreach ($questions as $question)
                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Create Quiz</button>
            </div>
        </div>
    </div>
</form>

@endsection