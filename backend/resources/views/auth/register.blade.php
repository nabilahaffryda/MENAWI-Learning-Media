@extends('mainAuth')
@section('title', 'Register')
@section('content')
    <div class="card-body p-4 text-center">
        <h3 class="mb-4">Daftar</h3>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" id="username" name="username" value="{{ old('username') }}"
                    class="form-control @error('username') is-invalid @enderror" placeholder="Username" required />
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" id="name" name="name" required value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror" placeholder="Nama">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" required class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
