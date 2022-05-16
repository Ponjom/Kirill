@extends('main')

@section('title', 'Главная')

@section('content')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/bg-2.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Муза всегда рядом</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Послушайте наши треки <span>Послушайте наши треки</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="{{ route('album.index') }}" class="btn oneMusic-btn mt-50">Альбомы <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>Почувствуйте с нами</p>
                        <h2>Последние альбомы</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @foreach($albums as $album)
                            <div class="single-album">
                                <img src="{{ $album->image_url }}" alt="">
                                <div class="album-info">
                                    <a href="{{ route('album.show', $album) }}">
                                        <h5>{{ $album->name }}</h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @isset($randomTrack)
        <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/bg-4.jpg);">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-12 col-md-5 col-lg-4">
                        <div class="featured-artist-thumb">
                            <img src="{{ asset('img/bg-img/fa.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-8">
                        <div class="featured-artist-content">
                            <!-- Section Heading -->
                            <div class="section-heading white text-left mb-30">
                                <p>С любовью по миру</p>
                                <h2>Cлучайный трек</h2>
                            </div>
                            <div class="song-play-area">
                                <div class="song-name d-flex">
                                    <p @auth style="height: fit-content;margin-top: 15px;" @endauth>{{ $randomTrack->author }} - {{ $randomTrack->name }}</p>
                                    @auth
                                        @if ($randomTrack->isLiked())
                                            <a href="{{ route('track.like', $randomTrack) }}" class="btn oneMusic-btn m-2" style="min-width: 0px; padding: 0 16px;border-radius: 100px"><i class="fa fa-heart-o m-0"></i></a>
                                        @else
                                            <a href="{{ route('track.like', $randomTrack) }}" class="btn oneMusic-btn m-2" style="min-width: 0px; padding: 0 16px;border-radius: 100px"><i class="fa fa-heart m-0"></i></a>
                                        @endif
                                    @endauth
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('storage/' . $randomTrack->path) }}   ">
                                </audio>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset
@endsection
