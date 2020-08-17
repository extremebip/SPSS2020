@extends('layouts.main')

@section('title','Verify Email')

@section('site-content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="fit-banner text-center" style="width: 60%;">
        <img src="{{ asset('storage/assets/images/spss-banner.PNG') }}">
    </div>

    <div class="outer-border">
        <div class="inner-border text-center">
            <article class="text-white font-weight-bold">Halo !</article>
            <p class="notify text-white">Untuk mendaftarkan diri pada lomba SPSS 2020, harap melakukan verifikasi e-mail terlebih dahulu dengan cara mengecek e-mail anda. Apabila anda </p>
            <br/><br/>
            <article class="text-white">Jika ada pertanyaan, dapat menghubungi narahubung : 08xxxxxx (nama)</article>
        </div>
    </div>
</div>
@endsection