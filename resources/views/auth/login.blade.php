@extends('layouts.main')

@section('title', 'Login')

@section('site-content')
<div class="container">
    <div class="form-style">
        <div class="form-style-heading">
            <span class="heading text-white">Masuk</span>
        </div>
        <div class="form-style-content">
            {{ Form::open(['route' => 'login', 'id' => 'loginForm']) }}
                <div class="form-group">
                    {{ Form::email('email', @old('email'), ['class' => 'form-control '.($errors->has('email') ? 'is-invalid' : ''), 'placeholder' => 'Masukkan alamat surel', 'autofocus' => '']) }}
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::password('password', ['class' => 'form-control '.($errors->has('password') ? 'is-invalid' : ''), 'placeholder' => 'Masukkan kata sandi', 'autocomplete' => 'current-password']) }}
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-right">
                    <a href="{{ route('password.request') }}" class="text-success">Lupa kata sandi</a>
                </div>
                <div style="margin-top: 24px;">
                    <button class="btn btn-outline-success fit-content-btn" style="margin: 0;" type="submit">Masuk</button>
                    <span class="text-white">Belum memiliki akun ?
                        <a href="/register" class="text-success">Buat Akun</a>
                    </span>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
