@extends('main')
@section('title', 'Jawaban Edit Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Jawaban Edit Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li><a href="/answer">Jawaban</a></li>
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
                            <strong>Jawaban</strong> Edit Data
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route('answer.update', $answer->answer_id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="user_id" class=" form-control-label">User</label>
                                    <select id="user_id" name="user_id" placeholder="User" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Pilih User</option>
                                        <option value="{{ $answer->user_id }}">{{ $answer->users->username }}
                                            @foreach ($usr as $item)
                                        <option value="{{ $item->user_id }}">{{ $item->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="answer_id" class=" form-control-label">ID Jawaban</label>
                                    <input type="integer" id="answer_id" name="answer_id" placeholder="ID Jawaban"
                                        class="form-control" value="{{ $answer->answer_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="question_id" class=" form-control-label">Pertanyaan</label>
                                    <select id="question_id" name="question_id" placeholder="Pertanyaan" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Pilih Pertanyaan</option>
                                        <option value="{{ $answer->question_id }}">
                                            {{ $answer->quest->question }}
                                        </option>
                                        @foreach ($ques as $item)
                                            <option value="{{ $item->question_id }}">{{ $item->question }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="answer" class=" form-control-label">Jawaban</label>
                                    <input type="text" id="answer" name="answer" placeholder="Jawaban"
                                        class="form-control" value="{{ $answer->answer }}">
                                </div>
                                <div class="form-group">
                                    <label for="point" class=" form-control-label">Poin</label>
                                    <input type="integer" id="point" name="point" placeholder="Poin"
                                        class="form-control" value="{{ $answer->point }}">
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
