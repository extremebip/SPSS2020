@extends('layouts.main')

@section('site-content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    {{ Form::open(['route' => 'register']) }}
                        <div class="form-group row">
                            {{ Form::label('NamaLengkap', 'Nama Lengkap', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('NamaLengkap', old('NamaLengkap'), ['class' => 'form-control '.($errors->has('NamaLengkap') ? 'is-invalid' : '')]) }}
                                @error('NamaLengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('AsalUniversitas', 'Asal Universitas', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('AsalUniversitas', old('AsalUniversitas'), ['class' => 'form-control '.($errors->has('AsalUniversitas') ? 'is-invalid' : '')]) }}
                                @error('AsalUniversitas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('NoHP', 'No. HP', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('NoHP', old('NoHP'), ['class' => 'form-control '.($errors->has('NoHP') ? 'is-invalid' : '')]) }}
                                @error('NoHP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('email', 'Email', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['class' => 'form-control '.($errors->has('email') ? 'is-invalid' : '')]) }}
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('password', 'Password', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('password', ['class' => 'form-control '.($errors->has('password') ? 'is-invalid' : '')]) }}
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
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