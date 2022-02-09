@extends('base.all')

@section('title', $title)

@section('head')
    @parent
    {{--  Chart.js  --}}
    <script src="{{asset('node_modules\chart.js\dist\chart.min.js')}}"></script>
    <script src="{{asset('node_modules\chartjs-adapter-date-fns\dist\chartjs-adapter-date-fns.bundle.min.js')}}"></script>
@endsection

@section('main')
    <div class="container-fluid py-4">
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="clarity:info-standard-solid"></span>
                    <span>個人資料</span>
                </h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
                    <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                    <span>編輯資料</span>
                </button>
            </div>
            <div class="card-body px-5 py-4">
                <div class="row justify-content-between text-center gy-4 fs-5">
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">帳號</span>
                        <hr class="my-1">
                        <span>個案帳號</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">密碼</span>
                        <hr class="my-1">
                        <span>個案密碼</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">移植編號</span>
                        <hr class="my-1">
                        <span>個案移植編號</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">姓名</span>
                        <hr class="my-1">
                        <span>個案姓名</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">性別</span>
                        <hr class="my-1">
                        <span>個案性別</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">生日</span>
                        <hr class="my-1">
                        <span>個案生日</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">移植日期</span>
                        <hr class="my-1">
                        <span>個案移植日期</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">移植種類</span>
                        <hr class="my-1">
                        <span>個案移植種類</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">疾病種類</span>
                        <hr class="my-1">
                        <span>個案疾病種類</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="bi:droplet-half"></span>
                    <span>抽血數據</span>
                </h2>
            </div>
            <div class="card-body px-5 py-4">
                <canvas id="bloodChart"></canvas>

            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="fluent:bookmark-multiple-24-filled"></span>
                    <span>每週任務</span>
                </h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
                    <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                    <span>編輯資料</span>
                </button>
            </div>
            <div class="card-body px-5 py-4">

            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="fontisto:drug-pack"></span>
                    <span>施打藥物紀錄及劑量</span>
                </h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增資料</span>
                </button>
            </div>
            <div class="card-body px-5 py-4">

            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="icon-park-outline:application-effect"></span>
                    <span>副作用紀錄</span>
                </h2>
            </div>
            <div class="card-body px-5 py-4">

            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="octicon:report-16"></span>
                    <span>報告個管師紀錄</span>
                </h2>
            </div>
            <div class="card-body px-5 py-4">

            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="bi:image"></span>
                    <span>症狀影像紀錄</span>
                </h2>
            </div>
            <div class="card-body px-5 py-4">

            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    {{--  Page Customize Javascript  --}}
    <script src="{{asset('js/case/person.js')}}"></script>

@endsection
