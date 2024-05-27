<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizManagementController extends Controller
{  
    public function show(Quiz $quiz)
    {
        $quiz->load('questions');
        return view('quiz_setting.show', compact('quiz'));
    }
    public function index()
    {
        $quizzes = Quiz::with('questions')->get();
        return view('quiz_setting.index', compact('quizzes'));
    }
    public function create()
    {
        $questions = Question::all();
        return view('quiz_setting.create', compact('questions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'questions' => 'required|array',
            'questions.*' => 'exists:questions,id',
            'duration' => 'required|integer'

            
        ]);

        $quiz = Quiz::create(['title' => $request->title, 'duration' => $request->duration]);

        foreach ($request->questions as $questionId) {
            $quiz->questions()->attach($questionId);
        }
        $quiz->questions()->attach($request->questions);

        return redirect()->route('quizzes.index')->with('status', 'Quiz created successfully!');
    }
}
