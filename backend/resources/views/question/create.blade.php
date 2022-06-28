@extends('main')
@section('title', 'Pertanyaan Tambah Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Pertanyaan Tambah Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Pertanyaan</a></li>
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
                            <strong>Pertanyaan</strong> Tambah Data
                        </div>
                        <div class="card-body card-block">
                            <form autocomplete="off" action="{{ route('question.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="level_id" class=" form-control-label">Level</label>
                                    <select id="level_id" name="level_id" placeholder="Level" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Pilih Level</option>
                                        @foreach ($lvl as $item)
                                            <option value="{{ $item->level_id }}">{{ $item->level_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="theme_id" class=" form-control-label">Tema</label>
                                    <select id="theme_id" name="theme_id" placeholder="Tema" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Pilih Tema</option>
                                        @foreach ($quest as $item)
                                            <option value="{{ $item->theme_id }}">{{ $item->theme_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="question" class=" form-control-label">Pertanyaan</label>
                                    <input type="text" id="question" name="question" placeholder="Pertanyaan"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="correct_answer" class=" form-control-label">Jawaban Benar</label>
                                    <input type="text" id="correct_answer" name="correct_answer"
                                        placeholder="Jawaban Benar" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="bank_answer" class=" form-control-label">Bank Jawaban</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="bank_answer" name="bank_answer[]"
                                            placeholder="Bank Jawaban A" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" id="bank_answer" name="bank_answer[]"
                                            placeholder="Bank Jawaban B" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" id="bank_answer" name="bank_answer[]"
                                            placeholder="Bank Jawaban C" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" id="bank_answer" name="bank_answer[]"
                                            placeholder="Bank Jawaban D" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="question_pict" class="form-label">Gambar Pertanyaan</label>
                                    <input class="form-control @error('question_pict') is-invalid @enderror" type="file"
                                        id="question_pict" name="question_pict">
                                    @error('question_pict')
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
    @endsection
