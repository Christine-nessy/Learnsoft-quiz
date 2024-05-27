<?php

namespace App\Http\Controllers;

use App\DataTables\AnswerDataTable;
use App\Http\Requests\CreateAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AnswerRepository;
use Illuminate\Http\Request;
use Flash;

class AnswerController extends AppBaseController
{
    /** @var AnswerRepository $answerRepository*/
    private $answerRepository;

    public function __construct(AnswerRepository $answerRepo)
    {
        $this->answerRepository = $answerRepo;
    }

    /**
     * Display a listing of the Answer.
     */
    public function index(AnswerDataTable $answerDataTable)
    {
    return $answerDataTable->render('answers.index');
    }


    /**
     * Show the form for creating a new Answer.
     */
    public function create()
    {
        return view('answers.create');
    }

    /**
     * Store a newly created Answer in storage.
     */
    public function store(CreateAnswerRequest $request)
    {
        $input = $request->all();

        $answer = $this->answerRepository->create($input);

        Flash::success('Answer saved successfully.');

        return redirect(route('answers.index'));
    }

    /**
     * Display the specified Answer.
     */
    public function show($id)
    {
        $answer = $this->answerRepository->find($id);

        if (empty($answer)) {
            Flash::error('Answer not found');

            return redirect(route('answers.index'));
        }

        return view('answers.show')->with('answer', $answer);
    }

    /**
     * Show the form for editing the specified Answer.
     */
    public function edit($id)
    {
        $answer = $this->answerRepository->find($id);

        if (empty($answer)) {
            Flash::error('Answer not found');

            return redirect(route('answers.index'));
        }

        return view('answers.edit')->with('answer', $answer);
    }

    /**
     * Update the specified Answer in storage.
     */
    public function update($id, UpdateAnswerRequest $request)
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

    /**
     * Remove the specified Answer from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
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
