@extends('main')

@section('title', 'Редактирование ивента')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <p>Посвятите народ в ваше творение</p>
            <h2>Редактирование ивента "{{ $event->name }}"</h2>
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
                            <form action="{{ route('admin.event.update', $event) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название <span style="color: red">*</span></label>
                                    <input type="text" value="{{ old('name') ?? $event->name  }}" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Введите наименование">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Дата <span style="color: red">*</span></label>
                                    <input type="date" value="{{ old('date')  ?? $event->date }}" name="date" class="form-control @if($errors->has('date')) is-invalid @endif" placeholder="Укажите дату">
                                    @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Место проведения <span style="color: red">*</span></label>
                                    <input type="text" value="{{ old('place') ?? $event->place }}" name="place" class="form-control @if($errors->has('place')) is-invalid @endif" placeholder="Введите место проведения">
                                    @error('place')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ссылка на покупку билетов <span style="color: red">*</span></label>
                                    <input type="text" value="{{ old('url') ?? $event->url }}" name="url" class="form-control @if($errors->has('url')) is-invalid @endif" placeholder="Введите ссылку на покупку билетов">
                                    @error('url')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Изображение <span style="color: red">*</span></label>
                                    <input type="file" value="{{ old('image') ?? $event->url }}" name="image" style="padding-top: 12px" class="form-control @if($errors->has('image')) is-invalid @endif" placeholder="Изображение ивента">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Описание</label>
                                    <textarea name="description" style="min-height: 100px; padding-top: 10px" class="form-control @if($errors->has('description')) is-invalid @endif" rows="3" placeholder="Введите описание мероприятия">{{ old('description') ?? $event->description }}</textarea>
                                    @error('description')
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
