@extends('base.all')

@section('title', $title)


@section('main')
    <div class="container-fluid py-4">
        <div class="card border hv-shadow mb-4">
            <div class="card-header justify-content-between d-xl-inline-flex align-items-center ">
                <h2 class="my-2">
                    <span class="iconify-inline" data-icon="bx:bxs-file-export"></span>
                    <span>個案資料匯出</span>
                </h2>
                <form action="#" id="exportForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column flex-xl-row">
                        <button type="button" class="btn btn-primary me-1 my-1 btn-export" data-action="total">
                            <span>總資料</span>
                        </button>
                        <button type="button" class="btn btn-primary me-1 my-1 btn-export" data-action="information">
                            <span>個人資料</span>
                        </button>
                        <button type="button" class="btn btn-primary me-1 my-1 btn-export" data-action="blood">
                            <span>抽血數據</span>
                        </button>
                        <button type="button" class="btn btn-primary me-1 my-1 btn-export" data-action="task">
                            <span>每週任務</span>
                        </button>
                        <button type="button" class="btn btn-primary me-1 my-1 btn-export" data-action="medicine">
                            <span>藥物劑量</span>
                        </button>
                        <button type="button" class="btn btn-primary me-1 my-1 btn-export" data-action="effect">
                            <span>副作用</span>
                        </button>
                        <button type="button" class="btn btn-primary me-1 my-1 btn-export" data-action="report">
                            <span>報告個管師</span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-body py-4 px-2 px-lg-4 px-xl-5">
                <div class="row justify-content-center text-center">
                    <div class="table-responsive">
                        <table class="table table-striped text-center align-middle fs-5 ws-nowrap"
                               data-toggle="table"
                               data-search="true"
                               data-click-to-select="true"
                               data-pagination="false"
                               data-locale="zh-TW">
                            <thead>
                            <tr>
                                <th data-width="10" data-width-unit="%" data-checkbox="true"></th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">帳號</th>
                                <th data-width="20" data-width-unit="%" data-sortable="true">姓名</th>
                                {{--                                <th data-width="20" data-width-unit="%" data-sortable="true">基本資料</th>--}}
                                <th data-width="20" data-width-unit="%" data-sortable="true">課程規劃與進度</th>
                                <th data-width="10" data-width-unit="%" data-sortable="true">個案匯出</th>
                            </tr>
                            </thead>
                            @foreach($cases as $case)
                                <tr data-case-id="{{ $case->id }}">
                                    <td data-checkbox="true"></td>
                                    <td>{{ $case->account }}</td>
                                    <td>{{ $case->name }}</td>
                                    {{--                                    <td><span class="iconify-inline text-success" data-icon="akar-icons:check"></span></td>--}}
                                    @if(!empty($case->case_tasks->toArray()))
                                        <td><span class="iconify-inline text-success"
                                                  data-icon="akar-icons:check"></span></td>
                                    @else
                                        <td><span class="iconify-inline text-danger"
                                                  data-icon="akar-icons:cross"></span></td>
                                    @endif
                                    <td class="text-success">
                                        <div class="row g-1">
                                            <div class="col-12">
                                                <a href="{{ route('exports.account', ['account' => $case->account]) }}"
                                                   class="btn btn-primary w-100">
                                                    匯出
                                                </a>
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
@endsection

@section('script')
    @parent
    {{--  Page Customize Javascript  --}}
    <script src="{{asset('js/pages/root/export.js')}}"></script>

    <script>
        const urlTotal = '{{ route('exports.total') }}';
        const urlInformation = '{{ route('exports.information') }}';
        const urlBlood = '{{ route('exports.blood') }}';
        const urlTask = '{{ route('exports.task') }}';
        const urlMedicine = '{{ route('exports.medicine') }}';
        const urlEffect = '{{ route('exports.effect') }}';
        const urlReport = '{{ route('exports.report') }}';
    </script>
@endsection
