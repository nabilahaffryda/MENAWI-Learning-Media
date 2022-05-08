@extends('main')
@section('title', 'User Badge Add Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> User Badge Add Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">User Badge</a></li>
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
                            <strong>User Badge</strong> Add Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('userbadge.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="badge_id" class="form-control-label">Badge ID</label>
                                    <input type="integer" id="badge_id" name="badge_id" placeholder="Badge ID"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="user_id" class="form-control-label">User ID</label>
                                    <input type="integer" id="user_id" name="user_id" placeholder="User ID"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="badge_status" class="form-control-label">Badge Status</label>
                                    <input type="text" id="badge_status" name="badge_status" placeholder="Badge Status"
                                        class="form-control">
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
