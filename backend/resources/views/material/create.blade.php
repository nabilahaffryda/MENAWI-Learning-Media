@extends('main')
@section('title', 'Material Add Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Material Add Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Material</a></li>
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
                            <strong>Material</strong> Add Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('material.store') }}" method="POST">
                                @csrf
                                <div class="form-group"><label for="material_name" class=" form-control-label">Material
                                        Name</label><input type="text" id="material_name" name="material_name"
                                        placeholder="Material Name" class="form-control"></div>
                                <div class="form-group"><label for="material_desc" class=" form-control-label">Short
                                        Description</label><input type="text" id="material_desc" name="material_desc"
                                        placeholder="Short Description" class="form-control"></div>
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
