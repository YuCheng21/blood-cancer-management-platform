@extends('base.all')

@section('title', $title)


@section('main')
    <div class="container-fluid py-4">
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-xl-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="bx:bxs-file-export"></span>
                    <span>個案資料批次匯出</span>
                </h2>
                <div class="d-flex flex-column flex-xl-row">
                    <button class="btn btn-primary me-1 my-1">
                        <span>匯出總資料</span>
                    </button>
                    <button class="btn btn-primary me-1 my-1">
                        <span>匯出個人資料</span>
                    </button>
                    <button class="btn btn-primary me-1 my-1">
                        <span>匯出抽血數據</span>
                    </button>
                    <button class="btn btn-primary me-1 my-1">
                        <span>匯出每週任務</span>
                    </button>
                    <button class="btn btn-primary me-1 my-1">
                        <span>匯出藥物及副作用</span>
                    </button>
                    <button class="btn btn-primary me-1 my-1">
                        <span>匯出報告個管師</span>
                    </button>
                </div>
            </div>
            <div class="card-body py-4 px-2 px-lg-4 p-xl-5">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                               data-toggle="table"
                               data-search="true"
                               data-click-to-select="true"
                               data-pagination="false"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-width="10" data-width-unit="%" data-checkbox="true"></th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">帳號</th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">姓名</th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">基本資料</th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">課程規劃與進度</th>
                                <th data-width="10" data-width-unit="%" data-sortable="true">個案匯出</th>
                            </tr>
                            </thead>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-checkbox="true"></td>
                                <td>個案帳號</td>
                                <td>個案姓名</td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td><span class="iconify-inline" data-icon="akar-icons:check"></span></td>
                                <td class="text-success">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100">
                                                匯出
                                            </button>
                                        </div>
                                    </div>
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
@endsection
