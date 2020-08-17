@extends('layouts.main')

@section('title', 'Forgot Password')

@section('site-content')
<div class="container">
    <div class="fit-banner text-center">
        <img src="{{ asset('storage/assets/images/spss-banner.png') }}">
    </div>

    <div class="form-style" style="margin: 24px auto">
        <div class="form-style-heading">
            <span class="heading text-white" style="font-size: calc(10px + 3vw);">Lupa Kata Sandi</span>
        </div>
        <div class="form-style-content">
            {{ Form::open(['route' => 'password.email']) }}
                <div class="form-group">
                    <span class="text-white" style="font-weight: 500;">Masukkan alamat surel anda supaya kami dapat mengirimkan surel untuk menyetel ulang kata sandi anda.</span>
                </div>
                <div class="form-group">
                    {{ Form::email('email', old('email'), ['class' => 'form-control '.($errors->has('email') ? 'is-invalid' : ''), 'placeholder' => 'Masukkan alamat surel', 'autofocus' => '']) }}
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-white">
                    Ingat kata sandi ? <a href="{{ route('login') }}" class="text-success">Masuk</a>
                </div>
                <div class="text-right">
                    {{ Form::submit('Kirim', ['class' => 'btn btn-outline-success fit-content-btn', 'style' => 'margin:0;']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
