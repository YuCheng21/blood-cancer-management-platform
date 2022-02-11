<div class="modal fade" tabindex="-1" id="applyTaskModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="bi:collection-fill"></span>
                    <span>套用至個案</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12 overflow-auto" style="max-height: 50vh">
                        <form action="#" id="applyTaskForm" method="POST" enctype="multipart/form-data">
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
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-success">已設定任務</td>
                                        </tr>
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-success">已設定任務</td>
                                        </tr>
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-success">已設定任務</td>
                                        </tr>
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-dark">未設定任務</td>
                                        </tr>
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-dark">未設定任務</td>
                                        </tr>
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-success">已設定任務</td>
                                        </tr>
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-success">已設定任務</td>
                                        </tr>
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-success">已設定任務</td>
                                        </tr>
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-dark">未設定任務</td>
                                        </tr>
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-dark">未設定任務</td>
                                        </tr>
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-dark">未設定任務</td>
                                        </tr>
                                        <tr>
                                            <td data-checkbox="true"></td>
                                            <td>個案帳號</td>
                                            <td>個案姓名</td>
                                            <td class="text-dark">未設定任務</td>
                                        </tr>
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
                <button type="button" class="btn btn-primary" id="applyTaskSend">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>
