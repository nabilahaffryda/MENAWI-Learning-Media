@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        {{-- user --}}
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total User</div>
                            <div class="stat-digit">{{ $user }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- question --}}
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-book text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Materi</div>
                            <div class="stat-digit">{{ $material }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- answer --}}
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-write text-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Deskripsi</div>
                            <div class="stat-digit">{{ $description }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- description --}}
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-stats-up text-info border-info"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Level</div>
                            <div class="stat-digit">{{ $level }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-files text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Tema</div>
                            <div class="stat-digit">{{ $theme }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-menu-alt text-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Pertanyaan</div>
                            <div class="stat-digit">{{ $question }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-import text-info border-info"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Jawaban</div>
                            <div class="stat-digit">{{ $answer }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
