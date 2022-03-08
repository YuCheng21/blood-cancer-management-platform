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
            <div class="card-body px-2 px-lg-4 px-xl-5 py-4">
                <div class="row justify-content-evenly text-center">
                    <div class="col-md-6 col-lg-3" id="taskNumberCard">
                        <div class="card text-white bg-info">
                            <div class="card-body fs-4">
                                <h4 class="card-title">模板總數</h4>
                                <hr>
                                <p id="taskNumber" class="card-text">{{ count($names) }} 筆</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-md-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="fluent:task-list-square-ltr-24-filled"></span>
                    <span>每週任務規劃</span>
                </h2>
                <div class="d-flex flex-column flex-md-row">
                    <a class="btn btn-primary me-1 my-1" href="{{ route('tasks.main.index') }}">
                        <span class="iconify-inline" data-icon="fa-solid:tools"></span>
                        <span>編輯任務主模板</span>
                    </a>
                    <a class="btn btn-primary me-1 my-1" href="{{ route('tasks.sub.add') }}">
                        <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                        <span>新增任務副模板</span>
                    </a>
                </div>
            </div>
            <div class="card-body py-4 px-2 px-lg-4 px-xl-5" id="subTemplate">
                <div class="row justify-content-center g-2">
                    <div class="col-sm-12 col-lg-6">
                        <div class="input-group">
                            <label for="selectSubTemplate" class="input-group-text"
                                   data-bs-toggle="tooltip" data-bs-placement="bottom"
                                   title="選取要顯示的副模板內容">副模板</label>
                            <select name="selectSubTemplate" id="selectSubTemplate" class="form-select">
                                <option value="" selected>請選擇任務副模板</option>
                                @foreach($names as $name)
                                    <option value="{{$name->name}}"
                                            data-update-url="{{ route('tasks.sub.update', ['name' => $name->name]) }}"
                                            data-apply-url="{{ route('tasks.apply', ['name' => $name->name]) }}"
                                            data-delete-url="{{ route('tasks.sub.destroy', ['name' => $name->name]) }}">
                                        {{$name->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 col-lg-2">
                        <a href="#" class="btn btn-primary w-100 disabled" id="updateTaskBtn"> 編輯 </a>
                    </div>
                    <div class="col-sm-4 col-lg-2">
                        <button class="btn btn-danger w-100 disabled" data-bs-toggle="modal"
                                data-bs-target="#deleteTaskModal">
                            刪除
                        </button>
                    </div>
                    <div class="col-sm-4 col-lg-2"
                         data-bs-toggle="tooltip" data-bs-placement="bottom"
                         title="套用主模板+副模板至個案">
                        <button class="btn btn-secondary w-100 text-white disabled" data-bs-toggle="modal"
                                data-bs-target="#applyTaskModal">
                            套用
                        </button>
                    </div>
{{--                    <div class="col-sm-3 col-lg-2">--}}
{{--                        <button class="btn btn-secondary w-100 text-white" data-bs-toggle="modal"--}}
{{--                                data-bs-target="#applyAllTaskModal">--}}
{{--                            全體套用--}}
{{--                        </button>--}}
{{--                    </div>--}}

                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                                   data-toggle="table"
                                   data-locale="zh-TW">
                                <thead>
                                <tr>
                                    <th data-width="20" data-width-unit="%">週次</th>
                                    <th data-width="80" data-width-unit="%" data-halign="center" data-align="left">任務
                                    </th>
                                </tr>
                                </thead>
                                @for($i = 1; $i <= 12; $i++)
                                    <tr>
                                        <td>第 {{$i}} 週</td>
                                        <td></td>
                                    </tr>
                                @endfor
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

@section('script')
    @parent
    {{--  Page Customize Javascript  --}}
    <script src="{{asset('js/pages/root/task.js')}}"></script>

    <script>
        const templates = @json($templates);

        const csrf_token = '{{ $csrf_token }}'
    </script>
@endsection
