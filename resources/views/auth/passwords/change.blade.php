@extends('layouts.main')

@section('title','Change Password')

@section('site-content')
<div class="container">
    <div class="fit-banner text-center">
        <img src="{{ asset('storage/assets/images/spss-banner.png') }}">
    </div>

    <div class="form-style" style="margin: 24px auto">
        <div class="form-style-heading">
            <span class="heading text-white" style="font-size: calc(10px + 3vw);">Ubah Kata Sandi</span>
        </div>
        <div class="form-style-content">
            {{ Form::open(['route' => 'change-password']) }}
            <div class="form-group">
                {{ Form::password('old_password', ['class' => 'form-control '.($errors->has('old_password') ? 'is-invalid' : ''), 'placeholder' => 'Masukkan kata sandi lama', 'autofocus' => '']) }}
                @error('old_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::password('password', ['class' => 'form-control '.($errors->has('password') ? 'is-invalid' : ''), 'placeholder' => 'Masukkan kata sandi baru']) }}
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Ulangi kata sandi baru']) }}
            </div>
                <div class="text-right" style="margin-top: 24px;">
                    {{ Form::submit('Ubah', ['class' => 'btn btn-outline-success fit-content-btn', 'style' => 'margin:0;']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection