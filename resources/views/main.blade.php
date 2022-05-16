<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body>
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a href="{{ route('index') }}" class="nav-brand text-white">Kavel</a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{ route('index') }}">Главная</a></li>
                                <li><a href="{{ route('event.index') }}">Ивенты</a></li>
                                <li><a href="{{ route('album.index') }}">Альбомы</a></li>
                                <li><a href="{{ route('contact') }}">Контакты</a></li>
                                @auth
                                    @if(auth()->user()->isAdmin)
                                        <li><a href="{{ route('admin.index') }}">Админ-панель</a></li>
                                    @endif
                                        <li><a href="blog.html">Выйти</a></li>
                                @endauth
                            </ul>

                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login/Register -->
                                <div class="login-register-btn text-white">
                                    @guest
                                        <a href="{{ route('login.index') }}">Войти </a> /
                                        <a href="{{ route('register.index') }}"> Регистрация</a>
                                    @endguest
                                    @auth
                                            <a href="{{ route('profile') }}">Личный кабинет</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->
@yield('content')
<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center">
            <div class="col-12 col-md-6">
                <a href="{{ route('index') }}" class="nav-brand text-white">Kavel</a>
                <p class="copywrite-text"><a href="#">
                        Выполнено для исключительно в учебных целях</a>
                    </a>
                </p>
            </div>

            <div class="col-12 col-md-6">
                <div class="footer-nav">
                    <ul>
                        <li><a href="{{ route('index') }}">Главная</a></li>
                        <li><a href="{{ route('event.index') }}">Ивенты</a></li>
                        <li><a href="{{ route('album.index') }}">Альбомы</a></li>
                        <li><a href="{{ route('contact') }}">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
<!-- All Plugins js -->
<script src="{{ asset('js/plugins/plugins.js') }}"></script>
<!-- Active js -->
<script src="{{ asset('js/active.js') }}"></script>
</body>

</html>
