@extends('mainAuth')
@section('title', 'Register')
@section('content')
    <div class="card-body p-4 text-center">
        <h3 class="mb-4">Daftar</h3>
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
                <input type="text" id="name" name="name" class="form-control" placeholder="Nama">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Daftar</button>
            </div>
            <hr class="my-4">
            <div class="register-link m-t-15 text-center">
                <p>Sudah memiliki akun? <a href="{{ url('/login') }}" style="color: black;"><u>Masuk disini</u></a></p>
            </div>
        </form>
    </div>
@endsection
