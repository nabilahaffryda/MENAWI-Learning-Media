@extends('main')
@section('title', 'Quiz Theme Question Add Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Quiz Theme Question Add Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Quiz Theme Question</a></li>
                        <li class="active">Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Quiz Theme Question</strong> Add Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('quizthemequestion.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group"><label for="theme_id" class=" form-control-label">Theme
                                        ID</label>
                                    <input type="integer" id="theme_id" name="theme_id" placeholder="Theme ID"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="question" class=" form-control-label">Question</label>
                                    <input type="text" id="question" name="question" placeholder="Question"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="question_point" class=" form-control-label">Question Point</label>
                                    <input type="integer" id="question_point" name="question_point"
                                        placeholder="Question Point" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="question_pict" class="form-label">Question
                                        Picture</label>
                                    <input class="form-control @error('question_pict') is-invalid @enderror" type="file"
                                        id="question_pict" name="question_pict">
                                    @error('question_pict')
                                        <div class="invalid-feedback">{{ 'The image must be an image' }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm pull-right">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
