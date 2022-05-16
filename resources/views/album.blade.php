@extends('main')

@section('title', 'Альбом ' . $album->name)

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url('/img/bg-img/breadcumb3.jpg');">
        <div class="bradcumbContent">
            <p>Альбом</p>
            <h2>{{ $album->name }}</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Events Area Start ##### -->
    <section class="events-area section-padding-100">
        <div class="container d-flex flex-column">
            <h3 class="text-center mb-5">Список треков</h3>
            @foreach($album->tracks as $track)
                <div class="song-play-area mb-4">
                    <div class="song-name d-flex">
                        <p @auth style="height: fit-content;margin-top: 15px;" @endauth>{{ $loop->iteration }}. {{ $track->author }} - {{ $track->name }}</p>
                        @auth
                            @if ($track->isLiked())
                                <a href="{{ route('track.like', $track) }}" class="btn oneMusic-btn m-2" style="min-width: 0px; padding: 0 16px;border-radius: 100px"><i class="fa fa-heart-o m-0"></i></a>
                            @else
                                <a href="{{ route('track.like', $track) }}" class="btn oneMusic-btn m-2" style="min-width: 0px; padding: 0 16px;border-radius: 100px"><i class="fa fa-heart m-0"></i></a>
                            @endif
                        @endauth
                    </div>
                    <audio preload="auto" controls>
                        <source src="{{ asset('storage/' . $track->path) }}">
                    </audio>
                </div>
            @endforeach
        </div>
    </section>
@endsection
