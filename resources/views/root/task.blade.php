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
                    <div class="col-md-6 col-lg-3" id="taskNumberCard">
                        <div class="card text-white bg-info">
                            <div class="card-body fs-4">
                                <h4 class="card-title">模板總數</h4>
                                <hr>
                                <p id="taskNumber" class="card-text">8 筆</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="fluent:task-list-square-ltr-24-filled"></span>
                    <span>每週任務規劃</span>
                </h2>
                <div>
                    <button class="btn btn-primary me-1 my-1" onclick="location.href='{{route('tasks.main.edit')}}'">
                        <span class="iconify-inline" data-icon="fa-solid:tools"></span>
                        <span>編輯任務主模板</span>
                    </button>
                    <button class="btn btn-primary me-1 my-1" onclick="location.href='{{route('tasks.sub.add')}}'">
                        <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                        <span>新增任務副模板</span>
                    </button>
                </div>
            </div>
            <div class="card-body px-5 py-4">
                <div class="row justify-content-center g-2">
                    <div class="col-sm-12 col-lg-4">
                        <div class="input-group">
                            <label for="selectSubTemplate" class="input-group-text">副模板</label>
                            <select name="selectSubTemplate" id="selectSubTemplate" class="form-select">
                                <option value="0" selected>請選擇任務副模板</option>
                                <option value="1">副模板 1</option>
                                <option value="2">副模板 2</option>
                                <option value="3">副模板 3</option>
                                <option value="4">副模板 4</option>
                                <option value="5">副模板 5</option>
                                <option value="6">副模板 6</option>
                                <option value="7">副模板 7</option>
                                <option value="8">副模板 8</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-lg-2">
                        <button class="btn btn-primary w-100" onclick="location.href='{{route('tasks.sub.edit')}}'">
                            編輯
                        </button>
                    </div>
                    <div class="col-sm-3 col-lg-2">
                        <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteTaskModal">
                            刪除
                        </button>
                    </div>
                    <div class="col-sm-3 col-lg-2">
                        <button class="btn btn-secondary w-100 text-white" data-bs-toggle="modal"
                                data-bs-target="#applyTaskModal">
                            套用
                        </button>
                    </div>
                    <div class="col-sm-3 col-lg-2">
                        <button class="btn btn-secondary w-100 text-white" data-bs-toggle="modal"
                                data-bs-target="#applyAllTaskModal">
                            全體套用
                        </button>
                    </div>

                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped text-center align-middle fs-5"
                                   data-toggle="table"
                                   data-locale="zh-TW">
                                <thead>
                                <tr>
                                    <th data-width="20" data-width-unit="%">週次</th>
                                    <th data-width="80" data-width-unit="%">任務</th>
                                </tr>
                                </thead>
                                <tr>
                                    <td>第 1 週</td>
                                    <td>任務內容</td>
                                </tr>
                                <tr>
                                    <td>第 2 週</td>
                                    <td>任務內容</td>
                                </tr>
                                <tr>
                                    <td>第 3 週</td>
                                    <td>任務內容</td>
                                </tr>
                                <tr>
                                    <td>第 4 週</td>
                                    <td>任務內容</td>
                                </tr>
                                <tr>
                                    <td>第 5 週</td>
                                    <td>任務內容</td>
                                </tr>
                                <tr>
                                    <td>第 6 週</td>
                                    <td>任務內容</td>
                                </tr>
                                <tr>
                                    <td>第 7 週</td>
                                    <td>任務內容</td>
                                </tr>
                                <tr>
                                    <td>第 8 週</td>
                                    <td>任務內容</td>
                                </tr>
                                <tr>
                                    <td>第 9 週</td>
                                    <td>任務內容</td>
                                </tr>
                                <tr>
                                    <td>第 10 週</td>
                                    <td>任務內容</td>
                                </tr>
                                <tr>
                                    <td>第 11 週</td>
                                    <td>任務內容</td>
                                </tr>
                                <tr>
                                    <td>第 12 週</td>
                                    <td>任務內容</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    @include('includes.modal.delete.task')
    @include('includes.modal.apply.all_task')
    @include('includes.modal.apply.task')
@endsection
