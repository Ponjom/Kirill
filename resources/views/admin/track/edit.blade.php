@extends('main')

@section('title', 'Редактирование трека')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <p>Посвятите народ в ваше творение</p>
            <h2>Редактирование трека "{{ $track->name }}"</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Продемонстрировать свой искусство людям</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{ route('admin.track.update', $track) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Автор <span style="color: red">*</span></label>
                                    <input type="text" value="{{ old('author') ?? $track->author }}" name="author" class="form-control @if($errors->has('author')) is-invalid @endif" placeholder="Введите наименование">
                                    @error('author')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название <span style="color: red">*</span></label>
                                    <input type="text" value="{{ old('name') ?? $track->name }}" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Введите наименование">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Альбом <span style="color: red">*</span></label>
                                    <select type="text" name="album_id" class="form-control @if($errors->has('album_id')) is-invalid @endif">
                                        <option value="">Выберите альбом</option>
                                        @foreach($albums as $album)
                                            <option value="{{ $album->id }}" @if(old('album_id')) @if(old('album_id') == $album->id) selected @endif @else @if($track->album_id == $album->id) selected @endif @endif>{{ $album->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('album_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Файл трека (mp3) <span style="color: red">*</span></label>
                                    <input type="file" value="{{ old('path') }}" name="path" style="padding-top: 12px" class="form-control @if($errors->has('path')) is-invalid @endif" placeholder="Изображение ивента">
                                    @error('path')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30">Обновить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->
@endsection
