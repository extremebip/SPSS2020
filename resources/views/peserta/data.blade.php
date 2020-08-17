@extends('layouts.main')

@section('title','Registrasi Peserta')

@section('style')
<style>
    .form-control[readonly]{
        background-color: #8c949b;
    }
</style>
@endsection

@php
    $peserta = Auth::user();
@endphp

@section('site-content')
<div class="container">
    <div class="fit-banner text-center">
        <img src="{{ asset('storage/assets/images/spss-banner.png') }}">
    </div>

    <div class="form-style"  style="margin: 24px auto">
        <div class="form-style-heading" style="border-bottom: 2px solid #019b4e; text-align: center; padding-bottom: 4px;">
            <span class="heading text-white" style="font-size: calc(8px + 2vw);">Registrasi Peserta</span>
        </div>
        <div class="form-style-content">
            {{ Form::open(['route' => 'data-peserta', 'files' => true]) }}
            <div class="form-group">
                <span class="text-white" style="font-weight: 600;">Peserta 1</span>
            </div>
            <div class="form-group">
                {{ Form::text('Peserta1_Nama', $peserta->name, ['class' => 'form-control '.($errors->has('Peserta1_Nama') ? 'is-invalid' : ''), 'readonly' => '', 'placeholder' => 'Nama']) }}
                @error('Peserta1_Nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::text('Peserta1_Jurusan', old('Peserta1_Jurusan'), ['class' => 'form-control '.($errors->has('Peserta1_Jurusan') ? 'is-invalid' : ''), 'placeholder' => 'Jurusan', 'autofocus' => '']) }}
                @error('Peserta1_Jurusan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::text('Peserta1_NoHP', $peserta->NoHP, ['class' => 'form-control '.($errors->has('Peserta1_NoHP') ? 'is-invalid' : ''), 'readonly' => '', 'placeholder' => 'No. HP']) }}
                @error('Peserta1_NoHP')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::text('Peserta1_IDLine', old('Peserta1_IDLine'), ['class' => 'form-control '.($errors->has('Peserta1_IDLine') ? 'is-invalid' : ''), 'placeholder' => 'ID Line (Opsional)']) }}
                @error('Peserta1_IDLine')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <article class="text-white">Unggah Kartu Tanda Mahasiswa (KTM)</article>
                {{ Form::label('Peserta1_KTM', 'Pilih file', ['class' => 'btn btn-outline-success fit-content-btn', 'style' => 'margin: 4px 0 0;']) }}
                <span id="FilePeserta1" class="text-white"></span>
                {{ Form::file('Peserta1_KTM', ['class' => 'form-control '.($errors->has('Peserta1_KTM') ? 'is-invalid' : ''), 'style' => 'display:none;']) }}
                @error('Peserta1_KTM')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group" style="margin-top: 24px;">
                <span class="text-white" style="font-weight: 600;">Peserta 2</span>
            </div>
            <div class="form-group">
                {{ Form::text('Peserta2_Nama', old('Peserta2_Nama'), ['class' => 'form-control '.($errors->has('Peserta2_Nama') ? 'is-invalid' : ''), 'placeholder' => 'Nama']) }}
                @error('Peserta2_Nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::text('Peserta2_Jurusan', old('Peserta2_Jurusan'), ['class' => 'form-control '.($errors->has('Peserta2_Jurusan') ? 'is-invalid' : ''), 'placeholder' => 'Jurusan']) }}
                @error('Peserta2_Jurusan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::text('Peserta2_NoHP', old('Peserta2_NoHP'), ['class' => 'form-control '.($errors->has('Peserta2_NoHP') ? 'is-invalid' : ''), 'placeholder' => 'No. HP']) }}
                @error('Peserta2_NoHP')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::text('Peserta2_IDLine', old('Peserta2_IDLine'), ['class' => 'form-control '.($errors->has('Peserta2_IDLine') ? 'is-invalid' : ''), 'placeholder' => 'ID Line (Opsional)']) }}
                @error('Peserta2_IDLine')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <article class="text-white">Unggah Kartu Tanda Mahasiswa (KTM)</article>
                {{ Form::label('Peserta2_KTM', 'Pilih file', ['class' => 'btn btn-outline-success fit-content-btn', 'style' => 'margin: 4px 0 0;']) }}
                <span id="FilePeserta2" class="text-white"></span>
                {{ Form::file('Peserta2_KTM', ['class' => 'form-control '.($errors->has('Peserta2_KTM') ? 'is-invalid' : ''), 'style' => 'display:none;']) }}
                @error('Peserta2_KTM')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="text-right" style="margin-top: 24px;">
                {{ Form::submit('Daftar', ['class' => 'btn btn-outline-success fit-content-btn', 'style' => 'margin:0;']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).on('change', '#Peserta1_KTM', function (event) {
        $('#FilePeserta1').html(event.target.files[0].name);
    });

    $(document).on('change', '#Peserta2_KTM', function (event) {
        $('#FilePeserta2').html(event.target.files[0].name);
    });
</script>
@endsection