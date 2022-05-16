@extends('main')

@section('title', 'Список альбомов')

@section('content')
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Список творений</p>
            <h2>Наши альбомы</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-catagory section-padding-100-0">
        <div class="container">
            <div class="row oneMusic-albums">
                @foreach($albums as $album)
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                        <div class="single-album">
                            <img src="{{ asset($album->image_url) }}" alt="">
                            <div class="album-info">
                                <a href="{{ route('album.show', $album) }}">
                                    <h5>{{ $album->name }}</h5>
                                </a>
                                <p>Second Song</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
