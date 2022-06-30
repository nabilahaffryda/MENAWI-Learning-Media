@extends('main')
@section('title', 'User Edit Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> User Edit Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">User</a></li>
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
                            <strong>User</strong> Edit Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('user.update', $user->user_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="user_id" class=" form-control-label">User ID</label>
                                    <input type="integer" id="user_id" name="user_id" placeholder="User ID"
                                        class="form-control" value="{{ $user->user_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="username" class=" form-control-label">Username</label>
                                    <input type="text" id="username" name="username" placeholder="Username"
                                        class="form-control" value="{{ $user->username }}">
                                </div>
                                <div class="form-group">
                                    <label for="name" class=" form-control-label">Nama</label>
                                    <input type="text" id="name" name="name" placeholder="Nama"
                                        class="form-control" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm pull-right">
                                        Simpan
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
