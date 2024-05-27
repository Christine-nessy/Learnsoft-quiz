<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\QuizAttempt; // Import the QuizAttempt model

class QuizController extends Controller
{
    public function showQuiz(Request $request)
    {
        // Assuming you have a method to check if the user has already attempted the quiz
        $quizAttempted = $this->checkQuizAttempt($request->user()->id);

        // Fetch questions and pass them to the view
        $questions = []; // Fetch your questions here

        return view('quiz.quiz_page', compact('questions', 'quizAttempted'));
    }

    private function checkQuizAttempt($userId)
    {
        // Check if the user has already attempted the quiz
        $attempt = QuizAttempt::where('user_id', $userId)->first();
        return $attempt ? true : false;
    }
}


