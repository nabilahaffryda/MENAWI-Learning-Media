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
            <form action="" method="post" class="">
               <div class="form-group"><label for="badge_id" class=" form-control-label">Badge ID</label><input type="integer" id="badge_id" name="badge_id" placeholder="User ID" class="form-control"></div>
              <div class="form-group"><label for="badge_name" class=" form-control-label">Badge Name</label><input type="text" id="badge_name" name="badge_name" placeholder="Badge Name" class="form-control"></div>
              <div class="form-group"><label for="badge_pict_active" class=" form-control-label">Badge Pict Active</label><input type="file" id="badge_pict_active" name="badge_pict_active" class="form-control-file"></div>
              <div class="form-group"><label for="badge_pict_non_active" class=" form-control-label">Badge Pict Non-Active</label><input type="file" id="badge_pict_non_active" name="badge_pict_non_active" class="form-control-file"></div>
              <div class="form-group"><label for="badge_point" class=" form-control-label">Badge Point</label><input type="text" id="badge_point" name="badge_point" placeholder="Badge Point" class="form-control"></div>
              <div class="form-group"><label for="badge_level" class=" form-control-label">Badge Level</label><input type="text" id="badge_level" name="badge_level" placeholder="Badge Level" class="form-control"></div>
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