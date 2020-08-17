@extends('peserta.dashboard')

@php
    $panduanDownloadURL = route('dashboard-download', ['file' => Crypt::encrypt('PT1')]);
@endphp

@section('dashboard-content')
<article class="heading text-white" style="font-size: calc(10px + 1.5em);">
    Pembayaran anda berhasil diverifikasi
</article>
    
<article class="sub-heading text-white" style="font-size: calc(8px + 1em);">
    Tahap 1 akan dimulai <span id="time">00 hari 00 jam 00 menit 00 detik</span> lagi.
</article>
    
<article class="sub-heading text-white" style="font-size: calc(8px + 1em);">
    Silahkan unduh panduan tahap 1 <a href="{{ $panduanDownloadURL }}" class="link">di sini</a>.
</article>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        var date = new Date({{ $countdown }});
        Countdown.doCountdown(Countdown.format.dashboard, 'time', date);
    });
</script>
@endsection