@extends('base.all')

@section('title', $title)

@section('main')
    <div class="container-fluid py-4">
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="akar-icons:info-fill"></span>
                    <span>每週任務答題結果</span>
                </h2>
            </div>
            <div class="card-body px-2 px-lg-4 px-xl-5 py-4">
                @if(!empty($case_topics->toArray()))
                <h3 class="pb-2">
                    <ul class="mb-0">
                        <li>
                            <span>週次 :</span>
                            <span>{{ $case_topics->first()->case_task->week }}</span>
                        </li>
                        <li>
                            <span>任務 :</span>
                            <span>{{ $case_topics->first()->case_task->task->category_1 }}-{{ $case_topics->first()->case_task->task->category_2 }}.</span>
                            <span>{{ $case_topics->first()->case_task->task->name }}</span>
                        </li>
                    </ul>
                </h3>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped text-center align-middle fs-5"
                           data-toggle="table"
                           data-locale="zh-TW">
                        <thead>
                        <tr>
                            <th data-width="80" data-width-unit="%">題目</th>
                            <th data-width="20" data-width-unit="%" data-sortable="true">狀態</th>
                        </tr>
                        </thead>
                            @foreach($case_topics as $case_topic)
                                <tr>
                                    <td>{{ $case_topic->topic->question }}</td>
                                    @if($case_topic->state == 'correct')
                                        <td class="text-success">正確</td>
                                    @elseif($case_topic->state == 'wrong')
                                        <td class="text-danger">錯誤</td>
                                    @else
                                        <td>{{ $case_topic->state }}</td>
                                    @endif
                                </tr>
                            @endforeach
                    </table>
                </div>
                <div class="row py-4">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary w-100"
                                onclick="location.href='{{route('cases.show', ['account' => $account , '#weeklyTask'])}}'">
                            <span class="iconify-inline" data-icon="subway:tick"></span>
                            <span>確認</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

