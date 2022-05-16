@extends('main')

@section('title', 'Ивенты')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Актуальная информация по городам</p>
            <h2>Ивенты</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Events Area Start ##### -->
    <section class="events-area section-padding-100">
        <div class="container">
            <div class="row">
                @foreach($events as $event)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-event-area mb-30">
                            <div class="event-thumbnail">
                                <img src="{{ $event->image }}" alt="">
                            </div>
                            <div class="event-text">
                                <h4>{{ $event->name }}</h4>
                                <div class="event-meta-data">
                                    <a href="{{ route('event.show', $event) }}" class="event-place">{{ $event->place }}</a>
                                    <a href="{{ route('event.show', $event) }}" class="event-date">{{ $event->date }}</a>
                                </div>
                                <a href="{{ route('event.show', $event) }}" class="btn see-more-btn">Просмотр</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
