@extends('main')
@section('title', 'Deskripsi Edit Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Deskripsi Edit Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Deskripsi</a></li>
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
                            <strong>Deskripsi</strong> Edit Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('description.update', $description->desc_id) }}"
                                enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    @csrf
                                    @method('PUT')
                                    <label for="desc_id" class=" form-control-label">ID Deskripsi</label>
                                    <input type="integer" id="desc_id" name="desc_id" placeholder="ID Deskripsi"
                                        class="form-control" value="{{ $description->desc_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="material_id" class=" form-control-label">Materi</label>
                                    <select id="material_id" name="material_id" placeholder="Materi" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Pilih Materi</option>
                                        <option value="{{ $description->material_id }}">
                                            {{ $description->material->material_name }}
                                            @foreach ($mtrl as $item)
                                        <option value="{{ $item->material_id }}">{{ $item->material_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description" class=" form-control-label">Deskripsi</label>
                                    <input type="text" id="description" name="description" placeholder="Deskripsi"
                                        class="form-control" value="{{ $description->description }}">
                                </div>
                                <div class="form-group">
                                    <label for="desc_pict" class=" form-control-label">Gambar Deskripsi</label>
                                    <input type="file" id="desc_pict" name="desc_pict" class="form-control-file"
                                        value="{{ $description->desc_pict }}">
                                    <br>
                                    @if ($description->desc_pict)
                                        <div style="max-height: 100px; max-width:100px; overflow:hidden;">
                                            <img src="{{ asset('storage/' . $description->desc_pict) }}"
                                                alt="{{ $description->desc_pict }}" class="img-fluid">
                                        </div>
                                    @else
                                    @endif
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
