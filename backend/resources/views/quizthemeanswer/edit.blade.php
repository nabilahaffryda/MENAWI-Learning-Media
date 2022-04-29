@extends('main')
@section('title', 'Quiz Theme Answer Edit Data')
@section('breadcrumbs')
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1> Quiz Theme Answer Edit Data</h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
          <div class="page-title">
              <ol class="breadcrumb text-right">
                  <li><a href="/">Dashboard</a></li>
                  <li><a href="javascript:history.back()">Quiz Theme Answer</a></li>
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
            <strong>Quiz Theme Answer</strong> Edit Data
          </div>
          <div class="card-body card-block">
            <form action="" method="post" class="">
               <div class="form-group"><label for="theme_question_id" class=" form-control-label">Theme Question ID</label><input type="integer" id="theme_question_id" name="theme_question_id" placeholder="Theme Question ID" class="form-control"></div>
              <div class="form-group"><label for="answer" class=" form-control-label">Answer</label><input type="text" id="answer" name="answer" placeholder="Answer" class="form-control"></div>
              <div class="form-group"><label for="answer_status" class=" form-control-label">Answer Status</label><input type="text" id="answer_status" name="answer_status" placeholder="Answer Status" class="form-control"></div>
              <div class="form-group"><label for="answer_pict" class=" form-control-label">Answer Picture</label><input type="file" id="answer_pict" name="answer_pict" class="form-control-file"></div>
            </form>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm pull-right">
              Submit
            </button>
          </div>
        </div>
         </div>
      </div>
   </div>
</div>
@endsection