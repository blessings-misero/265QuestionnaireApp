@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>
                <div class="card-body">
                    <a href="/questionnaires/{{ $questionnaire->id }}/questions/create" class="btn btn-sm btn-dark">Add New Question</a>
                    <a href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" class="btn btn-sm btn-dark">Take Survey</a>
                </div>
            </div>
            @foreach($questionnaire->questions as $question)
            <div class="card mt-4">
                <div class="card-header">{{ $question->question }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>{{ $answer->answer }}</div>
                                    @if($question->responses->count())
                                        <div>{{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}%</div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-footer">
                        <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{ $question->id }}" method="post">
                            @method('DELETE')
                            @csrf

                            <button class="btn btn-sm btn-outline-danger" type="submit"> Delete Question </button>
                        </form>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
