<!doctype html>
<html lang="en">
<head>
    @section('head')
        {{--  encoding  --}}
        <meta charset="UTF-8">
        {{--  RWD  --}}
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        {{--  Favicon  --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicon/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('img/favicon/site.webmanifest')}}">
        <link rel="mask-icon" href="{{asset('img/favicon/safari-pinned-tab.svg')}}" color="#425d8a">
        <meta name="msapplication-TileColor" content="#425d8a">
        <meta name="theme-color" content="#425d8a">
        {{--  Title  --}}
        <title>@yield('title', 'Page') | {{config('app.name')}}</title>
        {{--  iconify  --}}
        <script src="{{asset('https://code.iconify.design/2/2.0.4/iconify.min.js')}}"></script>
        {{--  Javascript Modules  --}}
        <script src="{{asset('js/app.js')}}"></script>
        {{--  Customize CSS  --}}
        <link rel="stylesheet" href="{{asset('css/all.css')}}">
    @show

    @section('style')
    @show

</head>
<body class="d-flex flex-column min-vh-100">
<header>
    @section('header')
        <nav class="navbar navbar-dark navbar-expand-xl bg-primary px-3 fixed-top shadow">
            <div class="container-fluid">
                <a href="{{route('cases.index')}}"
                   class="navbar-brand fs-1 fw-bold py-0 ds-100 hv-scale hv-color-text">
{{--                    <span class="iconify-inline" data-icon="mdi:virus-outline"></span>--}}
{{--                    <span class="iconify-inline" data-icon="ph:syringe-duotone" data-rotate="270deg"></span>--}}
                    <span>{{config('app.name')}}</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarToggler">
                    @section('navbar_item')
                        <ul class="navbar-nav fs-4 fw-bold ds-100">
                            <li class="nav-item hv-scale">
                                <a href="{{route('cases.index')}}" class="nav-link text-white hv-color-text">
                                    <span>個案管理</span>
                                </a>
                            </li>
                            <li class="nav-item hv-scale">
                                <a href="{{route('tasks.index')}}" class="nav-link text-white hv-color-text">
                                    <span>任務管理</span>
                                </a>
                            </li>
                            <li class="nav-item hv-scale">
                                <a href="{{route('topics.index')}}" class="nav-link text-white hv-color-text">
                                    <span>題庫管理</span>
                                </a>
                            </li>
                            <li class="nav-item hv-scale">
                                <a href="{{route('faqs.index')}}" class="nav-link text-white hv-color-text">
                                    <span>QA 管理</span>
                                </a>
                            </li>
                            <li class="nav-item hv-scale">
                                <a href="{{route('messages.index')}}" class="nav-link text-white hv-color-text">
                                    <span>消息管理</span>
                                </a>
                            </li>
                            <li class="nav-item hv-scale">
                                <a href="{{route('exports.index')}}" class="nav-link text-white hv-color-text">
                                    <span>匯出</span>
                                </a>
                            </li>
                            <li class="nav-item hv-scale dropdown">
                                <button type="button" class="bg-transparent border-0 fw-bold nav-link text-white hv-color-text dropdown-toggle"
                                   data-bs-toggle="dropdown">
                                    <span class="iconify-inline" data-icon="healthicons:ui-user-profile"></span>
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                        <span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                                    @endif
                                </button>
                                <ul class="dropdown-menu fade">
                                    <li>
                                        <button type="button" class="dropdown-item hv-color-bg" data-bs-toggle="modal"
                                           data-bs-target="#updatePasswordModal">
                                            <span class="iconify-inline" data-icon="fa-solid:tools"></span>
                                            <span>修改密碼</span>
                                        </button>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('users.logout') }}">
                                            @csrf
                                            <a href="{{ route('users.logout') }}" class="dropdown-item hv-color-bg"
                                               onclick="event.preventDefault();this.closest('form').submit();">
                                                <span class="iconify-inline" data-icon="ls:login"></span>
                                                <span>登出</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @show
                </div>
            </div>
        </nav>
    @show
</header>
<main>
    @section('main')
    @show
</main>
<footer class="mt-auto">
    @section('footer')
        <div class="bg-primary d-flex justify-content-center align-items-center p-2">
            <span class="text-white">
                <span>Copyright © 2022, HPDS-Lab. All Rights Reserved.</span>
            </span>
        </div>
        @include('includes.modal.update.password')
    @show
</footer>
@section('script')
    {{--  Active Current Page  --}}
    <script>const pageTitle = '{{$title}}';</script>
    {{--  Customize Javascript  --}}
    <script src="{{asset('js/pages/base.js')}}"></script>
    {{--  Alert  --}}
    @if (session('type') && session('msg'))
        <script>
            dialog('{{session('type')}}', '{{session('msg')}}')
        </script>
    @endif
@show

</body>
</html>
