@extends('mainAuth')
@section('title', 'Register')
@section('content')
<div class="card-body p-5 text-center">
   <h3 class="mb-5">Sign Up</h3>
   <form>
      <div class="form-outline mb-4"><input type="text" id="username" class="form-control form-control-lg" placeholder="Username" /></div>
      <div class="form-outline mb-4"><input type="text" id="nama" class="form-control form-control-lg" placeholder="Name"></div>
      <div class="form-outline mb-4"><input type="password" id="password" class="form-control form-control-lg" placeholder="Password" /></div>
      <button class="btn btn-primary btn-lg btn-block" type="submit">Sign Up</button>
      <hr class="my-4">
      <div class="register-link m-t-15 text-center">
         <p>Already have an account ? <a href="{{url('login')}}" style="color: black"> Sign in Here</a></p>
      </div>
   </form>
</div>
</div>
</div>
</div>
</div>
@endsection