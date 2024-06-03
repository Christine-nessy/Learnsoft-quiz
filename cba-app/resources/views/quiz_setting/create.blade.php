@extends('layouts.app')

@section('content')
<style>
    .container {
        margin-top: 30px;
        background-color: #003C43; 
        color: #ffff;
        flex: 1;
        width: 97%;
    }

    .form-group {
        color: #FF6600;
    }

    .btn {
        background-color: #FF6600;
    }

    .btn:hover {
        background-color: orange;
    }

    .col-md-12 {
        text-align: center;
        margin-bottom: 20px;
    }

    .scrollable-container {
        max-height: 200px;
        overflow-y: scroll;
    }
</style>

<form action="{{ route('quizzes.store') }}" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-4">
                <div class="form-group">
                    <label for="title">Quiz Name</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="duration">Duration (optional)</label>
                    <input type="number" class="form-control" id="duration" name="duration" min="1">
                </div>
                <div class="form-group">
                    <label for="grade">Select Grade</label>
                    <select class="form-control" id="grade" name="grade" required>
                        <option value="">Select Grade</option>
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}">Grade {{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="form-group">
                    <label for="questionSearch">Search Questions</label>
                    <input type="text" class="form-control" id="questionSearch" placeholder="Search Questions">
                </div>
                <div class="form-group">
                    <label for="questions">Select Questions</label>
                    <a href="{{ route('questions.create') }}" class="btn" style="height: 35px; text-align:center; margin-left:170px; margin-bottom:10px;">
                        Create Question
                    </a>
                    <div class="scrollable-container" id="questions">
                        @foreach ($questions as $question)
                            <div class="question-item">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="question{{ $question->id }}" name="questions[]" value="{{ $question->id }}">
                                    <label class="form-check-label" for="question{{ $question->id }}">
                                        {{ $question->question }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn">Create Quiz</button>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('questionSearch');
        const questionsContainer = document.getElementById('questions');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();
            const questions = questionsContainer.getElementsByClassName('question-item');

            Array.from(questions).forEach(function (question) {
                const questionText = question.textContent.toLowerCase();
                if (questionText.includes(searchTerm)) {
                    question.style.display = '';
                } else {
                    question.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
