@extends('main')
@section('title', 'Materi Tambah Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Materi Tambah Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li><a href="/material">Materi</a></li>
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
                            <strong>Materi</strong> Tambah Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('material.store') }}" method="POST">
                                @csrf
                                <div class="form-group"><label for="material_name" class=" form-control-label">Nama
                                        Materi</label><input type="text" id="material_name" name="material_name"
                                        placeholder="Nama Materi" class="form-control"></div>
                                <div class="form-group"><label for="material_desc"
                                        class=" form-control-label">Deskripsi</label><input type="text"
                                        id="material_desc" name="material_desc" placeholder="Deskripsi"
                                        class="form-control"></div>
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
