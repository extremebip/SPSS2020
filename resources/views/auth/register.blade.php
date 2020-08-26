@extends('layouts.main')

@section('site-content')
<div class="container">
    <div class="fit-banner text-center">
        <img src="{{ asset('storage/assets/images/spss-banner.png') }}" alt="">
    </div>
    <div class="form-style" style="margin: 24px auto">
        <div class="form-style-heading">
            <span class="heading text-white">Daftar</span>
        </div>
        <div class="form-style-content">
            {{ Form::open(['route' => 'register']) }}
                <div class="form-group">
                    {{ Form::text('NamaLengkap', old('NamaLengkap'), ['class' => 'form-control '.($errors->has('NamaLengkap') ? 'is-invalid' : ''), 'placeholder' => 'Nama Lengkap', 'autofocus' => '']) }}
                    @error('NamaLengkap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::email('email', old('email'), ['class' => 'form-control '.($errors->has('email') ? 'is-invalid' : ''), 'placeholder' => 'Alamat Surel']) }}
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::text('AsalUniversitas', old('AsalUniversitas'), ['class' => 'form-control '.($errors->has('AsalUniversitas') ? 'is-invalid' : ''), 'placeholder' => 'Asal Universitas']) }}
                    @error('AsalUniversitas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::text('NoHP', old('NoHP'), ['class' => 'form-control '.($errors->has('NoHP') ? 'is-invalid' : ''), 'placeholder' => 'No. HP']) }}
                    @error('NoHP')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::password('password', ['class' => 'form-control '.($errors->has('password') ? 'is-invalid' : ''), 'placeholder' => 'Masukkan kata sandi']) }}
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Ulangi kata sandi']) }}
                </div>
                <div>
                    <span class="text-white">Sudah punya akun ? 
                        <a href="{{ route('login') }}" class="text-success">Masuk</a>
                    </span>
                </div>
                <div class="text-right" style="margin-top: 24px;">
                    {{ Form::submit('Daftar', ['class' => 'btn btn-outline-success fit-content-btn', 'style' => 'margin:0;']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection