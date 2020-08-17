@extends('peserta.dashboard')

@section('dashboard-content')
    @if (isset($statusPembayaran) && $statusPembayaran == 'late')
        <article class="heading text-white" style="font-size: calc(10px + 1.5em);">
            Mohon Maaf, anda tidak dapat lanjut ke tahap 1
        </article>
        <article class="sub-heading text-white" style="font-size: calc(8px + 1em);">
            Anda tidak menyelesaikan proses registrasi sebelum waktu registrasi berakhir.
        </article>
        <article class="sub-heading text-white" style="font-size: calc(8px + 1em);">
            Anda dapat mengikuti SPSS pada tahun berikutnya.
        </article>
    @else
        <article class="heading text-white" style="font-size: calc(10px + 1.5em);">
            Pembayaran anda tidak dapat diverifikasi
        </article>
        
        <article class="sub-heading text-white" style="font-size: calc(8px + 1em);">
            Silahkan <a href="{{ route('resubmit-pembayaran') }}" class="link">unggah</a> kembali bukti pembayaran anda.
        </article>
    @endif
@endsection