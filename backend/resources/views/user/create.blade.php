@extends('main')
@section('title', 'User Tambah Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> User Tambah Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">User</a></li>
                        <li class="active">Tambah</li>
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
                            <strong>User</strong> Tambah Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="username" class="form-control-label">Username</label>
                                    <input type="text" id="username" name="username" placeholder="Username"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Nama</label>
                                    <input type="text" id="name" name="name" placeholder="Nama"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password</label>
                                    <input type="password" id="password" name="password" placeholder="Password"
                                        class="form-control">
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
