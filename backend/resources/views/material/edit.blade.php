@extends('main')
@section('title', 'Materi Edit Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Materi Edit Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Materi</a></li>
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
                            <strong>Materi</strong> Edit Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('material.update', $material->material_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="material_id" class=" form-control-label">ID Materi</label>
                                    <input type="integer" id="material_id" name="material_id" placeholder="ID Materi"
                                        class="form-control" value="{{ $material->material_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="material_name" class=" form-control-label">Nama Materi</label>
                                    <input type="text" id="material_name" name="material_name" placeholder="Nama Materi"
                                        class="form-control" value="{{ $material->material_name }}">
                                </div>
                                <div class="form-group"><label for="material_desc"
                                        class=" form-control-label">Deskripsi</label><input type="text"
                                        id="material_desc" name="material_desc" value="{{ $material->material_desc }}"
                                        placeholder="Deskripsi" class="form-control"></div>
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
