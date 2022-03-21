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
                        <form action="{{route('medicine.store', ['account' => $account])}}" id="createMedicineRecordForm" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-2">
                                <label for="createMedicineRecordType" class="input-group-text">藥物名稱</label>
                                <input name="createMedicineRecordType" type="text" id="createMedicineRecordType"
                                       class="form-control" placeholder="請輸入內容" value="{{old('createMedicineRecordType')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createMedicineRecordStartDate" class="input-group-text">施打日期起</label>
                                <input name="start_date" id="createMedicineRecordStartDate" type="date"
                                       class="form-control" value="{{old('start_date')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createMedicineRecordEndDate" class="input-group-text">施打日期迄</label>
                                <input name="end_date" id="createMedicineRecordEndDate" type="date"
                                       class="form-control" value="{{old('end_date')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createMedicineRecordDose" class="input-group-text">施打藥物劑量總量</label>
                                <input name="createMedicineRecordDose" type="text" id="createMedicineRecordDose"
                                       class="form-control" placeholder="請輸入內容" value="{{old('createMedicineRecordDose')}}">
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
                <a href="{{route('medicine.store', ['account' => $account])}}" class="btn btn-primary" id="createMedicineRecordSend"
                   onclick="event.preventDefault();$('#createMedicineRecordForm').submit();">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </a>
            </div>
        </div>
    </div>
</div>
