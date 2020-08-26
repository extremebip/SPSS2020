@extends('layouts.main')

@section('title','Lomba')

@section('site-content')
<img src="{{ asset('storage/assets/images/pola2.png') }}" alt="" id="back-image-top">
    
<div class="container">
<div class="w-100 small-banner text-center">
<img src="{{ asset('storage/assets/images/spss-banner.png') }}">
</div>

<div class="dual-content">
<div class="row">
    <div class="penjelasan-details text-white col-lg-6 col-md-12">
    <div class="penjelasan-header">
        <div class="penjelasan-header-content w-100 lomba-header text-white text-center">
        <article class="penjelasan-header-content-title">Mengenai Lomba SPSS</article>
        <article class="penjelasan-header-content-info">
            Sebuah lomba yang menantang para peserta untuk memecahkan suatu permasalahan yang terbagi menjadi tiga 
            yaitu teori, coding, dan presentasi. Ingin mengasah kemampuan diatas ? Ayo daftarkan dirimu !
        </article>
        <div style="margin-top: 8px;">
            <a class="btn btn-outline-success fit-content-btn" href="{{ route('general-download', ['file' => Crypt::encrypt('SKL')]) }}">Unduh syarat dan ketentuan</a>
            <a class="btn btn-outline-success fit-content-btn" href="/register">Daftar</a>
        </div>
        </div>
    </div>

    <div class="gallery-bg text-center w-100">
        <article class="penjelasan-text text-white">Galeri</article>
        <div class="gallery w-100">
        <div class="gallery-photo">
            <img src="{{ asset('storage/assets/images/FotoLomba.png') }}" class="w-100">
        </div>
        <div class="gallery-photo">
            <img src="{{ asset('storage/assets/images/FotoLomba.png') }}" class="w-100">
        </div>
        <div class="gallery-photo">
            <img src="{{ asset('storage/assets/images/FotoLomba.png') }}" class="w-100">
        </div>
        <div class="gallery-photo">
            <img src="{{ asset('storage/assets/images/FotoLomba.png') }}" class="w-100">
        </div>
        </div>
        <div style="margin-top: -29%;">
        <img src="{{ asset('storage/assets/images/pola1.png') }}" style="width: 70%;">
        </div>
    </div>
    </div>

    <div class="penjelasan-details text-white col-lg-6 col-md-12">
    <div class="countdown-lomba">
        <div>
        <article class="penjelasan-text-lomba">Waktu</article>
        <div class="countdown-content">
            <span class="countdown-timer" id="time">00:00:00:00</span>
            <article>Sebelum penutupan pendaftaran</article>
        </div>
        </div>
        <div>
        <img src="{{ asset('storage/assets/images/total-hadiah.png') }}" class="total-hadiah">
        </div>
    </div>

    <div class="text-center col-lg-12 col-md-12">
        <article class="penjelasan-text text-white">Linimasa</article>
        <img src="{{ asset('storage/assets/images/spss-timeline.png') }}" class="w-100" style="margin-top: 20px;">
    </div>
    </div>
</div>
</div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        var date = new Date({{ $countdown }});
        Countdown.doCountdown(Countdown.format.home, 'time', date, false);
    });
</script>
@endsection