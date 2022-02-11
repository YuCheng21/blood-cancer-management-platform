<div class="modal fade" tabindex="-1" id="taskListModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="jam:task-list-f"></span>
                    <span>任務清單</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12 overflow-auto" style="max-height: 50vh">
                        <form action="#" id="taskListForm" method="POST" enctype="multipart/form-data">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#group1">
                                            類別 1
                                        </button>
                                    </h2>
                                    <div id="group1" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group1100">
                                                <label class="form-check-label" for="group1100">
                                                    1-1 項目名稱
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group1200">
                                                <label class="form-check-label" for="group1200">
                                                    1-2 項目名稱
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group1300">
                                                <label class="form-check-label" for="group1300">
                                                    1-3 項目名稱
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group1400">
                                                <label class="form-check-label" for="group1400">
                                                    1-4 項目名稱
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#group2">
                                            類別 2
                                        </button>
                                    </h2>
                                    <div id="group2" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group2100">
                                                <label class="form-check-label" for="group2100">
                                                    2-1 項目名稱
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group2200">
                                                <label class="form-check-label" for="group2200">
                                                    2-2 項目名稱
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group2300">
                                                <label class="form-check-label" for="group2300">
                                                    2-3 項目名稱
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group2400">
                                                <label class="form-check-label" for="group2400">
                                                    2-4 項目名稱
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#group3">
                                            類別 3
                                        </button>
                                    </h2>
                                    <div id="group3" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group3100">
                                                <label class="form-check-label" for="group3100">
                                                    3-1 項目名稱
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group3200">
                                                <label class="form-check-label" for="group3200">
                                                    3-2 項目名稱
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group3300">
                                                <label class="form-check-label" for="group3300">
                                                    3-3 項目名稱
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="group3400">
                                                <label class="form-check-label" for="group3400">
                                                    3-4 項目名稱
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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
                <button type="button" class="btn btn-primary" id="taskListSend">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>
