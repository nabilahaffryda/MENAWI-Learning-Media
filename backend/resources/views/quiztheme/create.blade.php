@extends('main')
@section('title', 'Quiz Theme Add Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Quiz Theme Add Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Quiz Theme</a></li>
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
                            <strong>Quiz Theme</strong> Add Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('quiztheme.store') }}" method="POST">
                                @csrf
                                <div class="form-group"><label for="level_id" class=" form-control-label">Level
                                        ID</label><input type="text" id="level_id" name="level_id" placeholder="Level ID"
                                        class="form-control"></div>
                                <div class="form-group"><label for="theme_name" class=" form-control-label">Theme
                                        Name</label><input type="text" id="theme_name" name="theme_name"
                                        placeholder="Theme Name" class="form-control"></div>
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
