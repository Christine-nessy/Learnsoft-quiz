<?php

namespace App\Http\Controllers;

use App\DataTables\QuestionDataTable;
use App\DataTables\AnswerDataTable;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Requests\CreateAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Answer;
use App\Models\Question;
use App\Repositories\QuestionRepository;
use App\Repositories\AnswerRepository;

use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Validator;

class QAController extends AppBaseController
{
    private $questionRepository;
    private $answerRepository;

    public function __construct(
        QuestionRepository $questionRepo,
        AnswerRepository $answerRepo
    ) {
        $this->questionRepository = $questionRepo;
        $this->answerRepository = $answerRepo;
    }

    /**
     * Store a new question and its answers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            //hiyo ya answers smthg array nimetoa hapa.
            'answers' => 'required|array',
            'answers.*' => 'required|string',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);
    
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Upload the image
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
    
        // Store the question
        $question = new Question();
        $question->question = $request->input('question');
        $question->image = $imageName; // Save the image file name
        $question->save();
    
        // Store the answers
        foreach ($request->input('answers') as $answerText) {
            $answer = new Answer();
            $answer->answer = $answerText;
            $answer->question_id = $question->id; // Associate answer with the question
            $answer->save();
        }
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Question, answers, and image saved successfully.');
    }
    


    // Question Methods

    public function index(QuestionDataTable $questionDataTable)
    {
        return $questionDataTable->render('questions.index');
    }

    public function createQuestion()
    {
        return view('questions.create');
    }

    // public function storeQuestion(CreateQuestionRequest $request)
    // {
    //     $input = $request->all();
    //     $question = $this->questionRepository->create($input);
    //     Flash::success('Question saved successfully.');
    //     return redirect(route('questions.index'));
    // }

    public function showQuestion($id)
    {
        $question = $this->questionRepository->find($id);
        if (empty($question)) {
            Flash::error('Question not found');
            return redirect(route('questions.index'));
        }
        return view('questions.show')->with('question', $question);
    }

    public function editQuestion($id)
    {
        $question = $this->questionRepository->find($id);
        if (empty($question)) {
            Flash::error('Question not found');
            return redirect(route('questions.index'));
        }
        return view('questions.edit')->with('question', $question);
    }

    public function updateQuestion($id, UpdateQuestionRequest $request)
    {
        $question = $this->questionRepository->find($id);
        if (empty($question)) {
            Flash::error('Question not found');
            return redirect(route('questions.index'));
        }
        $question = $this->questionRepository->update($request->all(), $id);
        Flash::success('Question updated successfully.');
        return redirect(route('questions.index'));
    }

    public function destroyQuestion($id)
    {
        $question = $this->questionRepository->find($id);
        if (empty($question)) {
            Flash::error('Question not found');
            return redirect(route('questions.index'));
        }
        $this->questionRepository->delete($id);
        Flash::success('Question deleted successfully.');
        return redirect(route('questions.index'));
    }

    // Answer Methods

    public function indexAnswer(AnswerDataTable $answerDataTable)
    {
        return $answerDataTable->render('answers.index');
    }

    public function createAnswer()
    {
        return view('answers.create');
    }

    // public function storeAnswer(CreateAnswerRequest $request)
    // {
    //     $input = $request->all();
    //     $answer = $this->answerRepository->create($input);
    //     Flash::success('Answer saved successfully.');
    //     return redirect(route('answers.index'));
    // }

    public function showAnswer($id)
    {
        $answer = $this->answerRepository->find($id);
        if (empty($answer)) {
            Flash::error('Answer not found');
            return redirect(route('answers.index'));
        }
        return view('answers.show')->with('answer', $answer);
    }

    public function editAnswer($id)
    {
        $answer = $this->answerRepository->find($id);
        if (empty($answer)) {
            Flash::error('Answer not found');
            return redirect(route('answers.index'));
        }
        return view('answers.edit')->with('answer', $answer);
    }

    public function updateAnswer($id, UpdateAnswerRequest $request)
    {
        $answer = $this->answerRepository->find($id);
        if (empty($answer)) {
            Flash::error('Answer not found');
            return redirect(route('answers.index'));
        }
        $answer = $this->answerRepository->update($request->all(), $id);
        Flash::success('Answer updated successfully.');
        return redirect(route('answers.index'));
    }

    public function destroyAnswer($id)
    {
        $answer = $this->answerRepository->find($id);
        if (empty($answer)) {
            Flash::error('Answer not found');
            return redirect(route('answers.index'));
        }
        $this->answerRepository->delete($id);
        Flash::success('Answer deleted successfully.');
        return redirect(route('answers.index'));
    }
}
