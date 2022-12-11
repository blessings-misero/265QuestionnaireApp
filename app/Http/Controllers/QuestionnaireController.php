<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class QuestionnaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('Questionnaire.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'Required',
            'purpose' => 'required'
        ]);

        $questionnaire = auth()->user()->questionnaires()->create($data);

        return redirect('/questionnaires/'.$questionnaire->id);

    }

    public function show(\App\Models\Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers');
        
        return view('questionnaire.show', compact('questionnaire'));

    }
}
