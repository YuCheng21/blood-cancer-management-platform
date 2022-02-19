@extends('base.all')

@section('title', $title)

@section('main')
    <div class="container-fluid py-4">
        <div class="card border hv-shadow mb-4">
            <div class="card-header">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="ion:list-circle-sharp"></span>
                    <span>總覽</span>
                </h2>
            </div>
            <div class="card-body px-2 px-lg-4 p-xl-5 py-4">
                <div class="row justify-content-evenly text-center">
                    <div class="col-md-6 col-lg-3" id="caseNumberCard">
                        <div class="card text-white bg-info">
                            <div class="card-body fs-4">
                                <h4 class="card-title">個案總數</h4>
                                <hr>
                                <p id="caseNumber" class="card-text">{{count($cases)}} 筆</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="bi:people-fill"></span>
                    <span>個案</span>
                </h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCaseModal">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增個案</span>
                </button>
            </div>
            <div class="card-body py-4 px-2 px-lg-4 p-xl-5">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                               data-toggle="table"
                               data-search="true"
                               data-pagination="true"
                               data-page-size="10"
                               data-page-list="[ 10, 20, 30, 50, All]"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-sortable="true">帳號</th>
                                <th data-sortable="true">密碼</th>
                                <th data-sortable="true">移植編號</th>
                                <th data-sortable="true">姓名</th>
                                <th data-sortable="true">年齡</th>
                                <th data-sortable="true">性別</th>
                                <th data-sortable="true">移植日期</th>
                                <th>操作選項</th>
                            </tr>
                            </thead>
                            @foreach ($cases as $case)
                                <tr>
                                    <td>{{ $case->account }}</td>
                                    <td>{{ $case->password }}</td>
                                    <td>{{ $case->transplant_num }}</td>
                                    <td>{{ $case->name }}</td>
                                    <td>{{ $today->diffInYears($case->birthday) }}</td>
                                    <td>{{ $case->gender->name }}</td>
                                    <td>{{ $case->date }}</td>
                                    <td>
                                        <button class="btn btn-primary updateCaseBtn" data-bs-toggle="modal"
                                                data-bs-target="#updateCaseModal"
                                                data-url="{{route('cases.update', ['account' => $case->account])}}"
                                                data-account="{{ $case->account }}">
                                            <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                                        </button>
                                        <a href="{{route('cases.show', ['account' => $case->account])}}"
                                           class="btn btn-secondary text-white">
                                            <span class="iconify-inline" data-icon="whh:magnifier"></span>
                                        </a>
                                        <button class="btn btn-danger deleteCaseBtn" data-bs-toggle="modal"
                                                data-bs-target="#deleteCaseModal"
                                                data-url="{{route('cases.destroy', ['account' => $case->account])}}">
                                            <span class="iconify-inline" data-icon="ion:trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    @include('includes.modal.create.case')
    @include('includes.modal.update.case')
    @include('includes.modal.delete.case')
@endsection

@section('script')
    @parent
    {{--  Page Customize Javascript  --}}
    <script src="{{asset('js/pages/root/case.js')}}"></script>
    <script>
        const cases = @json($cases);
    </script>
@endsection
