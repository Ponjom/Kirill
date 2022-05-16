@extends('main')

@section('title', 'Ивент ' . $event->name)

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url('/img/bg-img/breadcumb3.jpg');">
        <div class="bradcumbContent">
            <p>Ивент в вашем городе</p>
            <h2>{{ $event->name }}</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Events Area Start ##### -->
    <section class="events-area section-padding-100">
        <div class="container d-flex flex-column">
            <span class="mx-auto col-6 text-center">{{ $event->place }} | {{ $event->date }}</span><br>
            <span class="mx-auto col-6 text-center">{{ $event->description}}</span><br>
            <img src="{{ asset($event->image_url) }}" alt="Фото ивента" class="p-0 col-6 mx-auto" style="width: 100%">
            <a href="{{ $event->url }}" target="_blank" class="btn oneMusic-btn m-2 col-6 mx-auto">Купить билет <i class="fa fa-angle-double-right"></i></a>
        </div>
    </section>
@endsection
