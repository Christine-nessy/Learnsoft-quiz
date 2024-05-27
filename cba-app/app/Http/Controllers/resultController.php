<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ResultController extends AppBaseController
{
    public function showResults()
    {
        // Retrieve all users with their quiz results
        $result = User::with('results')->get();

        return view('results', compact('results'));
    }
}

