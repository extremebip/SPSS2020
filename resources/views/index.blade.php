@extends('layouts.main')

@section('title','Home')

@section('site-content')
<div class="container">
    <div class="banner text-center">
    <img src="{{ asset('storage/assets/images/spss-banner.PNG') }}">
    <div>
        <a class="btn btn-outline-success fit-content-btn" href="/register">Daftar</a>
        <a class="btn btn-outline-success fit-content-btn" href="/login">Masuk</a>
    </div>
    </div>

    <div class="summary flex">
    <div class="summary-logo">
        <img src="{{ asset('storage/assets/logos/spss-logo.PNG') }}">
    </div>
    <div class="summary-text">
        <span class="heading text-white">Statistical Project for Smart Student 2020</span>
        <p class="spss-info text-white">
        Statistical Project for Smart Student 2020 atau SPSS 2020 adalah
        acara terbesar dan diselenggarakan kedua kalinya oleh HIMSTAT dengan 
        mengusung tema 'Save the World with Outstanding Data'. Adapun kegiatan 
        daring yang diselenggarakan yaitu lomba statistika dan seminar.
        </p>
    </div>
    </div>

    <div class="dual-content" style="margin-bottom: 36px;">
    <div class="row">
        <div class="timeline text-center col-lg-6 col-md-12">
        <article class="heading text-white">Lomba Statistika</article>
        <article class="sub-heading text-white">Total Hadiah : Rp7.000.000,00</article>
        <img src="{{ asset('storage/assets/images/spss-timeline.PNG') }}">
        <div class="buttons">
            <a class="btn btn-outline-success fit-content-btn" href="/lomba">Lebih lanjut</a>
            <a class="btn btn-outline-success fit-content-btn" href="/register">Daftar</a>
        </div>
        </div>

        <div class="seminar text-center col-lg-6 col-md-12">
        <article class="heading text-white">Seminar Daring</article>
        <div class="seminar-photo">
        </div>
        <div class="seminar-info text-white text-left">
            <table>
            <tr>
                <th style="width: 32%;"></th>
                <th style="width: 3%;"></th>
                <th style="width: 65%;"></th>
            </tr>
            <tr>
                <td>Hari, tanggal</td>
                <td>:</td>
                <td>Senin, 31 Desember 2020</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>00.00 - 23.59 WIB</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>Microsoft Teams</td>
            </tr>
            <tr>
                <td>Pembicara</td>
                <td>:</td>
                <td>Lorem Ipsum</td>
            </tr>
            </table>
        </div>
        <div class="buttons">
            <a class="btn btn-outline-success fit-content-btn" href="/seminar">Lebih lanjut</a>
            <a class="btn btn-outline-success fit-content-btn" href="/register">Daftar</a>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection