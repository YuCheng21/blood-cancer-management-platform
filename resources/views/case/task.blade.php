@extends('base.all')

@section('title', $title)

@section('main')
    <div class="container-fluid py-4">
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="fa-solid:tools"></span>
                    <span>修改個案任務</span>
                </h2>
            </div>
            <div class="card-body px-2 px-lg-4 p-xl-5 py-4">
                <div class="table-responsive">
                    <table class="table table-striped text-center align-middle fs-5"
                           data-toggle="table"
                           data-locale="zh-TW">
                        <thead>
                        <tr>
                            <th data-width="15" data-width-unit="%">週次</th>
                            <th data-width="15" data-width-unit="%">排定日期</th>
                            <th data-width="60" data-width-unit="%" data-halign="center" data-align="left">任務</th>
                            <th data-width="10" data-width-unit="%">操作</th>
                        </tr>
                        </thead>
                        @for($i = 1; $i <= 12; $i++)
                            <tr>
                                <td>第 {{ $i }} 週</td>
                                <td>
                                    <span>{{ isset($start_at) ? $start_at->addDay(1)->toDateString() : '' }}</span><br>
                                    <span>~</span><br>
                                    <span>{{ isset($start_at) ? $start_at->addDay(6)->toDateString() : '' }}</span><br>
                                </td>
                                <td>
                                    <ul class="mb-0">
                                        @foreach($case_tasks as $task)
                                            @if($task->week == $i)
                                                @php(/* @var $item */ $item =  $task->task->category_1 . '-' . $task->task->category_2 . '. ' . $task->task->name )
                                                <li data-category-1="{{ $task->task->category_1 }}"
                                                    data-category-2="{{ $task->task->category_2 }}">{{ $item }}</li>
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
                    <div class="col-6">
                        <button type="button" class="btn btn-danger w-100"
                                onclick="location.href='{{route('cases.show', ['account' => $account])}}'">
                            <span class="iconify-inline" data-icon="websymbol:cancel"></span>
                            <span>取消</span>
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#updateCaseTaskModal">
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
    @include('includes.modal.update.case_task')
    @include('includes.modal.task_list')
@endsection

@section('script')
    @parent
    {{--  Page Customize Javascript  --}}
    <script src="{{asset('js/pages/case/task.js')}}"></script>

    <script>
        const task_post = '{{ route('cases.task_post', ['account' => $account]) }}'
        const csrf_token = '{{ $csrf_token }}'
    </script>
@endsection
