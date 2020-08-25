@extends('layouts.participant')

@section('title', 'Dashboard')

@php
    $peserta = Auth::user();
@endphp

@section('content')
<div class="container">
    <div style="margin-top: 48px;">
        <article class="heading text-white">{{ $peserta->name }}</article>
        <article class="sub-heading text-white" style="font-weight: 600;">{{ $peserta->KodePeserta }}</article>
    </div>

    <div class="row" style="margin: 36px -6px;">
        <div class="col-3 col-md" style="padding-right: 6px; padding-left: 6px; align-self:end;">
            <img class="w-100" src="{{ asset("storage/assets/state/0-${statusTahap['Registrasi']}.png") }}">
        </div>
        <div class="col-3 col-md" style="padding-right: 6px; padding-left: 6px; align-self:end;">
            <img class="w-100" src="{{ asset("storage/assets/state/1-${statusTahap['Tahap 1']}.png") }}">
        </div>
        <div class="col-3 col-md" style="padding-right: 6px; padding-left: 6px; align-self:end;">
            <img class="w-100" src="{{ asset("storage/assets/state/2-${statusTahap['Tahap 2']}.png") }}">
        </div>
        <div class="col-3 col-md" style="padding-right: 6px; padding-left: 6px; align-self:end;">
            <img class="w-100" src="{{ asset("storage/assets/state/3-${statusTahap['Tahap 3']}.png") }}">
        </div>
        <div class="legends col-md">
            <article class="legends-head text-white">Keterangan : </article>
            <div class="legends-tooltips">
                <div class="legends-tooltips-color bg-secondary"></div>
                <div class="legends-tooltips-meaning text-white">menunggu</div>
            </div>
            <div class="legends-tooltips">
                <div class="legends-tooltips-color bg-success"></div>
                <div class="legends-tooltips-meaning text-white">berhasil</div>
            </div>
            <div class="legends-tooltips">
                <div class="legends-tooltips-color bg-warning"></div>
                <div class="legends-tooltips-meaning text-white">dalam proses</div>
            </div>
            <div class="legends-tooltips">
                <div class="legends-tooltips-color bg-danger"></div>
                <div class="legends-tooltips-meaning text-white">gagal</div>
            </div>
        </div>
    </div>

    <div class="text-box w-100">
        @yield('dashboard-content')
    </div>
</div>
@endsection