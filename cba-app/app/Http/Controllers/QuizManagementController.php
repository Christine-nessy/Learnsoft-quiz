<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizManagementController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('questions','grade')->get();
        return view('quiz_setting.index', compact('quizzes'));
    }
    public function create()
    {
        $questions = Question::all();
        $grades = Grade::distinct('grade')->pluck('grade', 'id');
        $grades = Grade::all();
        return view('quiz_setting.create', compact('questions', 'grades'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'questions' => 'required|array',
            'questions.*' => 'exists:questions,id',
            'duration' => 'nullable|integer',
            'grade_id' => 'required|exists:grades,id',
        ]);
    
        $quiz = Quiz::create([
            'title' => $request->title,
            'duration' => $request->duration,
            'grade_id' => $request->grade_id,
        ]);
    
        $quiz->questions()->sync($request->questions);
    
        return redirect()->route('quizzes.index')->with('status', 'Quiz created successfully!');
    }
    
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        
        // Assuming you have a $questions variable containing all questions
        $questions = Question::all();
        $grades = Grade::all();
    
        return view('quizzes.edit', compact('quiz', 'questions'));
    }
    public function show(Quiz $quiz)
    {
        $quiz->load('questions','grade');
        return view('quiz_setting.show', compact('quiz'));
    }
    
    public function destroy($id)
{
    $quiz = Quiz::findOrFail($id);
    
    // Delete the quiz
    $quiz->delete();
    
    return redirect()->route('quizzes.index')->with('status', 'Quiz deleted successfully!');
}

}