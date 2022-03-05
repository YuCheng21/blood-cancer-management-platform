@extends('base.all')

@section('title', $title)

@section('head')
    @parent
    <script src="{{ asset('node_modules\chartjs-adapter-date-fns\dist\chartjs-adapter-date-fns.bundle.min.js' )}}">
    </script>
    <script src="{{ asset('node_modules/@fancyapps/ui/dist/fancybox.umd.js' )}}">
    </script>
@endsection

@section('main')
    <div class="container-fluid py-4">
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="clarity:info-standard-solid"></span>
                    <span>個人資料</span>
                </h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateCaseModal">
                    <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                    <span>編輯資料</span>
                </button>
            </div>
            <div class="card-body py-4 px-2 px-lg-4 px-xl-5">
                <div class="row justify-content-between text-center gy-4 fs-5">
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">帳號</span>
                        <hr class="my-1">
                        <span>{{$case->account}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">密碼</span>
                        <hr class="my-1">
                        <span>{{$case->password}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">移植編號</span>
                        <hr class="my-1">
                        <span>{{$case->transplant_num}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">姓名</span>
                        <hr class="my-1">
                        <span>{{$case->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">性別</span>
                        <hr class="my-1">
                        <span>{{$case->gender->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">生日</span>
                        <hr class="my-1">
                        <span>{{$case->birthday}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">移植日期</span>
                        <hr class="my-1">
                        <span>{{$case->date}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">移植種類</span>
                        <hr class="my-1">
                        <span>{{$case->transplant_type->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">疾病種類</span>
                        <hr class="my-1">
                        <span>
                            {{$case->disease_type->name}}
                            {{$case->disease_state_id == 1 ? '' : '- '.$case->disease_state->name}}
                            {{$case->disease_class_id == 1 ? '' : '- '.$case->disease_class->name}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="bi:droplet-half"></span>
                    <span>抽血數據</span>
                </h2>
            </div>
            <div class="card-body py-4 px-2 px-lg-4 px-xl-5">
                @if(count($blood_components))
                    <canvas id="bloodChart" style="min-height: 500px;"></canvas>
                @else
                    <div class="d-flex justify-content-center align-items-center" style="min-height: 100px;">
                        <p class="fs-1 text-primary text-opacity-50">查無資料</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="card border hv-shadow mb-4" id="weeklyTask">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="fluent:bookmark-multiple-24-filled"></span>
                    <span>每週任務</span>
                </h2>
                <a class="btn btn-primary" href="{{ route('cases.task', ['account' => $account]) }}">
                    <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                    <span>編輯資料</span>
                </a>
            </div>
            <div class="card-body py-4 px-2 px-lg-4 px-xl-5">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                               data-toggle="table"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-width="15" data-width-unit="%" data-sortable="true">週次</th>
                                <th data-width="15" data-width-unit="%" data-sortable="true">排定日期</th>
                                <th data-width="60" data-width-unit="%" data-halign="center" data-align="left">每週任務</th>
                                <th data-width="10" data-width-unit="%" data-sortable="true">進度</th>
                            </tr>
                            </thead>
                            @if(count($case_tasks))
                                @php($counter = 1)
                                @for($i = 1; $i <= 12; $i++)
                                    <tr>
                                        <td>第 {{ $i }} 週</td>
                                        <td>
                                            <span>{{ $start_at->addDay(1)->toDateString() }}</span><br>
                                            <span>~</span><br>
                                            <span>{{ $start_at->addDay(6)->toDateString() }}</span><br>
                                        </td>
                                        <td>
                                            <ul class="mb-0">
                                                @foreach($case_tasks as $task)
                                                    @if($task->week == $i)
                                                        @php(/* @var $item */ $item =  $task->category_1 . '-' . $task->category_2 . '. ' . $task->name )
                                                        @if($counter % 2 == 0)
                                                            <li class="bg-primary bg-opacity-10">{{ $item }}</li>
                                                        @else
                                                            <li class="bg-info bg-opacity-10">{{ $item }}</li>
                                                        @endif
                                                        @php(/* @var $counter */ $counter++)
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            @foreach($case_tasks as $task)
                                                @if($task->week == $i)
                                                    @if($task->state == 'completed')
                                                        <a href="{{ route('cases.topic', ['account' => $account, 'case_task_id' => $task->id]) }}">
                                                            <span class="text-success">已完成</span><br>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('cases.topic', ['account' => $account, 'case_task_id' => $task->id]) }}">
                                                            <span class="text-primary">未完成</span><br>
                                                        </a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endfor
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4" id="medicineRecord">
            <div class="card-header justify-content-between d-sm-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="fontisto:drug-pack"></span>
                    <span>施打藥物紀錄及劑量</span>
                </h2>
                <div class="d-flex flex-column flex-sm-row">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMedicineRecordModal">
                        <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                        <span>新增資料</span>
                    </button>
                </div>
            </div>
            <div class="card-body py-2 px-2 px-lg-4 px-xl-5">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                               data-toggle="table"
                               data-search="true"
                               data-sort-name="date"
                               data-sort-order="desc"
                               data-pagination="true"
                               data-page-size="5"
                               data-page-list="[ 5, 10, 15, 20, All]"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-width="20" data-width-unit="%" data-sortable="true" data-field="date">日期</th>
                                <th data-width="15" data-width-unit="%" data-sortable="true">療程</th>
                                <th data-width="40" data-width-unit="%" data-sortable="true">施打藥物種類</th>
                                <th data-width="15" data-width-unit="%" data-sortable="true">藥物劑量</th>
                                <th data-width="10" data-width-unit="%">操作選項</th>
                            </tr>
                            </thead>

                            @foreach($medicine_records as $medicine_record)
                                <tr>
                                    <td>{{ $medicine_record->date }}</td>
                                    <td>{{ $medicine_record->course }}</td>
                                    <td>{{ $medicine_record->type }}</td>
                                    <td>{{ $medicine_record->dose }}</td>
                                    <td>
                                        <button class="btn btn-secondary text-white updateMedicineRecordBtn" data-bs-toggle="modal"
                                                data-bs-target="#updateMedicineRecordModal"
                                                data-update-url="{{route('medicine.update', ['account' => $account, 'id' => $medicine_record->id])}}"
                                                data-id="{{ $medicine_record->id }}">
                                            <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                                        </button>
                                        <button class="btn btn-danger deleteMedicineRecordBtn" data-bs-toggle="modal"
                                                data-bs-target="#deleteMedicineRecordModal"
                                                data-url="{{route('medicine.destroy', ['account' => $account, 'id' => $medicine_record->id])}}">
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
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="icon-park-outline:application-effect"></span>
                    <span>副作用紀錄</span>
                </h2>
            </div>
            <div class="card-body py-2 px-2 px-lg-4 px-xl-5">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                               data-toggle="table"
                               data-search="true"
                               data-sort-name="date"
                               data-sort-order="desc"
                               data-pagination="true"
                               data-page-size="5"
                               data-page-list="[ 5, 10, 15, 20, All]"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-width="20" data-width-unit="%" data-sortable="true"  data-field="date">紀錄時間</th>
                                <th data-width="80" data-width-unit="%" data-sortable="true"
                                    data-halign="center" data-align="left">
                                    副作用
                                </th>
                            </tr>
                            </thead>
                            @foreach(\App\Helpers\AppHelper::reformat_side_effect_record($side_effect_records) as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>
                                        <ul class="mb-0">
                                            @foreach($value as $side_effect_record)
                                                @if($side_effect_record->has_image)
                                                <li onclick="fancybox_show('{{ $side_effect_record->path }}')">
                                                    <a href="{{ $side_effect_record->path }}" onclick="event.preventDefault();">{{ $side_effect_record->symptom }}</a><span>（嚴重度：{{ $side_effect_record->severity }}）</span>
                                                </li>
                                                @else
                                                <li>{{ $side_effect_record->symptom }}（嚴重度：{{ $side_effect_record->severity }}）</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="octicon:report-16"></span>
                    <span>報告個管師紀錄</span>
                </h2>
            </div>
            <div class="card-body py-2 px-2 px-lg-4 px-xl-5">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                               data-toggle="table"
                               data-search="true"
                               data-sort-name="date"
                               data-sort-order="desc"
                               data-pagination="true"
                               data-page-size="5"
                               data-page-list="[ 5, 10, 15, 20, All]"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-width="20" data-width-unit="%" data-sortable="true" data-field="date">日期</th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">體力狀況</th>
                                <th data-width="40" data-width-unit="%" data-sortable="true">症狀</th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">固定回診醫院</th>
                            </tr>
                            </thead>
                            @foreach($report_records as $report_record)
                                <tr>
                                    <td>{{ $report_record->date }}</td>
                                    <td>{{ $report_record->physical_strength }}</td>
                                    <td>{{ $report_record->symptom }}</td>
                                    <td>{{ $report_record->hospital }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4" id="gallery">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="bi:image"></span>
                    <span>症狀影像紀錄</span>
                </h2>
            </div>
            <div class="card-body py-4 px-2 px-lg-4 px-xl-5">
                @if(count($image_records))
                    <div class="d-flex flex-row flex-nowrap overflow-scroll">
                        @foreach($image_records as $image_record)
                            @if(!is_null($image_record->path))
                                <div class="d-flex flex-column align-items-center">
                                    <a data-fancybox="gallery" class="text-center"
                                       data-caption="{{ $image_record->caption }}"
                                       href="{{ $image_record->path }}">
                                        <img src="{{ $image_record->path }}" class="m-1" alt=""/>
                                    </a>
                                    <span class="fs-4">{{ $image_record->date }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="d-flex justify-content-center align-items-center" style="min-height: 100px;">
                        <p class="fs-1 text-primary text-opacity-50">查無資料</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
    @include('includes.modal.update.case')
    @include('includes.modal.create.medicine_record')
    @include('includes.modal.update.medicine_record')
    @include('includes.modal.delete.medicine_record')
@endsection

@section('script')
    @parent
    {{--  Page Customize Javascript  --}}
    <script src="{{asset('js/pages/case/person.js')}}"></script>
    <script>
        const cases = @json($case)

        const updateUrl = '{{route('cases.update', ['account' => $case->account])}}';
    </script>
@endsection
