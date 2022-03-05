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
            <div class="card-body py-4 px-2 px-lg-4 px-xl-5">
                <div class="row justify-content-evenly text-center">
                    <div class="col-md-6 col-lg-3" id="messageNumberCard">
                        <div class="card text-white bg-info">
                            <div class="card-body fs-4">
                                <h4 class="card-title">消息總數</h4>
                                <hr>
                                <p id="messageNumber" class="card-text">{{ count($messages) }} 筆</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="ant-design:message-filled"></span>
                    <span>消息</span>
                </h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMessageModal">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增消息</span>
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
                                <th data-width="5" data-width-unit="%" data-sortable="true">訊息編號</th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">標題</th>
                                <th data-width="30" data-width-unit="%" data-sortable="true">內容</th>
                                <th data-width="10" data-width-unit="%" data-sortable="true">發布者</th>
                                <th data-width="10" data-width-unit="%" data-sortable="true">建立日期</th>
                                <th data-width="15" data-width-unit="%">操作選項</th>
                            </tr>
                            </thead>
                            @foreach($messages as $message)
                                <tr data-delete-url="{{ route('messages.destroy', ['id' => $message->id]) }}"
                                    data-update-url="{{ route('messages.update', ['id' => $message->id]) }}"
                                    data-apply-url="{{ route('messages.apply', ['id' => $message->id]) }}"
                                    data-id="{{ $message->id }}">
                                    <td>{{ $message->id }}</td>
                                    <td>{{ $message->title }}</td>
                                    <td>{{ $message->content }}</td>
                                    <td>{{ $message->user->name }}</td>
                                    <td>{{ $message->date }}</td>
                                    <td>
                                        <div class="row g-1">
                                            <div class="col-12 col-xxl-4">
                                                <button class="btn btn-primary w-100 updateMessageBtn" data-bs-toggle="modal" data-bs-target="#updateMessageModal">
                                                    編輯
                                                </button>
                                            </div>
                                            <div class="col-12 col-xxl-4">
                                                <button class="btn btn-danger w-100 deleteMessageBtn" data-bs-toggle="modal" data-bs-target="#deleteMessageModal">
                                                    刪除
                                                </button>
                                            </div>
                                            <div class="col-12 col-xxl-4">
                                                <button class="btn btn-secondary text-white w-100 applyMessageBtn" data-bs-toggle="modal"
                                                        data-bs-target="#applyMessageModal">
                                                    發送
                                                </button>
                                            </div>
                                            {{--                                            <div class="col-12 col-xl-6">--}}
                                            {{--                                                <button class="btn btn-secondary text-white w-100" data-bs-toggle="modal"--}}
                                            {{--                                                        data-bs-target="#applyAllMessageModal">--}}
                                            {{--                                                    全體發送--}}
                                            {{--                                                </button>--}}
                                            {{--                                            </div>--}}
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
    @include('includes.modal.create.message')
    @include('includes.modal.update.message')
    @include('includes.modal.delete.message')
    @include('includes.modal.apply.message')
    @include('includes.modal.apply.all_message')
@endsection

@section('script')
    @parent
    {{--  Page Customize Javascript  --}}
    <script src="{{ asset('js/pages/root/message.js') }}"></script>

    <script>
        const messages = @json($messages);
        const cases = @json($cases);
        const case_messages = @json($case_messages);
    </script>
@endsection
