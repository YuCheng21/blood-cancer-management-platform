<div class="modal fade" tabindex="-1" id="updateMedicineRecordModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="fa-solid:tools"></span>
                    <span>修改施打藥物紀錄及劑量</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12">
                        <form action="#" id="updateMedicineRecordForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-2">
                                <label for="updateMedicineRecordDate" class="input-group-text">日期</label>
                                <input name="updateMedicineRecordDate" id="updateMedicineRecordDate" type="date" class="form-control">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateMedicineRecordCourse" class="input-group-text">療程</label>
                                <input name="updateMedicineRecordCourse" type="text" id="updateMedicineRecordCourse"
                                       class="form-control" placeholder="請輸入內容">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateMedicineRecordType" class="input-group-text">施打藥物種類</label>
                                <input name="updateMedicineRecordType" type="text" id="updateMedicineRecordType"
                                       class="form-control" placeholder="請輸入內容">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateMedicineRecordDose" class="input-group-text">藥物劑量</label>
                                <input name="updateMedicineRecordDose" type="text" id="updateMedicineRecordDose"
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
                <button type="button" class="btn btn-primary" id="updateMedicineRecordSend">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>
