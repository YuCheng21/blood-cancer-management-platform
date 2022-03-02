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
                <div class="row justify-content-evenly text-center g-3">
                    <div class="col-md-12 col-lg-3" id="topicNumberCard">
                        <div class="card text-white bg-info">
                            <div class="card-body fs-4">
                                <h4 class="card-title">題目總數</h4>
                                <hr>
                                <p id="topicNumber" class="card-text">{{ count($topics) }} 筆</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3" id="mcqNumberCard">
                        <div class="card text-white bg-info">
                            <div class="card-body fs-4">
                                <h4 class="card-title">選擇題數</h4>
                                <hr>
                                <p id="mcqNumber" class="card-text">{{ $mc_number }} 筆</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3" id="tfqNumberCard">
                        <div class="card text-white bg-info">
                            <div class="card-body fs-4">
                                <h4 class="card-title">是非題數</h4>
                                <hr>
                                <p id="tfqNumber" class="card-text">{{ $tf_number }} 筆</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="wpf:faq"></span>
                    <span>題庫</span>
                </h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTopicModal">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增題目</span>
                </button>
            </div>
            <div class="card-body py-4 px-2 px-lg-4 px-xl-5">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                               data-toggle="table"
                               data-search="true"
                               data-pagination="true"
                               data-page-size="10"
                               data-page-list="[ 10, 20, 30, 50, All]"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-width="20" data-width-unit="%" data-sortable="true">課程</th>
                                <th data-width="35" data-width-unit="%" data-sortable="true" data-halign="center"
                                    data-align="left">題目</th>
                                <th data-width="10" data-width-unit="%" data-sortable="true">題型</th>
                                <th data-width="25" data-width-unit="%" data-sortable="true" data-halign="center"
                                    data-align="left">選項
                                </th>
                                <th data-width="10" data-width-unit="%">操作選項</th>
                            </tr>
                            </thead>
                            @foreach($topics as $topic)
                                <tr>
                                    <td>{{ $topic->type }}</td>
                                    <td class="ws-normal">{{ $topic->question }}</td>
                                    <td>{{ $topic->question_type == 'MC' ? '選擇題' : ($topic->question_type == 'TF' ? '是非題' : '')}}</td>
                                    <td>
                                        @if($topic->question_type == 'MC')
                                            <ol style="list-style-type: upper-alpha">
                                                <li>{{ $topic->option_a }}</li>
                                                <li>{{ $topic->option_b }}</li>
                                                <li>{{ $topic->option_c }}</li>
                                                <li>{{ $topic->option_d }}</li>
                                            </ol>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row g-1">
                                            <div class="col-12 col-xxl-6">
                                                <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                                        data-bs-target="#updateTopicModal">
                                                    編輯
                                                </button>
                                            </div>
                                            <div class="col-12 col-xxl-6">
                                                <button class="btn btn-danger w-100" data-bs-toggle="modal"
                                                        data-bs-target="#deleteTopicModal">
                                                    刪除
                                                </button>
                                            </div>
                                        </div>
                                    </td>
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
    @include('includes.modal.delete.topic')
    @include('includes.modal.create.topic')
    @include('includes.modal.update.topic')
@endsection
