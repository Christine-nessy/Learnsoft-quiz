<?php

namespace App\Http\Controllers;

use App\DataTables\QuestionDataTable;
use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Flash;

class QuestionController extends AppBaseController
{
    /** @var QuestionRepository $questionRepository*/
    private $questionRepository;

    public function __construct(QuestionRepository $questionRepo)
    {
        $this->questionRepository = $questionRepo;
    }

    /**
     * Display a listing of the Question.
     */
    public function index(QuestionDataTable $questionDataTable)
    {
    return $questionDataTable->render('questions.index');
    }


    /**
     * Show the form for creating a new Question.
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created Question in storage.
     */
    public function store(CreateQuestionRequest $request)
    {
        $input = $request->all();

        $question = $this->questionRepository->create($input);

        Flash::success('Question saved successfully.');

        return redirect(route('questions.index'));
    }

    /**
     * Display the specified Question.
     */
    public function show($id)
    {
        $question = $this->questionRepository->find($id);

        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('questions.index'));
        }

        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified Question.
     */
    public function edit($id)
    {
        $question = $this->questionRepository->find($id);

        if (empty($question)) {
            Flash::error('Question not found');

            return redirect(route('questions.index'));
        }

        return view('questions.edit')->with('question', $question);
    }

    /**
     * Update the specified Question in storage.
     */
    public function update($id, UpdateQuestionRequest $request)
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

    /**
     * Remove the specified Question from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
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
}
