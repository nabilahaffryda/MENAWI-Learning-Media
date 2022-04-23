@extends('mainAuth')
@section('title', 'Login')
@section('content')
<div class="card-body p-5 text-center">
  <h3 class="mb-5">Sign in</h3>
  <form>
    <div class="form-outline mb-4">
      <input type="text" id="username" class="form-control form-control-lg" placeholder="Username" />
    </div>
    <div class="form-outline mb-4">
      <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" />
    </div>
    <div class="form-check d-flex justify-content-start mb-4">
      <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
      <label class="form-check-label" for="form1Example3"> Remember password </label>
    </div>
    <button class="btn btn-primary btn-lg btn-block" type="submit">Sign in</button>
    <hr class="my-4">
    <div class="register-link m-t-15 text-center">
      <p>Don't have an account ? <a href="{{url('register')}}" style="color: black"> Sign Up Here</a>
      </p>
    </div>
  </form>
</div>
@endsection