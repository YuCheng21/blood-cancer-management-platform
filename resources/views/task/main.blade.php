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
                    <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
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
                                        @foreach($main_templates as $template)
                                            @if($template->week == $i)
                                                @php(/* @var $item */ $item =  $template->task->category_1 . ($template->task->category_2 == 0 ? '' : '-' . $template->task->category_2) . '. ' . $template->task->name )
                                                <li data-category-1="{{ $template->task->category_1 }}"
                                                    data-category-2="{{ $template->task->category_2 }}">{{ $item }}</li>
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

@section('script')
    @parent
    {{--  Page Customize Javascript  --}}
    <script src="{{asset('js/pages/task/main.js')}}"></script>

    <script>
        const main_post = '{{ route('tasks.main.index_post') }}'
        const csrf_token = '{{ $csrf_token }}'
    </script>
@endsection
