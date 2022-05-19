@extends('main')
@section('title', 'User Badge Edit Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> User Badge Edit Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">User Badge</a></li>
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
                            <strong>User Badge</strong> Edit Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('userbadge.update', $userbadge->user_badge_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="user_badge_id" class="form-control-label">User Badge ID</label>
                                    <input type="integer" id="user_badge_id" name="user_badge_id"
                                        placeholder="User Badge ID" class="form-control"
                                        value="{{ $userbadge->user_badge_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="badge_id" class=" form-control-label">Badge</label>
                                    <select id="badge_id" name="badge_id" placeholder="Badge" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose Badge</option>
                                        <option value="{{ $userbadge->badge_id }}">{{ $userbadge->badge->badge_name }}
                                            @foreach ($bdg as $item)
                                        <option value="{{ $item->badge_id }}">{{ $item->badge_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="user_id" class=" form-control-label">User</label>
                                    <select id="user_id" name="user_id" placeholder="User" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose User</option>
                                        <option value="{{ $userbadge->user_id }}">{{ $userbadge->user->username }}
                                            @foreach ($us as $item)
                                        <option value="{{ $item->user_id }}">{{ $item->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="badge_status" class="form-control-label">Badge Status</label>
                                    <input type="text" id="badge_status" name="badge_status" placeholder="Badge Status"
                                        class="form-control" value="{{ $userbadge->badge_status }}">
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
