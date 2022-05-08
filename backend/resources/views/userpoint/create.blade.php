@extends('main')
@section('title', 'User Point Add Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> User Point Add Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">User Point</a></li>
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
                            <strong>User Point</strong> Add Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('userpoint.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="user_id" class="form-control-label">User ID</label>
                                    <input type="integer" id="user_id" name="user_id" placeholder="User ID"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="theme_question_id" class="form-control-label">Theme Question ID</label>
                                    <input type="integer" id="theme_question_id" name="theme_question_id"
                                        placeholder="Theme Question ID" class="form-control">
                                </div>
                                <div class="form-group"><label for="total_point" class=" form-control-label">Total
                                        Point</label><input type="integer" id="total_point" name="total_point"
                                        placeholder="Total Point" class="form-control"></div>
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
