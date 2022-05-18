@extends('main')
@section('title', 'Quiz Theme Question Edit Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Quiz Theme Question Edit Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Quiz Theme Question</a></li>
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
                            <strong>Quiz Theme Question</strong> Edit Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('quizthemequestion.update', $quizthemequestion->question_id) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group"><label for="question_id" class=" form-control-label">
                                        Question ID</label><input type="integer" id="question_id" name="question_id"
                                        placeholder="Question ID" class="form-control"
                                        value="{{ $quizthemequestion->question_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="theme_id" class=" form-control-label">Theme</label>
                                    <select id="theme_id" name="theme_id" placeholder="Theme" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose Theme</option>
                                        <option value="{{ $quizthemequestion->theme_id }}">
                                            {{ $quizthemequestion->tema->theme_name }}
                                            @foreach ($quest as $item)
                                        <option value="{{ $item->theme_id }}">{{ $item->theme_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><label for="question"
                                        class=" form-control-label">Question</label><input type="text" id="question"
                                        value="{{ $quizthemequestion->question }}" name="question" placeholder="Question"
                                        class="form-control"></div>
                                <div class="form-group"><label for="question_point" class=" form-control-label">Question
                                        Point</label><input type="integer" id="question_point" name="question_point"
                                        value="{{ $quizthemequestion->question_point }}" placeholder="Question Point"
                                        class="form-control"></div>
                                <div class="form-group"><label for="question_pict" class=" form-control-label">Question
                                        Picture</label>
                                    <input type="file" id="question_pict" name="question_pict"
                                        value="{{ $quizthemequestion->question_pict }}" class="form-control-file">
                                    <br>
                                    @if ($quizthemequestion->question_pict)
                                        <div style="max-height: 100px; max-width:100px; overflow:hidden;">
                                            <img src="{{ asset('storage/' . $quizthemequestion->question_pict) }}"
                                                alt="{{ $quizthemequestion->question_pict }}" class="img-fluid">
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
