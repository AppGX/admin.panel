<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-image: url("{{asset('images/main.png') }}");
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .aMenu {
            color: #0b3e6f;
            text-decoration: none;
        }
        a {
            padding: 5px;
            margin-right: 40px;
            border: 1px solid darkblue;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if(Route::has('login'))
        <div class="top-right links">
            @auth
                @if(Auth::user()->isDisabled())
                    <strong><a class="aMenu" href="{{url('/')}}">Главная</a></strong>
                @elseif(Auth::user()->isUser())
                    <strong><a class="aMenu" href="{{url('/user/index')}}">Кабинет</a></strong>
                    <strong><a class="aMenu" href="{{url('/')}}">Главная</a></strong>
                @elseif(Auth::user()->isVisitor())
                    <strong><a class="aMenu" href="{{url('/')}}">Главная</a></strong>
                @elseif(Auth::user()->isAdmin())
                    <strong><a class="aMenu" href="{{url('/admin/index')}}">Панель Администратора</a></strong>
                    <strong><a class="aMenu" href="{{url('/')}}">Главная</a></strong>
                @endif
            {{dd(Auth::user()->isAdmin())}}
                <strong>
                    <a class="aMenu dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                        Выйти
                    </a>
                </strong>
                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                    @csrf
                </form>
            @else
                <strong>
                    <a class="aMenu" href="{{route('login')}}">Войти</a>
                </strong>
                @if(Route::has('register'))
                    <strong>
                        <a class="aMenu" href="{{route('register')}}">Регистрация</a>
                    </strong>
                    @endif
            @endauth
        </div>
    @endif
</div>
{{--        <div class="flex-center position-ref full-height">--}}
{{--            @if (Route::has('login'))--}}
{{--                <div class="top-right links">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}">Home</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}">Login</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            --}}
{{--        </div>--}}
</body>
</html>
