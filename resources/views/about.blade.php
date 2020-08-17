@extends('layouts.main')

@section('title','About')

@section('site-content')
<div class="container">
    <div class="fit-banner text-center">
    <img src="{{ asset('storage/assets/images/spss-banner.PNG') }}">
    </div>

    <div class="row">
    <div class="col-lg-6 col-md-12 text-center">
        <video src="{{ asset('storage/assets/video/video-test.mp4') }}" controls class="w-100 video" style="display: none;"></video>
        <img src="{{ asset('storage/assets/images/play-button.png') }}" class="play-btn">
    </div>

    <div class="description col-lg-6 col-md-12 text-white text-justify">
        <p>
        Statistical Project for Smart Student (SPSS) adalah acara skala nasional yang
        diadakan oleh HIMSTAT. Tema yang diusung pada SPSS 2020 adalah 'Save The World with Outstanding Data'
        (SWORD). Tema tersebut berkaitan dengan situasi ekonomi saat ini pasca pandemi COVID-19.
        </p>
        <p>
        Serangkaian kegiatan pada SPSS 2020 yaitu seminar dan lomba statistika. Seminar pada SPSS 2020
        akan membahas mengenai perkembangan data statistik pertumbuhan ekonomi pasca pandemi COVID-19
        dan perkiraan perkembangan ekonomi Indonesia pada era new normal 2021. Lomba statistika akan 
        dilakukan melalui tiga tahap dimana ketiga tahap tersebut merupakan babak penyisihan dan setiap 
        tahapnya dapat melatih peserta untuk berpikir kritis dalam mengolah data untuk mencapai hasil yang maksimal.
        </p>
    </div>
    </div>

    <div class="tujuan text-white">
    <article class="tujuan-title">Tujuan</article>
    <ol>
        <li>Melatih kreativitas peserta dalam mengolah sebuah data untuk mencapai hasil yang maksimal.</li>
        <li>Menyebarkan wawasan mengenai data statistik pertumbuhan ekonomi pada era pandemi COVID-19 dan perkiraan perkembangan ekonomi Indonesia pada era new normal 2021.</li>
        <li>Mengembangkan potensi akademik dan kreativitas mahasiswa Indonesia di bidang statistika dan ekonomi.</li>
        <li>Memperkenalkan HIMSTAT ke banyak orang, baik dalam skala Binus University maupun skala nasional.</li>
    </ol>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('.play-btn').click(function(){
            $('.play-btn').hide();
            $('.video').show();
            $('.video').get(0).play();
        });
    });
</script>
@endsection