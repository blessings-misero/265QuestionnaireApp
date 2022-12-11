@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                <a href="/questionnaires" class="btn btn-sm btn-dark mb-3">Create new Questionnaire</a>
                    <form action="/questionnaires" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">Enter Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp" placeholder="Enter title">
                            <small id="titleHelp" class="form-text text-muted">Give your questionaire a title that attract attention.</small>
                            
                            @error('title')
                                <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="purpose">Enter Purpose</label>
                            <input type="text" name="purpose" class="form-control" id="exampleInputpurpose" aria-describedby="purposeHelp" placeholder="Enter purpose">
                            <small id="purposeHelp" class="form-text text-muted">Giving a purpose will increase response.</small>

                            
                            @error('purpose')
                                <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Create Questionnaire</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
