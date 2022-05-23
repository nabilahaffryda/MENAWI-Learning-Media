@extends('main')
@section('title', 'Question Add Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Question Add Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Question</a></li>
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
                            <strong>Question</strong> Add Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('question.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="theme_id" class=" form-control-label">Theme</label>
                                    <select id="theme_id" name="theme_id" placeholder="Theme" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose Theme</option>
                                        @foreach ($quest as $item)
                                            <option value="{{ $item->theme_id }}">{{ $item->theme_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="question" class=" form-control-label">Question</label>
                                    <input type="text" id="question" name="question" placeholder="Question"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="correct_answer" class=" form-control-label">Correct Answer</label>
                                    <input type="text" id="correct_answer" name="correct_answer"
                                        placeholder="Correct Answer" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="bank_answer" class=" form-control-label">Bank Answer</label>
                                    <input type="text" id="bank_answer" name="bank_answer" placeholder="Bank Answer"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="question_pict" class="form-label">Question
                                        Picture</label>
                                    <input class="form-control @error('question_pict') is-invalid @enderror" type="file"
                                        id="question_pict" name="question_pict">
                                    @error('question_pict')
                                        <div class="invalid-feedback">{{ 'Image size is too big' }}</div>
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
