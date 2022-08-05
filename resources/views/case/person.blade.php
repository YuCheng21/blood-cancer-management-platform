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
                    <span>個案</span>
                </h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateCaseModal">
                    <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                    <span>編輯資料</span>
                </button>
            </div>
            <div class="card-body py-4 px-2 px-lg-4 px-xl-5">
                <div class="row justify-content-between text-center gy-4 fs-5">
                    <h3>個人資料</h3>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">帳號</span>
                        <hr class="my-1">
                        <span>{{$case->account}}</span>
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
                        <span class="bg-primary bg-opacity-50">籍貫</span>
                        <hr class="my-1">
                        <span>{{$case->hometown->name}}{{$case->hometown_id == 6 ? ' - '.$case->hometown_other :  ''}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">教育程度</span>
                        <hr class="my-1">
                        <span>{{$case->education->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">婚姻狀況</span>
                        <hr class="my-1">
                        <span>{{$case->marriage->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">宗教信仰</span>
                        <hr class="my-1">
                        <span>{{$case->religion->name}}{{$case->religion_id == 8 ? ' - '.$case->religion_other :  ''}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">職業</span>
                        <hr class="my-1">
                        <span>{{$case->profession_detail->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">每個月家中總收入</span>
                        <hr class="my-1">
                        <span>{{$case->income->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">收入來自於多少人</span>
                        <hr class="my-1">
                        <span>{{$case->source->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">收案日期</span>
                        <hr class="my-1">
                        <span>{{$case->end_date}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">分組</span>
                        <hr class="my-1">
                        <span>{{$case->experimental->name}}</span>
                    </div>
                    <hr>
                    <h3>疾病種類</h3>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">確診日期</span>
                        <hr class="my-1">
                        <span>{{$case->diagnosed}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">移植日期</span>
                        <hr class="my-1">
                        <span>{{$case->date}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">移植種類</span>
                        <hr class="my-1">
                        <span>{{$case->transplant_type->name}}{{$case->transplant_type->id == 6 ? ' - '.$case->transplant_type_other : ''}}</span>
                    </div>

                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">異體移植 HLA type</span>
                        <hr class="my-1">
                        <span>{{$case->hla_type->name}}</span>
                    </div>

                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">病人 HLA</span>
                        <hr class="my-1">
                        <span>
                            A{{$case->patient_hla_a1}};{{$case->patient_hla_a2}},
                            B{{$case->patient_hla_b1}};{{$case->patient_hla_b2}},
                            C{{$case->patient_hla_c1}};{{$case->patient_hla_c2}},
                            DR{{$case->patient_hla_dr1}};{{$case->patient_hla_dr2}},
                            DQ{{$case->patient_hla_dq1}};{{$case->patient_hla_dq2}}
                            ({{$case->patient_hla_match}}/10 match)
                        </span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">捐贈者 HLA</span>
                        <hr class="my-1">
                        <span>
                            A{{$case->donor_hla_a1}};{{$case->donor_hla_a2}},
                            B{{$case->donor_hla_b1}};{{$case->donor_hla_b2}},
                            C{{$case->donor_hla_c1}};{{$case->donor_hla_c2}},
                            DR{{$case->donor_hla_dr1}};{{$case->donor_hla_dr2}},
                            DQ{{$case->donor_hla_dq1}};{{$case->donor_hla_dq2}}
{{--                            ({{$case->donor_hla_match}}/10 match)--}}
                        </span>
                    </div>

                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">疾病種類</span>
                        <hr class="my-1">
                        <span>{{$case->disease_type->name}}{{$case->disease_type->id == 7 ? ' - '.$case->disease_type_other : ''}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">疾病分期</span>
                        <hr class="my-1">
                        <span>{{$case->disease_state->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">疾病分類</span>
                        <hr class="my-1">
                        <span>{{$case->disease_class->name}}</span>
                    </div>

                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">移植時的疾病狀態</span>
                        <hr class="my-1">
                        <span>{{$case->transplant_state->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">病人移植前血型</span>
                        <hr class="my-1">
                        <span>{{$case->before_blood_type->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">捐贈者血型</span>
                        <hr class="my-1">
                        <span>{{$case->donor_blood_type->name}}</span>
                    </div>
                    <div class="col-md-6 col-lg-4 flex-column d-flex">
                        <span class="bg-primary bg-opacity-50">病人移植後血型</span>
                        <hr class="my-1">
                        <span>{{$case->after_blood_type->name}}</span>
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
                @if(count($case_blood_components))
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
                        <table class="table text-center align-middle fs-5"
                               data-toggle="table"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-width="15" data-width-unit="%">週次</th>
                                <th data-width="15" data-width-unit="%">排定日期</th>
                                <th data-width="60" data-width-unit="%" data-halign="center" data-align="left">每週任務</th>
                                <th data-width="10" data-width-unit="%">進度</th>
                            </tr>
                            </thead>
                            @php(/* @var $new_case_tasks */ $new_case_tasks = \App\Helpers\AppHelper::reformat_by_key(\App\Helpers\AppHelper::tasks_sort($case_tasks->toArray()), 'week'))
                            @if(!empty($new_case_tasks))
                                @for($i = 1; $i <= max(array_keys($new_case_tasks)); $i++)
                                    @if(isset($new_case_tasks[$i]))
                                        @foreach($new_case_tasks[$i] as $case_task)
                                            <tr>
                                                @if($loop->first)
                                                    <td rowspan="{{ count($new_case_tasks[$i]) }}">第 {{ $i }} 週</td>
                                                    <td rowspan="{{ count($new_case_tasks[$i]) }}">
                                                        <span>{{ \Carbon\Carbon::parse($case_task['start_at'])->addDays(($case_task['week'] - 1) * 7)->toDateString() }}</span><br>
                                                        <span>~</span><br>
                                                        <span>{{ \Carbon\Carbon::parse($case_task['start_at'])->addDays($case_task['week'] * 7 - 1)->toDateString() }}</span>
                                                    </td>
                                                @endif
                                                @php(/* @var $item */ $item =  $case_task['category_1'] . ($case_task['category_2'] == '0' ? '' : '-' . $case_task['category_2']) . '. ' . $case_task['name'] )
                                                <td>{{ $item }}</td>
                                                <td>
{{--                                                    <a href="{{ route('cases.topic', ['account' => $account, 'case_task_id' => $case_task['id']]) }}">--}}
                                                        @if($case_task['state'] == 'completed')
                                                            <span class="text-success">已完成</span><br>
                                                        @elseif($case_task['state'] == 'uncompleted')
                                                            <span class="text-primary">未完成</span><br>
                                                        @else
                                                            <span>未完成</span><br>
                                                        @endif
{{--                                                    </a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>第 {{ $i }} 週</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
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
                                <th data-width="40" data-width-unit="%" data-sortable="true">藥物名稱</th>
                                <th data-width="15" data-width-unit="%" data-sortable="true" data-field="date">施打日期起</th>
                                <th data-width="15" data-width-unit="%" data-sortable="true" data-field="date">施打日期迄</th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">施打藥物劑量總量</th>
                                <th data-width="10" data-width-unit="%">操作選項</th>
                            </tr>
                            </thead>

                            @foreach($medicine_records as $medicine_record)
                                <tr>
                                    <td>{{ $medicine_record->type }}</td>
                                    <td>{{ $medicine_record->start_date }}</td>
                                    <td>{{ $medicine_record->end_date }}</td>
                                    <td>{{ $medicine_record->dose }}</td>
                                    <td>
                                        <button class="btn btn-secondary text-white updateMedicineRecordBtn"
                                                data-bs-toggle="modal"
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
        <div class="card border hv-shadow mb-4" id="effectRecord">
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
                                <th data-width="20" data-width-unit="%" data-sortable="true" data-field="date">紀錄時間</th>
                                <th data-width="60" data-width-unit="%"
                                    data-halign="center" data-align="left">
                                    副作用
                                </th>
                                <th data-width="10" data-width-unit="%">嚴重度</th>
                                <th data-width="10" data-width-unit="%">操作</th>
                            </tr>
                            </thead>
                            @php($counter = 1)
                            @foreach(\App\Helpers\AppHelper::reformat_by_key($side_effect_records, 'date') as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>
                                        <ul class="mb-0">
                                            @foreach($value as $side_effect_record)
                                                @if($counter % 2 == 0)
                                                    <li class="bg-primary bg-opacity-10">
                                                        @if($side_effect_record->has_image)
                                                            <a href="{{ $side_effect_record->path()}}"
                                                               onclick="event.preventDefault();fancybox_show('{{ $side_effect_record->path() }}');">
                                                                {{ $side_effect_record->symptom }}
                                                            </a>
                                                        @else
                                                            {{ $side_effect_record->symptom }}
                                                        @endif
                                                    </li>
                                                @else
                                                    <li class="bg-info bg-opacity-10">
                                                        @if($side_effect_record->has_image)
                                                            <a href="{{ $side_effect_record->path()}}"
                                                               onclick="event.preventDefault();fancybox_show('{{ $side_effect_record->path() }}');">
                                                                {{ $side_effect_record->symptom }}
                                                            </a>
                                                        @else
                                                            {{ $side_effect_record->symptom }}
                                                        @endif
                                                    </li>
                                                @endif


                                                @php(/* @var $counter */ $counter++)
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        @foreach($value as $side_effect_record)
                                            @if($side_effect_record->symptom == "發燒" || $side_effect_record->symptom == "白血球低下" || $side_effect_record->symptom == "血小板低下" || $side_effect_record->symptom == "血紅素低下")
                                                @if($side_effect_record->severity > 0)
                                                    <span>有</span><br>
                                                @else
                                                    <span>無</span><br>
                                                @endif
                                            @else
                                                <span>{{ $side_effect_record->severity }}</span><br>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($value as $side_effect_record)
                                            <button class="btn-danger deleteEffectRecordBtn" data-bs-toggle="modal"
                                                    data-bs-target="#deleteEffectRecordModal"
                                                    data-url="{{route('effect.destroy', ['account' => $account, 'id' => $side_effect_record->id])}}">
                                                <span class="iconify-inline" data-icon="ion:trash"></span>
                                            </button>
                                            <br>
                                        @endforeach
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
                                <th data-width="20" data-width-unit="%" data-sortable="true">體力滿意度</th>
{{--                                <th data-width="40" data-width-unit="%" data-sortable="true">症狀</th>--}}
                                <th data-width="20" data-width-unit="%" data-sortable="true">固定回診醫院</th>
                            </tr>
                            </thead>
                            @foreach($report_records as $report_record)
                                <tr>
                                    <td>{{ $report_record->date }}</td>
                                    <td>{{ $report_record->physical_strength->name }}</td>
{{--                                    <td>{{ $report_record->symptom }}</td>--}}
                                    @if($report_record->hospital->name == '其他')
                                        <td>{{ $report_record->hospital_other }}</td>
                                    @else
                                        <td>{{ $report_record->hospital->name }}</td>
                                    @endif
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
                            @if(!is_null($image_record->path()))
                                <div class="d-flex flex-column align-items-center">
                                    <a data-fancybox="gallery" class="text-center"
                                       data-caption="{{ $image_record->caption }}"
                                       href="{{ $image_record->path() }}">
                                        <img src="{{ $image_record->path() }}" class="m-1" alt=""/>
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
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="dashicons:video-alt3"></span>
                    <span>影片觀看紀錄</span>
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
                                <th data-width="20" data-width-unit="%" data-sortable="true">影片名稱</th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">觀看時間</th>
                            </tr>
                            </thead>
                            @foreach($video_records as $video_record)
                                <tr>
                                    <td>{{ $video_record->date }}</td>
                                    <td>{{ $video_record->name }}</td>
                                    <td>{{ floor($video_record->end / 60) }} 分 {{ $video_record->end % 60 }} 秒</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
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
    @include('includes.modal.delete.effect_record')
@endsection

@section('script')
    @parent
    {{--  Page Customize Javascript  --}}
    <script src="{{asset('js/pages/case/person.js')}}"></script>
    <script>
        const cases = @json($case);
        const reformat_blood_components = @json($reformat_blood_components);

        const updateUrl = '{{route('cases.update', ['account' => $case->account])}}';
    </script>
@endsection
