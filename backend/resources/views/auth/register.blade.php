@extends('mainAuth')
@section('title', 'Register')
@section('content')
    <div class="card-body p-4 text-center">
        <h3 class="mb-4">Sign Up</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/registerPost') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" />
            </div>
            <div class="form-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
            </div>
            <hr class="my-4">
            <div class="register-link m-t-15 text-center">
                <p>Already have an account ? <a href="{{ url('/login') }}" style="color: black"> Sign in Here</a></p>
            </div>
        </form>
    </div>
@endsection
