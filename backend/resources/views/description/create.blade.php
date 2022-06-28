@extends('main')
@section('title', 'Deskripsi Tambah Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Deskripsi Tambah Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Deskripsi</a></li>
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
                            <strong>Deskripsi</strong> Tambah Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('description.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="material_id" class=" form-control-label">Materi</label>
                                    <select id="material_id" name="material_id" placeholder="Materi" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Pilih Materi</option>
                                        @foreach ($mtrl as $item)
                                            <option value="{{ $item->material_id }}">{{ $item->material_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description" class=" form-control-label">Deskripsi</label>
                                    <input type="text" id="description" name="description" placeholder="Deskripsi"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="desc_pict" class="form-label">Gambar Deskripsi</label>
                                    <input type="file" id="desc_pict" name="desc_pict"
                                        class="form-control @error('desc_pict') is-invalid @enderror">
                                    @error('desc_pict')
                                        <div class="invalid-feedback">{{ 'Ukuran gambar terlalu besar' }}</div>
                                    @enderror
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
