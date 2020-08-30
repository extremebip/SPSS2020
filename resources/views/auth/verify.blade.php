@extends('layouts.main')

@section('title','Verify Email')

@section('site-content')
<div class="container">
    <div class="fit-banner text-center" style="width: 60%;">
        <img src="{{ asset('storage/assets/images/spss-banner.png') }}">
    </div>

    <div class="outer-border">
        <div class="inner-border text-center">
            <article class="text-white font-weight-bold">Halo !</article>
            <p class="notify text-white">Untuk mendaftarkan diri pada lomba SPSS 2020, harap melakukan verifikasi e-mail terlebih dahulu dengan cara mengecek e-mail anda.</p>
            <a href="{{ route('verification.resend') }}" class="text-success"
                onclick="event.preventDefault(); document.getElementById('email-resend-form').submit();">
                Klik ini untuk mengirim e-mail verifikasi kembali
            </a>
            {{ Form::open(['route' => 'verification.resend', 'id' => 'email-resend-form', 'style' => 'display:none;']) }}
            {{ Form::close() }}
            <br/><br/>
            <article class="text-white">Jika ada pertanyaan, dapat menghubungi narahubung : 08xxxxxx (nama)</article>
        </div>
    </div>
</div>
@endsection