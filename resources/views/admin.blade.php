@extends('main')

@section('title', 'Админ-панель')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Воссоздайте искусство</p>
            <h2>Админ-панель</h2>
        </div>
    </section>
    <section class="events-area section-padding-100">
        <div class="container">
            <div class="col-12">
                <div class="oneMusic-tabs-content d-flex flex-column">
                    <ul class="nav nav-tabs mx-auto" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Пользователи</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab--2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Ивенты</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab--3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Альбомы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab--4" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">Треки</a>
                        </li>
                    </ul>

                    <div class="tab-content mb-100" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                            <div class="oneMusic-tab-content">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Имя</th>
                                        <th scope="col">Статус администратора</th>
                                        <th scope="col">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>@if($user->isAdmin) <span class="badge badge-light">Да</span> @else <span class="badge badge-dark">Нет</span> @endif</td>
                                            <td>
                                                @if($user->isAdmin)
                                                    <a href="{{ route('admin.status.toggle', $user) }}" class="btn oneMusic-btn m-2">Убрать статус администратора <i class="fa fa-lock"></i></a>
                                                @else
                                                    <a href="{{ route('admin.status.toggle', $user) }}" class="btn oneMusic-btn m-2">Сделать администратором <i class="fa fa-unlock"></i></a>
                                                @endif
                                                    <a href="{{ route('admin.user.destroy', $user) }}" class="btn oneMusic-btn btn-2 m-2">Удалить <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab--2">
                            <div class="oneMusic-tab-content">
                                <!-- Tab Text -->
                                <div class="oneMusic-tab-text">
                                    <a href="{{ route('admin.event.create') }}" class="btn oneMusic-btn m-2">Создать ивент <i class="fa fa-plus"></i></a>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Название</th>
                                            <th scope="col">Дата проведения</th>
                                            <th scope="col">Место проведения</th>
                                            <th scope="col">Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($events as $event)
                                            <tr>
                                                <th scope="row">{{ $event->id }}</th>
                                                <td>{{ $event->name }}</td>
                                                <td>{{ $event->date }}</td>
                                                <td>{{ $event->place }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('event.show', $event) }}" class="btn oneMusic-btn btn-2 m-2">Просмотр <i class="fa fa-search"></i></a>
                                                    <a href="{{ route('admin.event.edit', $event) }}" class="btn oneMusic-btn m-2">Редактировать <i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.event.destroy', $event) }}" class="btn oneMusic-btn btn-2 m-2">Удалить <i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab--3">
                            <div class="oneMusic-tab-content">
                                <!-- Tab Text -->
                                <div class="oneMusic-tab-text">
                                    <a href="{{ route('admin.album.create') }}" class="btn oneMusic-btn m-2">Создать альбом <i class="fa fa-plus"></i></a>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Название</th>
                                            <th scope="col">Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($albums as $album)
                                            <tr>
                                                <th scope="row">{{ $album->id }}</th>
                                                <td>{{ $album->name }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('album.show', $album) }}" class="btn oneMusic-btn btn-2 m-2">Просмотр <i class="fa fa-search"></i></a>
                                                    <a href="{{ route('admin.album.edit', $album) }}" class="btn oneMusic-btn m-2">Редактировать <i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.album.destroy', $album) }}" class="btn oneMusic-btn btn-2 m-2">Удалить <i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab--4">
                            <div class="oneMusic-tab-content">
                                <!-- Tab Text -->
                                <div class="oneMusic-tab-text">
                                    <a href="{{ route('admin.track.create') }}" class="btn oneMusic-btn m-2">Добавить трек <i class="fa fa-plus"></i></a>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Автор</th>
                                            <th scope="col">Название</th>
                                            <th scope="col">Альбом</th>
                                            <th scope="col">Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tracks as $track)
                                            <tr>
                                                <th scope="row">{{ $track->id }}</th>
                                                <td>{{ $track->author }}</td>
                                                <td>{{ $track->name }}</td>
                                                <td>{{ $track->album->name }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.track.edit', $track) }}" class="btn oneMusic-btn m-2">Редактировать <i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.track.destroy', $track) }}" class="btn oneMusic-btn btn-2 m-2">Удалить <i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
