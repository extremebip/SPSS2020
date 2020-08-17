@extends('layouts.main')

@section('title', 'Confirm Payment')

@section('site-content')
<div class="container">
    <div class="fit-banner text-center">
        <img src="{{ asset('storage/assets/images/spss-banner.png') }}">
    </div>
    <div class="form-style" style="margin: 24px auto">
        <div class="form-style-heading" style="text-align: left;">
            <article class="text-white">Bank Central Asia (BCA)</article>
            <article class="text-white">an. Elbert Adiwijanto</article>
            <article class="text-white">No Rek. 8870550678</article>
            <article class="text-white">Total pembayaran : Rp xxxxxx</article>
        </div>
        <div class="form-style-content">
            {{ Form::open(['route' => 'pembayaran', 'files' => true]) }}
                <div class="form-group">
                    <span class="text-white" style="font-weight: 700;">Konfirmasi Pembayaran</span>
                </div>
                <div class="form-group">
                    {{ Form::text('NamaPengirim', old('NamaPengirim'), ['class' => 'form-control '.($errors->has('NamaPengirim') ? 'is-invalid' : ''), 'placeholder' => 'Nama Pengirim', 'autofocus' => '']) }}
                    @error('NamaPengirim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::text('NamaBank', old('NamaBank'), ['class' => 'form-control '.($errors->has('NamaBank') ? 'is-invalid' : ''), 'placeholder' => 'Nama Bank']) }}
                    @error('NamaBank')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <article class="text-white">Unggah Bukti Transfer</article>
                    {{ Form::label('BuktiTransfer', 'Pilih file', ['class' => 'btn btn-outline-success fit-content-btn', 'style' => 'margin: 4px 0 0;']) }}
                    <span id="FileBuktiTransfer" class="text-white"></span>
                    {{ Form::file('BuktiTransfer', ['class' => 'form-control '.($errors->has('BuktiTransfer') ? 'is-invalid' : ''), 'style' => 'display:none;']) }}
                    @error('BuktiTransfer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-right" style="margin-top: 24px;">
                    {{ Form::submit('Kirim', ['class' => 'btn btn-outline-success fit-content-btn', 'style' => 'margin:0;']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).on('change', '#BuktiTransfer', function (event) {
        $('#FileBuktiTransfer').html(event.target.files[0].name);
    });
</script>
@endsection