@extends('base.all')

@php
$title = '訪問頁面失敗'
@endphp

@section('title', $title)

@section('main')
    <main class="container py-3 d-flex flex-column justify-content-center">
        <div class="card shadow hv-scale">
            <div class="card-body text-center p-5">
                <h1 class="display-1">404</h1>
                <h2 class="fs-1">很抱歉，訪問頁面失敗</h2>
                <p class="fs-5">可能是地址有誤或某個地方出錯了...</p>
                <a href="{{route('cases.index')}}" class="btn btn-primary rounded-0 px-5">
                    <span class="iconify-inline" data-icon="fa-solid:home"></span>
                    <span>回首頁</span>
                </a>
            </div>
        </div>
    </main>
@endsection

@section('footer')
    @parent
    <script>
        $('header').addClass('mb-auto')
    </script>
@endsection
