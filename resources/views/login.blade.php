@extends('main')

@section('title', 'Логин')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <p>Рады вас видеть вновь</p>
            <h2>Авторизация</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>С возвращением</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Почта</label>
                                    <input type="email" value="{{ old('email') }}" name="email" class="form-control @if($errors->has('email') || session()->has('email')) is-invalid @endif" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите почтовый адрес">
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>Мы не распространяем ваши данные третьим лицам</small>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @if (session()->has('email'))
                                        <div class="invalid-feedback">
                                            {{ session()->get('email') }}
                                        </div>
                                    @endif
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
                                <button type="submit" class="btn oneMusic-btn mt-30">Войти</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->
@endsection
