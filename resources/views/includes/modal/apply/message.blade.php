<div class="modal fade" tabindex="-1" id="applyMessageModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="fa:telegram"></span>
                    <span>發送至個案</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12 overflow-auto" style="max-height: 50vh">
                        <form action="#" id="applyMessageForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center text-center">
                                <div class="table-responsive">
                                    <table class="table table-striped text-center align-middle fs-6"
                                           data-toggle="table"
                                           data-search="true"
                                           data-click-to-select="true"
                                           data-pagination="false"
                                           data-locale="zh-TW">
                                        <thead>
                                        <tr>
                                            <th data-checkbox="true"></th>
                                            <th data-sortable="true">帳號</th>
                                            <th data-sortable="true">姓名</th>
                                            <th data-sortable="true">狀態</th>
                                        </tr>
                                        </thead>
                                        @foreach($cases as $case)
                                            <tr data-case-id="{{ $case->id }}">
                                                <td data-checkbox="true"></td>
                                                <td>{{ $case->account }}</td>
                                                <td>{{ $case->name }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <span class="iconify-inline" data-icon="websymbol:cancel"></span>
                    <span>關閉</span>
                </button>
                <a href="#" class="btn btn-primary" id="applyMessageSend"
                   onclick="event.preventDefault();">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </a>
            </div>
        </div>
    </div>
</div>
