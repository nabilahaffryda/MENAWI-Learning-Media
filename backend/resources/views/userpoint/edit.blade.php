@extends('main')
@section('title', 'User Point Edit Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> User Point Edit Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">User Point</a></li>
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
                            <strong>User Point</strong> Edit Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('userpoint.update', $userpoint->theme_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="user_id" class=" form-control-label">User</label>
                                    <select id="user_id" name="user_id" placeholder="User" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose User</option>
                                        <option value="{{ $userpoint->user_id }}">{{ $userpoint->users->username }}
                                            @foreach ($usr as $item)
                                        <option value="{{ $item->user_id }}">{{ $item->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="theme_id" class=" form-control-label">Theme</label>
                                    <select id="theme_id" name="theme_id" placeholder="Theme" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose Theme</option>
                                        <option value="{{ $userpoint->theme_id }}">{{ $userpoint->themes->theme_name }}
                                            @foreach ($thm as $item)
                                        <option value="{{ $item->theme_id }}">{{ $item->theme_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="total_point" class=" form-control-label">Total
                                        Point</label>
                                    <input type="integer" id="total_point" name="total_point"
                                        value="{{ $userpoint->total_point }}" placeholder="Total Point"
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
