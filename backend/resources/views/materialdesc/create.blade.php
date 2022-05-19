@extends('main')
@section('title', 'Material Desc Add Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Material Desc Add Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Material Desc</a></li>
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
                            <strong>Material Desc</strong> Add Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('materialdesc.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="material_id" class=" form-control-label">Material</label>
                                    <select id="material_id" name="material_id" placeholder="Material" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose Material</option>
                                        @foreach ($mtrl as $item)
                                            <option value="{{ $item->material_id }}">{{ $item->material_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description" class=" form-control-label">Description</label>
                                    <input type="text" id="description" name="description" placeholder="Description"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="desc_pict" class="form-label">Description
                                        Pict</label>
                                    <input type="file" id="desc_pict" name="desc_pict"
                                        class="form-control @error('desc_pict') is-invalid @enderror">
                                    @error('desc_pict')
                                        <div class="invalid-feedback">{{ 'Image size is too big' }}</div>
                                    @enderror
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
