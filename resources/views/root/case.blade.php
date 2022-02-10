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
            <div class="card-body px-5 py-4">
                <div class="row justify-content-evenly text-center">
                    <div class="col-md-6 col-lg-3" id="caseNumberCard">
                        <div class="card text-white bg-info">
                            <div class="card-body fs-4">
                                <h4 class="card-title">個案總數</h4>
                                <hr>
                                <p id="caseNumber" class="card-text">XX 筆</p>
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
            <div class="card-body px-5 py-4">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5"
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
                            <tr>
                                <td>個案帳號</td>
                                <td>個案密碼</td>
                                <td>個案移植編號</td>
                                <td>個案姓名</td>
                                <td>個案年齡</td>
                                <td>個案性別</td>
                                <td>個案移植日期</td>
                                <td>
                                    <button class="btn btn-secondary text-white" data-bs-toggle="modal" data-bs-target="#updateCaseModal">
                                        <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                                    </button>
                                    <button class="btn btn-primary" onclick="location.href='/case/person'">
                                        <span class="iconify-inline" data-icon="whh:magnifier"></span>
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCaseModal">
                                        <span class="iconify-inline" data-icon="ion:trash"></span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>user</td>
                                <td>password</td>
                                <td>N0001</td>
                                <td>王小明</td>
                                <td>32</td>
                                <td>男</td>
                                <td>2022-02-10</td>
                                <td>
                                    <button class="btn btn-secondary text-white" data-bs-toggle="modal" data-bs-target="#updateCaseModal">
                                        <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                                    </button>
                                    <button class="btn btn-primary" onclick="location.href='/case/person'">
                                        <span class="iconify-inline" data-icon="whh:magnifier"></span>
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCaseModal">
                                        <span class="iconify-inline" data-icon="ion:trash"></span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>test</td>
                                <td>test</td>
                                <td>N0002</td>
                                <td>王大明</td>
                                <td>43</td>
                                <td>男</td>
                                <td>2022-02-10</td>
                                <td>
                                    <button class="btn btn-secondary text-white" data-bs-toggle="modal" data-bs-target="#updateCaseModal">
                                        <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                                    </button>
                                    <button class="btn btn-primary" onclick="location.href='/case/person'">
                                        <span class="iconify-inline" data-icon="whh:magnifier"></span>
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCaseModal">
                                        <span class="iconify-inline" data-icon="ion:trash"></span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>test3</td>
                                <td>test3</td>
                                <td>N0003</td>
                                <td>王中明</td>
                                <td>41</td>
                                <td>男</td>
                                <td>2022-02-10</td>
                                <td>
                                    <button class="btn btn-secondary text-white" data-bs-toggle="modal" data-bs-target="#updateCaseModal">
                                        <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                                    </button>
                                    <button class="btn btn-primary" onclick="location.href='/case/person'">
                                        <span class="iconify-inline" data-icon="whh:magnifier"></span>
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCaseModal">
                                        <span class="iconify-inline" data-icon="ion:trash"></span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    @include('includes.modal.create_case')
    @include('includes.modal.update_case')
    @include('includes.modal.delete_case')
@endsection
