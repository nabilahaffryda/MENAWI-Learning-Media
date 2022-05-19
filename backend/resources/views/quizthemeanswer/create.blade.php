@extends('main')
@section('title', 'Quiz Theme Answer Add Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Quiz Theme Answer Add Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Quiz Theme Answer</a></li>
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
                            <strong>Quiz Theme Answer</strong> Add Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('quizthemeanswer.store') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="question_id" class=" form-control-label">Question</label>
                                    <select id="question_id" name="question_id" placeholder="Question" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose Question</option>
                                        @foreach ($ques as $item)
                                            <option value="{{ $item->question_id }}">{{ $item->question }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="answer" class=" form-control-label">Answer</label>
                                    <input type="text" id="answer" name="answer" placeholder="Answer"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="answer_status" class=" form-control-label">Answer Status</label>
                                    <input type="text" id="answer_status" name="answer_status" placeholder="Answer Status"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="answer_pict" class=" form-label">Answer Picture</label>
                                    <input type="file" id="answer_pict" name="answer_pict"
                                        class="form-control @error('answer_pict') is-invalid @enderror">
                                    @error('answer_pict')
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
    </div>
@endsection
