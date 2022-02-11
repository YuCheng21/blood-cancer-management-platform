@extends('base.all')

@section('title', $title)

@section('main')
    <div class="container-fluid py-4">
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="fa-solid:tools"></span>
                    <span>編輯任務主模板</span>
                </h2>
            </div>
            <div class="card-body px-5 py-4">
                <div class="table-responsive">
                    <table class="table table-striped text-center align-middle fs-5"
                           data-toggle="table"
                           data-locale="zh-TW">
                        <thead>
                        <tr>
                            <th data-width="10" data-width-unit="%">週次</th>
                            <th data-width="80" data-width-unit="%">任務</th>
                            <th data-width="10" data-width-unit="%">操作</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>第 1 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>第 2 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>第 3 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>第 4 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>第 5 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>第 6 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>第 7 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>第 8 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>第 9 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>第 10 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>第 11 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>第 12 週</td>
                            <td>任務內容</td>
                            <td>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taskListModal">
                                    編輯
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="row py-4">
                    <div class="col-6">
                        <button type="button" class="btn btn-danger w-100" onclick="location.href='{{route('tasks.index')}}'">
                            <span class="iconify-inline" data-icon="websymbol:cancel"></span>
                            <span>取消</span>
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#updateMainTaskModal">
                            <span class="iconify-inline" data-icon="subway:tick"></span>
                            <span>確認</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    @include('includes.modal.update.main_task')
    @include('includes.modal.task_list')
@endsection
