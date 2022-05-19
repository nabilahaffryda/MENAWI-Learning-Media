@extends('main')
@section('title', 'Quiz Theme Answer Edit Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Quiz Theme Answer Edit Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Quiz Theme Answer</a></li>
                        <li class="active">Edit</li>
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
                            <strong>Quiz Theme Answer</strong> Edit Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('quizthemeanswer.update', $quizthemeanswer->answer_id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="answer_id" class=" form-control-label">Answer ID</label>
                                    <input type="integer" id="answer_id" name="answer_id" placeholder="Answer ID"
                                        class="form-control" value="{{ $quizthemeanswer->answer_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="question_id" class=" form-control-label">Question</label>
                                    <select id="question_id" name="question_id" placeholder="Question" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose Question</option>
                                        <option value="{{ $quizthemeanswer->question_id }}">
                                            {{ $quizthemeanswer->questions->question }}
                                        </option>
                                        @foreach ($ques as $item)
                                            <option value="{{ $item->question_id }}">{{ $item->question }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="answer" class=" form-control-label">Answer</label>
                                    <input type="text" id="answer" name="answer" placeholder="Answer" class="form-control"
                                        value="{{ $quizthemeanswer->answer }}">
                                </div>
                                <div class="form-group">
                                    <label for="answer_status" class=" form-control-label">Answer
                                        Status</label>
                                    <input type="text" id="answer_status" name="answer_status" placeholder="Answer Status"
                                        class="form-control" value="{{ $quizthemeanswer->answer_status }}">
                                </div>
                                <div class="form-group">
                                    <label for="answer_pict" class=" form-control-label">Answer
                                        Picture</label>
                                    <input type="file" id="answer_pict" name="answer_pict" class="form-control-file"
                                        value="{{ $quizthemeanswer->answer_pict }}">
                                    <br>
                                    @if ($quizthemeanswer->answer_pict)
                                        <div style="max-height: 100px; max-width:100px; overflow:hidden;">
                                            <img src="{{ asset('storage/' . $quizthemeanswer->answer_pict) }}"
                                                alt="{{ $quizthemeanswer->answer_pict }}" class="img-fluid">
                                        </div>
                                    @else
                                    @endif
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
