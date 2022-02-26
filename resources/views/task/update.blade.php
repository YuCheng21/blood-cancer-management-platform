@extends('base.all')

@section('title', $title)

@section('main')
    <div class="container-fluid py-4">
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="fa-solid:tools"></span>
                    <span>編輯任務副模板</span>
                </h2>
            </div>
            <div class="card-body px-5 py-4">
                <div class="input-group w-auto py-4">
                    <label for="updateSubTemplate" class="input-group-text">任務副模板名稱</label>
                    <input name="updateSubTemplate" type="text" id="updateSubTemplate"
                           class="form-control" placeholder="請輸入任務副模板名稱" value="{{ $name }}">
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center align-middle fs-5"
                           data-toggle="table"
                           data-locale="zh-TW">
                        <thead>
                        <tr>
                            <th data-width="10" data-width-unit="%">週次</th>
                            <th data-width="80" data-width-unit="%" data-halign="center" data-align="left">任務</th>
                            <th data-width="10" data-width-unit="%">操作</th>
                        </tr>
                        </thead>
                        @for($i = 1; $i <= 12; $i++)
                            <tr>
                                <td>第 {{$i}} 週</td>
                                <td>
                                    <ul class="mb-0">
                                        @foreach($templates as $template)
                                            @if($template->week == $i)
                                                <li>{{$template->task->category_1}}-{{$template->task->category_2}}-{{$template->task->name}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <button class="btn btn-primary w-100 updateTaskListBtn" data-bs-toggle="modal"
                                            data-bs-target="#taskListModal">
                                        編輯
                                    </button>
                                </td>
                            </tr>
                        @endfor
                    </table>
                </div>
                <div class="row py-4">
                    <div class="col-4">
                        <button type="button" class="btn btn-secondary text-white w-100" data-bs-toggle="modal"
                                data-bs-target="#createAsTaskModal">
                            <span class="iconify-inline" data-icon="akar-icons:plus"></span>
                            <span>另存新模板</span>
                        </button>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-danger w-100"
                                onclick="location.href='{{route('tasks.index')}}'">
                            <span class="iconify-inline" data-icon="websymbol:cancel"></span>
                            <span>取消</span>
                        </button>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#updateTaskModal">
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
    @include('includes.modal.update.task')
    @include('includes.modal.create.as_task')
    @include('includes.modal.task_list')
@endsection

@section('script')
    @parent
    {{--  Page Customize Javascript  --}}
    <script src="{{asset('js/pages/task/update.js')}}"></script>

    <script>
        const sub_update_post = '{{ route('tasks.sub.update_post', ['name' => $name]) }}'
        const csrf_token = '{{ $csrf_token }}'
    </script>
@endsection
