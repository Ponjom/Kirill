@extends('main')

@section('title', 'Создание ивента')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <p>Поделиться с миром своим альбомом</p>
            <h2>Создание альбома</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Вдохновите людей</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{ route('admin.album.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название <span style="color: red">*</span></label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Введите наименование">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Изображение <span style="color: red">*</span></label>
                                    <input type="file" value="{{ old('image') }}" name="image" style="padding-top: 12px" class="form-control @if($errors->has('image')) is-invalid @endif" placeholder="Изображение ивента">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30">Создать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->
@endsection
