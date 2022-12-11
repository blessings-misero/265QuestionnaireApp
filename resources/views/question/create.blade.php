@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                <a href="/questionnaires" class="btn btn-sm btn-dark mb-3">Create new Question</a>
                    <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question[question]" 
                                class="form-control" id="exampleInputquestion" 
                                value="{{ old('question.question') }}"
                                aria-describedby="questionHelp" placeholder="Enter question">
                                
                                <small id="questionHelp" 
                                    class="form-text text-muted">Ask simple question and to the point question to get the best results.
                                </small>
                            
                            @error('question.question')
                                <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                    <small id="choicesHelp" class="form-text text-muted">Give choices that give the most insight into your question.</small>
                                    
                                    <div>
                                    <div class="form-group">
                                        <label for="answer1">Enter answer 1</label>
                                        <input type="text" name="answers[][answer]" 
                                        value="{{ old('answers.0.answer') }}"
                                        class="form-control" id="answer1" aria-describedby="choiceHelp" placeholder="Enter choice 1">

                                        
                                        @error('answers.0.answer')
                                            <small class="text-danger">{{ $message}}</small>
                                        @enderror
                                    </div>
                                    </div>

                                    <div>
                                    <div class="form-group">
                                        <label for="answer2">Enter answer 2</label>
                                        <input type="text" name="answers[][answer]" 
                                        value="{{ old('answers.1.answer') }}"
                                        class="form-control" id="answer2" aria-describedby="choiceHelp" placeholder="Enter choice 2">

                                        
                                        @error('answers.1.answer')
                                            <small class="text-danger">{{ $message}}</small>
                                        @enderror
                                    </div>
                                    </div>
                                                                        
                                    <div>
                                    <div class="form-group">
                                        <label for="answer3">Enter answer 3</label>
                                        <input type="text" name="answers[][answer]"
                                        value="{{ old('answers.2.answer') }}"
                                        class="form-control" id="answer3" aria-describedby="choiceHelp" placeholder="Enter choice 3">

                                        
                                        @error('answers.2.answer')
                                            <small class="text-danger">{{ $message}}</small>
                                        @enderror
                                    </div>
                                    </div>
                                                                        
                                    <div>
                                    <div class="form-group">
                                        <label for="answer4">Enter answer 4</label>
                                        <input type="text" name="answers[][answer]" 
                                        value="{{ old('answers.3.answer') }}"
                                        class="form-control" id="answer4" aria-describedby="choiceHelp" placeholder="Enter choice 4">

                                        
                                        @error('answers.3.answer')
                                            <small class="text-danger">{{ $message}}</small>
                                        @enderror
                                    </div>
                                    </div>
                            </fieldset>
                        </div>
                        
                        <button type="submit" class="btn btn-sm btn-primary">Add Question</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
