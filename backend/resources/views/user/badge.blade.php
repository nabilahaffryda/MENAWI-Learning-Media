@extends('main')
@section('title', 'Quiz Level')
@section('breadcrumbs')
<div class="breadcrumbs">
   <div class="col-sm-4">
      <div class="page-header float-left">
         <div class="page-title">
            <h1>Badge</h1>
         </div>
      </div>
   </div>
   <div class="col-sm-8">
      <div class="page-header float-right">
         <div class="page-title">
            <ol class="breadcrumb text-right">
               <li><a href="#">Dashboard</a></li>
               <li><a href="#">Badge</a></li>
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
            <div class="pull-right"><a href="" class="btn btn-success btn sm">
               <i >Add</i>
               </a>
            </div>
         </div>
         <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Badge ID</th>
                     <th>Badge Name</th>
                     <th>Badge Pict Active</th>
                     <th>Badge Pict Non-Active</th>
                     <th>Badge Point</th>
                     <th>Badge Level</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Tiger Nixon</td>
                     <td>System Architect</td>
                     <td>Edinburgh</td>
                     <td>System Architect</td>
                     <td>Edinburgh</td>
                     <td>System Architect</td>
                     <td>Edinburgh</td>
                     <td>
                        <div >
                           <a href="" class="btn btn-primary btn sm">
                           <i class="fa fa-pencil"></i>
                           </a>
                           <a href="" class="btn btn-danger btn sm">
                           <i class="fa fa-trash"></i>
                           </a>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection