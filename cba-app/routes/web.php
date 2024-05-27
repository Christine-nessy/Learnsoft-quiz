<?php

use App\Http\Controllers\QAController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizManagementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('questions', App\Http\Controllers\QuestionController::class);
Route::resource('answers', App\Http\Controllers\AnswerController::class);
Route::resource('results', App\Http\Controllers\resultController::class);

//  Route::get('admin/quiz', [App\Http\Controllers\QuizController::class, 'index'])->name('admin.quiz.index');
// Route::post('admin/quiz/submit', [App\Http\Controllers\QuizController::class, 'submit'])->name('admin.quiz.submit');

Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::post('/quiz', [QuizController::class, 'submit'])->name('quiz.submit');
Route::get('/getresults', [QuizController::class, 'getAllUserResults'])->name('all.user.results');


Route::get('/quiz-setting-index', [QuizManagementController::class, 'index'])->name('quizzes.index');
Route::get('/quiz-setting-create', [QuizManagementController::class, 'create'])->name('quizzes.create');
Route::post('/quiz-setting-save', [QuizManagementController::class, 'store'])->name('quizzes.store');
Route::get('/quiz-setting-show', [QuizManagementController::class, 'show'])->name('quizzes.show');
Route::post('/QandA', [QAController::class, 'store'])->name('QA.store');
Route::get('/start', [QuizController::class, 'start'])->name('quiz.start');
