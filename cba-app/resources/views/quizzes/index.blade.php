@extends('layouts.app')

@section('content')
<style>
    /* Custom Styles for Child-friendly Quiz Form */
    body {
        background-color: #f8f9fa;
    }

    #timer {
        background-color: #ff7f0e; /* Warm tone color */
        width: 7em;
        border-radius: 1.8em;
        display: flex;
        align-items: center;
        justify-content: space-between;
        float: right !important;
        padding: 0.4em 1.8em;
        color: white;
    }

    .quiz-container {
        background-color: #F6E9B2; /* Warm tone color */
        border-radius: 15px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 50px;
    }

    h1 {
        font-family: 'Comic Sans MS', cursive, sans-serif;
        text-align: center;
        color: #ff7f0e; /* Warm tone color */
    }

    .question-text {
        color: #333;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .answers {
        margin-left: 20px;
    }

    .form-check-label {
        font-family: 'Comic Sans MS', cursive, sans-serif;
        color: #333;
    }
    .quiz-questions{
        margin-top: 40px;
    }

    .btn-submit {
        background-color: #ff7f0e; /* Warm tone color */
        color: #fff;
        font-family: 'Comic Sans MS', cursive, sans-serif;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #ff944d; /* Lighter shade for hover effect */
    }
</style>

<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="quiz-container">
        <h1>🌟 Welcome to the Quiz! 🌟</h1>
        <div id="timer" style="font-size: 24px;">
        30.00
    </div>
        <br>

        <form id="quizForm" action="{{ route('quiz.submit') }}" method="POST" style="font-family: 'Comic Sans MS', cursive, sans-serif;">
            @csrf
            <div class="quiz-questions">
                @php $questionNumber = 1; @endphp
                @foreach($questions as $question)
                <div class="question mb-4 pb-2 mt-3 border-bottom question-page" style="border: 1px solid #ddd; padding: 12px; border-radius: 5px; display: none;">
                    @if($question->image)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('images/' . $question->image) }}" alt="Question Image" style="max-width: 100%;">
                    </div>
                    @endif
                    <p class="question-text font-weight-bold">{{ $questionNumber }}. {{ $question->question }}</p>
                    <div class="answers pl-3">
                        @foreach($question->answers as $answer)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}" id="answer_{{ $answer->id }}">
                            <label class="form-check-label" for="answer_{{ $answer->id }}">{{ $answer->answer }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @php $questionNumber++; @endphp
                @endforeach
            </div>
            <div class="text-center">
                <button type="button" id="prevButton" class="btn-submit" style="display: none;">Previous</button>
                <button type="button" id="nextButton" class="btn-submit">Next</button>
                <button type="submit" id="submitButton" class="btn-submit" style="display: none;">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
   


   document.addEventListener('DOMContentLoaded', function() {
    const questions = document.querySelectorAll('.question-page');
    let currentQuestion = 0;

    function showQuestion(index) {
        questions.forEach((question, i) => {
            question.style.display = (i === index) ? 'block' : 'none';
        });
        document.getElementById('prevButton').style.display = (index === 0) ? 'none' : 'inline-block';
        document.getElementById('nextButton').style.display = (index === questions.length - 1) ? 'none' : 'inline-block';
        document.getElementById('submitButton').style.display = (index === questions.length - 1) ? 'inline-block' : 'none';
    }

    document.getElementById('nextButton').addEventListener('click', function() {
        if (currentQuestion < questions.length - 1) {
            currentQuestion++;
            showQuestion(currentQuestion);
        }
    });

    document.getElementById('prevButton').addEventListener('click', function() {
        if (currentQuestion > 0) {
            currentQuestion--;
            showQuestion(currentQuestion);
        }
    });

    showQuestion(currentQuestion);

    // Timer Initialization
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var interval = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                clearInterval(interval);
                timerExpired();
            }
        }, 1000);
    }

    function timerExpired() {
        // Handle timer expiration, such as submitting the quiz
        document.getElementById("quizForm").submit();
        alert('Time\'s up!');
    }

    function getRemainingTime() {
        const timerText = document.getElementById("timer").textContent;
        const [minutes, seconds] = timerText.split(":").map(Number);
        return (minutes * 60) + seconds;
    }

    document.getElementById("quizForm").addEventListener("submit", function(event) {
        const remainingTime = getRemainingTime();
        // Optionally, you can send this remainingTime to your server
        // e.g., append it as a hidden input field
        let timeInput = document.createElement("input");
        timeInput.type = "hidden";
        timeInput.name = "remaining_time";
        timeInput.value = remainingTime;
        this.appendChild(timeInput);
    });

    window.onload = function () {
        var thirtyMinutes = 60 * 30,
            display = document.querySelector('#timer');
        startTimer(thirtyMinutes, display);
    };
});

</script>
@endsection



