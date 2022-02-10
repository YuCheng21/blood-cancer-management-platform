<div class="modal fade" tabindex="-1" id="createMedicineRecordModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增施打藥物紀錄及劑量</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12">
                        <form action="#" id="createCaseForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-2">
                                <label for="createMedicineRecordDate" class="input-group-text">日期</label>
                                <input name="createMedicineRecordDate" id="createMedicineRecordDate" type="date" class="form-control">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createMedicineRecordCourse" class="input-group-text">療程</label>
                                <input name="createMedicineRecordCourse" type="text" id="createMedicineRecordCourse"
                                       class="form-control" placeholder="請輸入內容">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createMedicineRecordType" class="input-group-text">施打藥物種類</label>
                                <input name="createMedicineRecordType" type="password" id="createMedicineRecordType"
                                       class="form-control" placeholder="請輸入內容">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createMedicineRecordDose" class="input-group-text">藥物劑量</label>
                                <input name="createMedicineRecordDose" type="text" id="createMedicineRecordDose"
                                       class="form-control" placeholder="請輸入內容">
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
                <button type="button" class="btn btn-primary" id="createCaseSend">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>
