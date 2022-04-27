@extends('main')
@section('title', 'Material Edit Data')
@section('breadcrumbs')
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1> Material Edit Data</h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
          <div class="page-title">
              <ol class="breadcrumb text-right">
                  <li><a href="/">Dashboard</a></li>
                  <li><a href="javascript:history.back()">Material</a></li>
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
            <strong>Material</strong> Edit Data
          </div>
          <div class="card-body card-block">
            <form action="" method="post" class="">
                <div class="form-group"><label for="material_id" class=" form-control-label">Material ID</label><input type="integer" id="material_id" name="material_id" placeholder="Material ID" class="form-control"></div>
              <div class="form-group"><label for="material_name" class=" form-control-label">Material Name</label><input type="text" id="material_name" name="material_name" placeholder="Material Name" class="form-control"></div>
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