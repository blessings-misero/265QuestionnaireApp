@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>
                    
                <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
                    @csrf

                    @foreach($questionnaire->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{ $key + 1 }}</strong>. {{ $question->question }}</div>
                            
                            <div class="card-body">

                                @error('responses.' . $key . '.answer_id')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror

                                <ul class="list-group">
                                    @foreach($question->answers as $answer)
                                        <label for="answer{{ $answer->id }}">
                                            
                                        <li class="list-group-item">
                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                            <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}" 
                                                {{ (old('responses.' . $key . '.answer_id') == $answer->id ? 'checked' : '' ) }}
                                                class="mr-2" value="{{ $answer->id }}">
                                            {{ $answer->answer }}

                                        </li>

                                        </label>
                                    @endforeach
                                </ul>
                            </div>

                    </div>

                    @endforeach

                        <div class=" mt-4">
                            <div class="card-header">Your Information</div>
                                <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Enter Your Name</label>
                                                <input type="text" name="survey[name]" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Enter Your Name">
                                                <small id="nameHelp" class="form-text text-muted">Hello! what's your name?</small>
                                                
                                                @error('name')
                                                    <small class="text-danger">{{ $message}}</small>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="email">Enter Your Email</label>
                                                <input type="email" name="survey[email]" class="form-control" id="exampleInputemail" aria-describedby="emailHelp" placeholder="Enter Your Email">
                                                <small id="emailHelp" class="form-text text-muted">Your EMail please!</small>

                                                
                                                @error('email')
                                                    <small class="text-danger">{{ $message}}</small>
                                                @enderror
                                            </div>
                                </div>

                        </div>
                <button class="btn btn-sm btn-dark" type="submit">Complete Survey</button>
                </form>
        </div>
    </div>
</div>
@endsection
