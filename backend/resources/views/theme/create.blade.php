@extends('main')
@section('title', 'Theme Add Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Theme Add Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Theme</a></li>
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
                            <strong>Theme</strong> Add Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('theme.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="level_id" class=" form-control-label">Level</label>
                                    <select id="level_id" name="level_id" placeholder="Level ID" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose Level</option>
                                        @foreach ($lev as $item)
                                            <option value="{{ $item->level_id }}">{{ $item->level_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="theme_name" class=" form-control-label">Theme
                                        Name</label>
                                    <input type="text" id="theme_name" name="theme_name" placeholder="Theme Name"
                                        class="form-control">
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
