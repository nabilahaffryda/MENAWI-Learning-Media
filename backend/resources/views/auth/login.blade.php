@extends('mainAuth')
@section('title', 'Login')
@section('content')
    <div class="card-body p-4 text-center">
        <h3 class="mb-4">Masuk</h3>
        @if (session()->has('success'))
            <div class="alert with-close alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('loginError'))
            <div class="alert with-close alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('alert'))
            <div class="alert with-close alert-success alert-dismissible fade show" role="alert">
                {{ session('alert') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <br>
        <form action="{{ url('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" id="username" name="username" value="{{ old('username') }}"
                    class="form-control @error('username') is-invalid @enderror" placeholder="Username" autofocus
                    required />
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
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
