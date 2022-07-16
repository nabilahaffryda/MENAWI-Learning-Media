@extends('main')
@section('title', 'Pertanyaan')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Pertanyaan</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li><a href="/question">Pertanyaan</a></li>
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
                            <div class="pull-left"><strong class="card-title">Data Tabel</strong></div>
                            <div class="pull-right"><a href="{{ route('question.create') }}"
                                    class="btn btn-primary btn sm">
                                    Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pertanyaan</th>
                                        <th>Level</th>
                                        <th>Tema</th>
                                        <th>Pertanyaan</th>
                                        <th>Jawaban Benar</th>
                                        <th>Bank Jawaban</th>
                                        <th>Gambar Pertanyaan</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($question as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->question_id }}</td>
                                            <td>{{ $item->lev->level_name }}</td>
                                            <td>{{ $item->tema->theme_name }}</td>
                                            <td>{{ $item->question }}</td>
                                            <td>{{ $item->correct_answer }}</td>
                                            <td>{{ json_encode($item->bank_answer) }}</td>
                                            <td>
                                                @if ($item->question_pict)
                                                    <div style="max-height: 100px; max-width:100px; overflow:hidden;">
                                                        <img src="{{ asset('storage/' . $item->question_pict) }}"
                                                            alt="{{ $item->question_pict }}" class="img-fluid">
                                                    </div>
                                                @else
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="{{ route('question.edit', $item->question_id) }}"
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
                    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel"
                        aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-sm" role="document">
                            <form action="{{ route('question.destroy', $item->question_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticModalLabel">Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Anda yakin ingin menghapus data ini?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">OK</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
