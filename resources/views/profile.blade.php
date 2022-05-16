@extends('main')

@section('title', 'Личный кабинет')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url('/img/bg-img/breadcumb3.jpg');">
        <div class="bradcumbContent">
            <p>Ваши данные</p>
            <h2>Личный кабинет</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Events Area Start ##### -->
    <section class="events-area section-padding-100">
        <div class="container d-flex flex-column">
            <h2 class="text-center">Привет, {{ auth()->user()->name }}, надеемся вам очень нравится у нас</h2>
            <h4 class="text-center mb-4">Ваши избранные треки</h4>
            @foreach($tracks as $track)
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
