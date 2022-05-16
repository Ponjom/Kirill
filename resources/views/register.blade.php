@extends('main')

@section('title', 'Регистрация')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Присоединяйся в общество ценителей</p>
            <h2>Регистрация</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Почувствуйте вдохновение</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Имя</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваше имя">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Почта</label>
                                    <input type="email" value="{{ old('email') }}" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите почтовый адрес">
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>Мы не распространяем ваши данные третьим лицам</small>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Пароль</label>
                                    <input type="password" value="{{ old('password') }}" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" id="exampleInputPassword1" placeholder="Пароль">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Повторный пароль</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Повторный пароль">
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30">Присоединиться</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->
@endsection
