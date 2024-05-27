<?php
namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use App\Models\UserAnswer;
use App\Models\UserTimer; // Import the UserTimer model
use App\Models\QuizAttempt; // Import the QuizAttempt model
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function start()
    {
        return view('quizzes.start');
    }

    public function startQuiz()
    {
        $user = Auth::user();
        $userTimer = UserTimer::firstOrCreate(
            ['user_id' => $user->id],
            ['start_time' => Carbon::now()]
        );

        return redirect()->route('quiz.show');
    }

    public function showQuiz(Request $request)
    {
        $user = Auth::user();
        $userTimer = UserTimer::where('user_id', $user->id)->first();

        if (!$userTimer) {
            return redirect()->route('quiz.start');
        }

        $startTime = new Carbon($userTimer->start_time);
        $currentTime = Carbon::now();
        $elapsedTime = $currentTime->diffInSeconds($startTime);
        $totalQuizTime = 30 * 60; // 30 minutes
        $remainingTime = $totalQuizTime - $elapsedTime;

        if ($remainingTime <= 0) {
            // Handle quiz time expiration
            return redirect()->route('quiz.submit');
        }

        $questions = Question::with('answers')->get();

        return view('quiz.show', [
            'questions' => $questions,
            'remainingTime' => $remainingTime,
        ]);
    }

    public function index()
    {
        $questions = Question::with('answers')->get();
        return view('quizzes.index', compact('questions'));
    }

    public function submit(Request $request)
    {
        $user = Auth::user();
        $answers = $request->input('answers');

        // Clear previous answers for the user to handle resubmission
        UserAnswer::where('user_id', $user->id)->delete();

        foreach ($answers as $question_id => $answer_id) {
            $answer = Answer::find($answer_id);
            $is_correct = $answer->is_correct;

            UserAnswer::create([
                'user_id' => $user->id,
                'question_id' => $question_id,
                'answer_id' => $answer_id,
                'is_correct' => $is_correct,
            ]);
        }

        session()->flash('success', 'Quiz submitted successfully!');
        return redirect()->route('all.user.results');
    }

    public function getAllUserResults()
    {
        $users = User::all();
        $results = [];

        foreach ($users as $user) {
            $totalAttempted = UserAnswer::where('user_id', $user->id)->count();
            $totalCorrect = UserAnswer::where('user_id', $user->id)->where('is_correct', true)->count();
            $results[] = [
                'user' => $user,
                'totalAttempted' => $totalAttempted,
                'totalCorrect' => $totalCorrect,
                'score' => $totalAttempted > 0 ? round(($totalCorrect / $totalAttempted) * 100, 0) : 0
            ];
        }

        return view('quizzes.results', ['results' => $results]);
    }
}

