@extends('base.all')

@section('title', $title)

@section('header')
@endsection

@section('style')
    @parent
    <style>
        body {
            background-image: url("{{ asset('img/background.jpg') }}");
            background-color: rgba(255, 255, 255, 0.2);
            background-blend-mode: overlay;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }

        main {
            padding-top: 0;
        }
    </style>
@endsection

@section('main')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-12 w-auto">
                <div class="card bg-white shadow bg-opacity-50" style="max-width: 500px">
                    <div class="card-body d-flex align-items-center flex-column">
                        <img src="{{ asset('/img/logo.png') }}" class="w-50 mb-3" alt="web logo">
                        <h1 class="mb-3"><b>{{config('app.name')}}</b></h1>
                        <form action="{{route('users.login')}}" id="loginForm" method="POST"
                              enctype="multipart/form-data"
                              class="w-100 mb-3">
                            @csrf
                            <div class="input-group mb-3">
                                <label for="account" class="input-group-text fs-5">帳號</label>
                                <input name="account" type="text" id="account"
                                       class="form-control form-control-lg
                                       {{ $errors->first('account') ? 'is-invalid' : '' }}"
                                       placeholder="請輸入帳號" value="{{ old('account') }}" autofocus>
                                <div class="invalid-feedback">
                                    {{ $errors->first('account') }}
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label for="password" class="input-group-text fs-5">密碼</label>
                                <input name="password" type="password" id="password"
                                       class="form-control form-control-lg
                                        {{ $errors->first('password') ? 'is-invalid' : '' }}"
                                       placeholder="請輸入密碼">
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" id="loginSend">
                                <span class="iconify-inline" data-icon="fe:login"></span>
                                <span>登入</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection

@section('script')
    @parent
{{--    <script>--}}
{{--        const url = '{{route('users.login')}}'--}}
{{--    </script>--}}
    {{--  Page Customize Javascript  --}}
    <script src="{{asset('js/pages/root/login.js')}}"></script>
@endsection
