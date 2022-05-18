@extends('main')
@section('title', 'Quiz Theme Edit Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Quiz Theme Edit Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Quiz Theme</a></li>
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
                            <strong>Quiz Theme</strong> Edit Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('quiztheme.update', $quiztheme->theme_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group"><label for="theme_id" class=" form-control-label">Theme
                                        ID</label><input type="integer" id="theme_id" name="theme_id" placeholder="Theme ID"
                                        class="form-control" value="{{ $quiztheme->theme_id }}"></div>
                                <div class="form-group">
                                    <label for="level_id" class=" form-control-label">Level</label>
                                    <select id="level_id" name="level_id" placeholder="Level ID" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose Level</option>
                                        <option value="{{ $quiztheme->level_id }}">{{ $quiztheme->level->level_name }}
                                        </option>
                                        @foreach ($lev as $item)
                                            <option value="{{ $item->level_id }}">{{ $item->level_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><label for="theme_name" class=" form-control-label">Theme
                                        Name</label><input type="text" id="theme_name" name="theme_name"
                                        placeholder="Theme Name" class="form-control"
                                        value="{{ $quiztheme->theme_name }}"></div>
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
