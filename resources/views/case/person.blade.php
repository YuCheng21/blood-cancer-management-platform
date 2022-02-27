@extends('base.all')

@section('title', $title)

@section('head')
    @parent
    <script src="{{asset('node_modules\chartjs-adapter-date-fns\dist\chartjs-adapter-date-fns.bundle.min.js')}}">
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
            <div class="card-body py-4 px-2 px-lg-4 p-xl-5">
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
            <div class="card-body py-4 px-2 px-lg-4 p-xl-5">
                <canvas id="bloodChart" style="min-height: 500px;"></canvas>
                {{--                <div class="row justify-content-center">--}}
                {{--                    <div class="col-12">--}}
                {{--                        --}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
        <div class="card border hv-shadow mb-4" id="weeklyTask">
            <div class="card-header justify-content-between d-inline-flex align-items-center">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="fluent:bookmark-multiple-24-filled"></span>
                    <span>每週任務</span>
                </h2>
                <button class="btn btn-primary"
                        onclick="location.href='{{route('cases.task', ['account' => $account])}}'">
                    <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                    <span>編輯資料</span>
                </button>
            </div>
            <div class="card-body py-4 px-2 px-lg-4 p-xl-5">
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
                            @php($counter1 = 1)
                            @php($counter2 = 1)
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
                                                    @if($counter1 % 2 == 0)
                                                        <li class="bg-primary bg-opacity-10">{{ $task->task->category_1 }}-{{ $task->task->category_2 }}-{{ $task->task->name }}</li>
                                                    @else
                                                        <li class="bg-info bg-opacity-10">{{ $task->task->category_1 }}-{{ $task->task->category_2 }}-{{ $task->task->name }}</li>
                                                    @endif
                                                    @php($counter1++)
                                                @endif
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        @foreach($case_tasks as $task)
                                            @if($task->week == $i)
                                                @if($task->state == 'completed')
                                                    <span class="text-success">已完成</span><br>
                                                @else
                                                    <span class="text-primary">未完成</span><br>
                                                @endif
                                                @php($counter2++)
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4">
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
            <div class="card-body py-4 px-2 px-lg-4 p-xl-5">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                               data-toggle="table"
                               data-search="true"
                               data-pagination="true"
                               data-page-size="5"
                               data-page-list="[ 5, 10, 15, 20, All]"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-width="20" data-width-unit="%" data-sortable="true">日期</th>
                                <th data-width="15" data-width-unit="%" data-sortable="true">療程</th>
                                <th data-width="40" data-width-unit="%" data-sortable="true">施打藥物種類</th>
                                <th data-width="15" data-width-unit="%" data-sortable="true">藥物劑量</th>
                                <th data-width="10" data-width-unit="%">操作選項</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>2021-12-14</td>
                                <td>Cycle1</td>
                                <td>藥物 A</td>
                                <td>200 mg</td>
                                <td>
                                    <button class="btn btn-secondary text-white" data-bs-toggle="modal"
                                            data-bs-target="#updateMedicineRecordModal">
                                        <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteMedicineRecordModal">
                                        <span class="iconify-inline" data-icon="ion:trash"></span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2021-01-17</td>
                                <td>Cycle2</td>
                                <td>藥物 B</td>
                                <td>100 mg</td>
                                <td>
                                    <button class="btn btn-secondary text-white" data-bs-toggle="modal"
                                            data-bs-target="#updateMedicineRecordModal">
                                        <span class="iconify-inline" data-icon="fa-regular:edit"></span>
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteMedicineRecordModal">
                                        <span class="iconify-inline" data-icon="ion:trash"></span>
                                    </button>
                                </td>
                            </tr>
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
            <div class="card-body py-4 px-2 px-lg-4 p-xl-5">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                               data-toggle="table"
                               data-search="true"
                               data-pagination="true"
                               data-page-size="5"
                               data-page-list="[ 5, 10, 15, 20, All]"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-width="20" data-width-unit="%" data-sortable="true">紀錄時間</th>
                                <th data-width="80" data-width-unit="%" data-sortable="true" data-halign="center"
                                    data-align="left">副作用
                                </th>
                            </tr>
                            </thead>
                            <tr>
                                <td>2021-12-14</td>
                                <td>
                                    <ul class="mb-0">
                                        <li>口乾（困擾度：3、嚴重度：1）</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>2021-01-25</td>
                                <td>
                                    <ul class="mb-0">
                                        <li>掉髮（困擾度：4、嚴重度：0）</li>
                                        <li>熱潮紅（困擾度：2、嚴重度：2）</li>
                                    </ul>
                                </td>
                            </tr>
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
            <div class="card-body py-4 px-2 px-lg-4 p-xl-5">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                               data-toggle="table"
                               data-search="true"
                               data-pagination="true"
                               data-page-size="5"
                               data-page-list="[ 5, 10, 15, 20, All]"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-width="20" data-width-unit="%" data-sortable="true">日期</th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">體力狀況</th>
                                <th data-width="40" data-width-unit="%" data-sortable="true">症狀</th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">固定回診醫院</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>2021-12-14</td>
                                <td>很好</td>
                                <td>噁心嘔吐</td>
                                <td>高醫</td>
                            </tr>
                            <tr>
                                <td>2022-01-17</td>
                                <td>普通</td>
                                <td>皮疹</td>
                                <td>榮總</td>
                            </tr>
                            <tr>
                                <td>2022-01-18</td>
                                <td>普通</td>
                                <td>無</td>
                                <td>高醫</td>
                            </tr>
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
            <div class="card-body py-4 px-2 px-lg-4 p-xl-5">
                <div class="d-flex flex-row flex-nowrap overflow-scroll">
                    <div class="d-flex flex-column align-items-center">
                        <a data-fancybox="gallery" class="text-center"
                           data-caption="Caption #1"
                           href="https://lipsum.app/id/1/800x800/">
                            <img src="https://lipsum.app/id/1/400x400/" class="m-1" alt=""/>
                        </a>
                        <span class="fs-4">2022-01-17 23:59:59</span>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <a data-fancybox="gallery" class="text-center"
                           data-caption="Caption #2"
                           href="https://lipsum.app/id/2/800x800/">
                            <img src="https://lipsum.app/id/2/400x400/" class="m-1" alt=""/>
                        </a>
                        <span class="fs-4">2022-01-17 23:59:59</span>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <a data-fancybox="gallery" class="text-center"
                           data-caption="Caption #3"
                           href="https://lipsum.app/id/3/800x800/">
                            <img src="https://lipsum.app/id/3/400x400/" class="m-1" alt=""/>
                        </a>
                        <span class="fs-4">2022-01-17 23:59:59</span>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <a data-fancybox="gallery" class="text-center"
                           data-caption="Caption #4"
                           href="https://lipsum.app/id/4/800x800/">
                            <img src="https://lipsum.app/id/4/400x400/" class="m-1" alt=""/>
                        </a>
                        <span class="fs-4">2022-01-17 23:59:59</span>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <a data-fancybox="gallery" class="text-center"
                           data-caption="Caption #5"
                           href="https://lipsum.app/id/5/800x800/">
                            <img src="https://lipsum.app/id/5/400x400/" class="m-1" alt=""/>
                        </a>
                        <span class="fs-4">2022-01-17 23:59:59</span>
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
@endsection

@section('script')
    @parent
    {{--  Page Customize Javascript  --}}
    <script src="{{asset('js/pages/case/person.js')}}"></script>
    <script>
        const caseUrl = '{{route('api.cases.show', ['account' => $case->account])}}'
        const bloodComponentUrl = '{{route('api.blood-components.account', ['account' => $case->account])}}'

        const updateUrl = '{{route('cases.update', ['account' => $case->account])}}';
    </script>
@endsection
