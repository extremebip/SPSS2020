@extends('layouts.main')

@section('title','Seminar')

@section('site-content')
<div class="container">
      <div class="w-100 small-banner text-center">
        <img src="{{ asset('storage/assets/images/spss-banner.PNG') }}">
      </div>

      <div class="penjelasan-header">
        <img src="{{ asset('storage/assets/images/pola3.png') }}" id="left-image">
        <div class="penjelasan-header-content text-white text-center">
          <article class="penjelasan-header-content-title">Mengenai Seminar SPSS</article>
          <article class="penjelasan-header-content-info">
            Seminar SPSS tahun ini akan mempelajari tentang perkembangan ekonomi pasca
            pandemi COVID-19 dan perkiraan perkembangan ekonomi di Indonesia pada era new normal
            2021.
          </article>
          <article class="penjelasan-header-content-info">
            Seminar ini bertujuan untuk meningkatkan pengetahuan para peserta akan perkembangan ekonomi.
            Menarik sekali bukan ? Ayo daftarkan dirimu !
          </article>
          <div style="margin-top: 8px;">
            <a class="btn btn-outline-success fit-content-btn" href="/register">Daftar</a>
          </div>
        </div>
        <img src="{{ asset('storage/assets/images/pola1.png') }}" id="right-image">
      </div>

      <div class="dual-content">
        <div class="row">
          <div class="text-center col-lg-6 col-md-12">
            <article class="penjelasan-text text-white">Pembicara</article>
            <div class="seminar-photo">
            </div>
            <div>
              <article class="penjelasan-text text-white">Nama</article>
              <article class="penjelasan-text text-white">(jabatan di tempat kerja)</article>
            </div>
          </div>
  
          <div class="penjelasan-details text-white col-lg-6 col-md-12">
            <div class="countdown">
              <article class="penjelasan-text">Hitung Mundur</article>
              <div class="countdown-content">
                <span class="countdown-timer" id="time">00:00:00:00</span>
                <article>Sebelum Seminar SPSS dimulai</article>
              </div>
            </div>
  
            <div class="specification">
              <article class="specification-title penjelasan-text">Waktu dan Tempat</article>
              <table class="specification-content">
                <tr>
                  <th style="width: 35%;"></th>
                  <th style="width: 5%;"></th>
                  <th style="width: 50%;"></th>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td>:</td>
                  <td>3 Desember 2020</td>
                </tr>
                <tr>
                  <td>Waktu</td>
                  <td>:</td>
                  <td>13.00 - 15:00 WIB</td>
                </tr>
                <tr>
                  <td>Tempat</td>
                  <td>:</td>
                  <td>Microsoft Teams</td>
                </tr>
                <tr>
                  <td>Pembicara</td>
                  <td>:</td>
                  <td>TBA</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div style="margin-bottom:64px;">
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