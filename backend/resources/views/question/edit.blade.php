@extends('main')
@section('title', 'Question Edit Data')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Question Edit Data</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="javascript:history.back()">Question</a></li>
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
                            <strong>Question</strong> Edit Data
                        </div>
                        <div class="card-body card-block">
                            <form autocomplete="off" action="{{ route('question.update', $question->question_id) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group"><label for="question_id" class=" form-control-label">
                                        Question ID</label><input type="integer" id="question_id" name="question_id"
                                        placeholder="Question ID" class="form-control"
                                        value="{{ $question->question_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="theme_id" class=" form-control-label">Theme</label>
                                    <select id="theme_id" name="theme_id" placeholder="Theme" style="width: 100%"
                                        class="form-control select2">
                                        <option disabled value>Choose Theme</option>
                                        <option value="{{ $question->theme_id }}">
                                            {{ $question->tema->theme_name }}
                                            @foreach ($quest as $item)
                                        <option value="{{ $item->theme_id }}">{{ $item->theme_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group"><label for="question"
                                        class=" form-control-label">Question</label><input type="text" id="question"
                                        value="{{ $question->question }}" name="question" placeholder="Question"
                                        class="form-control"></div>
                                <div class="form-group">
                                    <label for="correct_answer" class=" form-control-label">Correct Answer</label>
                                    <input type="text" id="correct_answer" name="correct_answer"
                                        value="{{ $question->correct_answer }}" placeholder="Correct Answer"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="bank_answer" class=" form-control-label">Bank Answer</label>
                                   @if (old('bank_answer'))
                                        @for ($i = 0; $i < count(old('bank_answer')); $i++)
                                            <div class="input-group mb-3">
                                                <input type="text" id="bank_answer" name="bank_answer[]"
                                                    placeholder="Bank Answer"   value="{{ json_decode(old($question->bank_answer[0]))}}" 
                                                    class="form-control" aria-describedby="button-addon2">
                                                <button class="btn btn-outline-secondary add_answer" type="button"
                                                    id="button-addon2">Add</button>
                                            </div>
                                        @endfor
                                    @endif 
                                </div>
                                @foreach (old('bank_answer', isset($question) ? $question->bank_answer : []) as $key => $item)
                                    @if ($loop->iteration != 0)
                                        <div class="input-group mb-3">
                                            <input type="text" id="bank_answer" name="bank_answer[]"
                                                placeholder="Bank Answer" class="form-control" value="{{ $item }}"
                                                aria-describedby="button-addon2">
                                            <button class="btn btn-outline-danger remove_answer" type="button"
                                                id="button-addon2">Remove</button>
                                        </div>
                                    @endif
                                @endforeach
                                <div id="extra-answer"></div>
                                <div class="form-group"><label for="question_pict" class=" form-control-label">Question
                                        Picture</label>
                                    <input type="file" id="question_pict" name="question_pict"
                                        value="{{ $question->question_pict }}" class="form-control-file">
                                    <br>
                                    @if ($question->question_pict)
                                        <div style="max-height: 100px; max-width:100px; overflow:hidden;">
                                            <img src="{{ asset('storage/' . $question->question_pict) }}"
                                                alt="{{ $question->question_pict }}" class="img-fluid">
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
@push('js')
    <script>
        const add = document.querySelectorAll(".input-group .add_answer")
        add.forEach(function(e) {
            e.addEventListener('click', function() {
                let element = this.parentElement
                // add new button
                let newElement = document.createElement('div')
                newElement.classList.add('input-group', 'mb-3')
                newElement.innerHTML = `<input type="text" id="bank_answer" name="bank_answer[]" placeholder="Bank Answer"
                                            class="form-control" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-danger remove_answer" type="button"
                                            id="button-addon2">Remove</button>`
                document.getElementById('extra-answer').appendChild(newElement)
            })
        })
        callEvent()
        // remove button
        function callEvent() {
            document.querySelectorAll('.remove_answer').forEach(function(remove) {
                remove.addEventListener('click', function(elmClick) {
                    elmClick.target.parentElement.remove()
                })
            })
        }
    </script>
@endpush
