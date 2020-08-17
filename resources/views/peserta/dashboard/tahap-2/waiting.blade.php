@extends('peserta.dashboard')

@php
    $panduanDownloadURL = route('dashboard-download', ['file' => Crypt::encrypt('PT2')]);
@endphp

@section('dashboard-content')
    @if (isset($level) && $level == 'Pengumuman')
        <article class="heading text-white" style="font-size: calc(10px + 1.5em);">
            Pengumuman Tahap 2
        </article>
            
        <article class="sub-heading text-white" style="font-size: calc(8px + 1em);">
            Pengumuman tahap 2 <span id="time">00 hari 00 jam 00 menit 00 detik</span> lagi.
        </article>
    @elseif (isset($level) && $level == 'Menunggu Babak')
        <article class="heading text-white" style="font-size: calc(10px + 1.5em);">
            Selamat ! Anda lolos ke tahap 2
        </article>
        
        <article class="sub-heading text-white" style="font-size: calc(8px + 1em);">
            Tahap 2 akan dimulai <span id="time">00 hari 00 jam 00 menit 00 detik</span> lagi.
        </article>
        
        <article class="sub-heading text-white" style="font-size: calc(8px + 1em);">
            Silahkan unduh panduan tahap 2 <a href="{{ $panduanDownloadURL }}" class="link">disini</a>.
        </article>
    @else
        <article class="heading text-white" style="font-size: calc(10px + 1.5em);">
            Pengumuman Tahap 1
        </article>
            
        <article class="sub-heading text-white" style="font-size: calc(8px + 1em);">
            Pengumuman tahap 1 <span id="time">00 hari 00 jam 00 menit 00 detik</span> lagi.
        </article>
    @endif
@endsection

@section('script')
<script>
    $(document).ready(function () {
        var date = new Date({{ $countdown }});
        Countdown.doCountdown(Countdown.format.dashboard, 'time', date);
    });
</script>
@endsection