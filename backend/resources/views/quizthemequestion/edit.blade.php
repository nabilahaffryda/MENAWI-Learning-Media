@extends('main')
@section('title', 'Quiz Theme Question Edit Data')
@section('breadcrumbs')
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1> Quiz Theme Question Edit Data</h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
          <div class="page-title">
              <ol class="breadcrumb text-right">
                  <li><a href="/">Dashboard</a></li>
                  <li><a href="javascript:history.back()">Quiz Theme Question</a></li>
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
            <strong>Quiz Theme Question</strong> Edit Data
          </div>
          <div class="card-body card-block">
            <form action="" method="post" class="">
               <div class="form-group"><label for="theme_question_id" class=" form-control-label">Theme Question ID</label><input type="integer" id="theme_question_id" name="theme_question_id" placeholder="Theme Question ID" class="form-control"></div>
              <div class="form-group"><label for="question" class=" form-control-label">Question</label><input type="text" id="question" name="question" placeholder="Question" class="form-control"></div>
              <div class="form-group"><label for="question_point" class=" form-control-label">Question Point</label><input type="integer" id="question_point" name="question_point" placeholder="Question Point" class="form-control"></div>
              <div class="form-group"><label for="question_pict" class=" form-control-label">Question Picture</label><input type="file" id="question_pict" name="question_pict" class="form-control-file"></div>
              <div class="form-group"><label for="theme_id" class=" form-control-label">Theme ID</label><input type="integer" id="theme_id" name="theme_id" placeholder="Theme ID" class="form-control"></div>
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