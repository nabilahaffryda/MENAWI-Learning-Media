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
            <div class="pull-right"><a href="{{url('quizthemeanswer/add')}}" class="btn btn-primary btn sm">
               Add Data</a>
            </div>
         </div>
         <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Theme Question ID</th>
                     <th>Answer</th>
                     <th>Answer Status</th>
                     <th>Answer Picture</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Tiger Nixon</td>
                     <td>Tiger Nixon</td>
                     <td>System Architect</td>
                     <td>System Architect</td>
                     <td>Edinburgh</td>
                     <td>
                        <div >
                           <a href="{{url('quizthemeanswer/edit')}}" class="btn btn-primary btn sm">
                           <i class="fa fa-pencil"></i>
                           </a>
                           <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#staticModal" data-backdrop="false" >
                              <i class="fa fa-trash"></i>
                              </button>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <div class="modal hide fade in" data-keyboard="false" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" >
         <div class="modal-dialog modal-sm" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="staticModalLabel">Delete</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                     <button type="button" class="btn btn-primary">Confirm</button>
                 </div>
             </div>
         </div>
     </div>
   </div>
</div>
@endsection