@extends('main')
@section('title', 'Quiz Theme Answer')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Quiz Theme Answer</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="">Quiz Theme Answer</a></li>
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
                            <div class="pull-right"><a href="{{ route('quizthemeanswer.create') }}"
                                    class="btn btn-primary btn sm">
                                    Add Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Answer ID</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Answer Status</th>
                                        <th>Answer Picture</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quizthemeanswer as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->answer_id }}</td>
                                            <td>{{ $item->questions->question }}</td>
                                            <td>{{ $item->answer }}</td>
                                            <td>{{ $item->answer_status }}</td>
                                            <td>
                                                @if ($item->answer_pict)
                                                    <div style="max-height: 100px; max-width:100px; overflow:hidden;">
                                                        <img src="{{ asset('storage/' . $item->answer_pict) }}"
                                                            alt="{{ $item->answer_pict }}" class="img-fluid">
                                                    </div>
                                                @else
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="{{ route('quizthemeanswer.edit', $item->answer_id) }}"
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
                            <form action="{{ route('quizthemeanswer.destroy', $item->answer_id) }}" method="POST">
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
