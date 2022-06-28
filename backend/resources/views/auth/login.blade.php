@extends('mainAuth')
@section('title', 'Login')
@section('content')
    <div class="card-body p-4 text-center">
        <h3 class="mb-4">Masuk</h3>
        @if (\Session::has('alert'))
            <div class="alert alert-danger">
                <div>{{ Session::get('alert') }}</div>
            </div>
        @endif
        @if (\Session::has('alert-success'))
            <div class="alert alert-success">
                <div>{{ Session::get('alert-success') }}</div>
            </div>
        @endif
        <form action="{{ url('/loginPost') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
            </div>
            <hr class="my-4">
            <div class="register-link m-t-15 text-center">
                <p>Belum memiliki akun? <a href="{{ url('/register') }}" style="color: black"><u>Daftar disini</u></a>
                </p>
            </div>
        </form>
    </div>
@endsection
