@extends('main')
@section('title', 'Badge Edit Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1> Badge Edit Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Badge</a></li>
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
                            <strong>Badge</strong> Edit Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('badge.update', $badge->badge_id) }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="badge_id" class="form-control-label">Badge
                                        ID</label>
                                    <input type="integer" id="badge_id" name="badge_id" placeholder="User ID"
                                        class="form-control" value="{{ $badge->badge_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="badge_name" class="form-control-label">Badge
                                        Name</label>
                                    <input type="text" id="badge_name" name="badge_name" placeholder="Badge Name"
                                        value="{{ $badge->badge_name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="badge_point" class="form-control-label">Badge
                                        Point</label>
                                    <input type="integer" id="badge_point" name="badge_point" placeholder="Badge Point"
                                        value="{{ $badge->badge_point }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="badge_level" class="form-control-label">Badge
                                        Level</label>
                                    <input type="integer" id="badge_level" name="badge_level" placeholder="Badge Level"
                                        value="{{ $badge->badge_level }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="badge_pict_active" class="form-label">Badge
                                        Pict Active</label>
                                    <input type="file" id="badge_pict_active" name="badge_pict_active"
                                        value="{{ $badge->badge_pict_active }}" class="form-control-file">
                                    <br>
                                    @if ($badge->badge_pict_active)
                                        <div style="max-height: 100px; max-width:100px; overflow:hidden;">
                                            <img src="{{ asset('storage/' . $badge->badge_pict_active) }}"
                                                alt="{{ $badge->badge_pict_active }}" class="img-fluid">
                                        </div>
                                    @else
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="badge_pict_non_active" class="form-label">Badge Pict
                                        Non-Active</label>
                                    <input type="file" id="badge_pict_non_active" name="badge_pict_non_active"
                                        value="{{ $badge->badge_pict_non_active }}" class="form-control-file">
                                    <br>
                                    @if ($badge->badge_pict_non_active)
                                        <div style="max-height: 100px; max-width:100px; overflow:hidden;">
                                            <img src="{{ asset('storage/' . $badge->badge_pict_non_active) }}"
                                                alt="{{ $badge->badge_pict_non_active }}" class="img-fluid">
                                        </div>
                                    @else
                                    @endif
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
