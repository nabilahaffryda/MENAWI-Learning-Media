@extends('main')
@section('title', 'Material Desc')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Material Desc</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="">Material Desc</a></li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-left"><strong class="card-title">Data Table</strong></div>
                            <div class="pull-right"><a href="{{ route('materialdesc.create') }}"
                                    class="btn btn-primary btn sm">
                                    Add Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Material Desc ID</th>
                                        <th>Material ID</th>
                                        <th>Description</th>
                                        <th>Description Pict</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materialdesc as $index => $materialdescs)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $materialdescs->desc_id }}</td>
                                            <td>{{ $materialdescs->material_id }}</td>
                                            <td>{{ $materialdescs->description }}</td>
                                            <td>
                                                @if ($materialdescs->desc_pict)
                                                    <div style="max-height: 100px; max-width:100px; overflow:hidden;">
                                                        <img src="{{ asset('storage/' . $materialdescs->desc_pict) }}"
                                                            alt="{{ $materialdescs->desc_pict }}" class="img-fluid">
                                                    </div>
                                                @else
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="{{ route('materialdesc.edit', $materialdescs->desc_id) }}"
                                                        class="btn btn-primary btn sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#smallmodal">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog"
                        aria-labelledby="smallmodalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-sm" role="document">
                            <form action="{{ route('materialdesc.destroy', $materialdescs->desc_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticModalLabel">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Are you sure you want to delete this data?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
