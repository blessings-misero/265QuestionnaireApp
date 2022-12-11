@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <a href="/questionnaires/create" class="btn btn-sm btn-dark">Create Quostionnaire</a>
                </div>


            </div>
            
            <div class="card mt-4">
                <div class="card-header">My Questionnaires</div>
                <div class="card-body">
                    
                    <ul class="list-group">

                        @foreach($questionnaires as $questonnaire)
                            <li class="list-group-item mt-2">
                                <a href="{{ $questonnaire->path() }}">{{ $questonnaire->title }}</a>
                                <div class="mt-2">
                                    <small class="font-weight-bold">Share URL</small>
                                    <p>
                                        <a href="{{ $questonnaire->publicPath() }}">
                                        {{ $questonnaire->publicPath() }}
                                        </a>
                                    </p>
                                </div>
                            </li>

                        @endforeach

                    </ul>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
