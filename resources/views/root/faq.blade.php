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
                    <div class="col-md-6 col-lg-3" id="faqNumberCard">
                        <div class="card text-white bg-info">
                            <div class="card-body fs-4">
                                <h4 class="card-title">Q&A 總數</h4>
                                <hr>
                                <p id="faqNumber" class="card-text">5 筆</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="wpf:faq"></span>
                    <span>主題</span>
                </h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createFaqModal">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增 Q&A</span>
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
                                <th data-width="15" data-width-unit="%" data-sortable="true">主題</th>
                                <th data-width="25" data-width-unit="%" data-sortable="true">問題</th>
                                <th data-width="50" data-width-unit="%" data-sortable="true">解答</th>
                                <th data-width="10" data-width-unit="%">操作選項</th>
                            </tr>
                            </thead>
                            @for($i = 1; $i <= 12; $i++)
                                <tr>
                                    <td>QA 主題</td>
                                    <td>QA 問題</td>
                                    <td>QA 解答</td>
                                    <td>
                                        <div class="row g-1">
                                            <div class="col-6">
                                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#updateFaqModal">
                                                    編輯
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteFaqModal">
                                                    刪除
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    @include('includes.modal.create.faq')
    @include('includes.modal.delete.faq')
    @include('includes.modal.update.faq')
@endsection
