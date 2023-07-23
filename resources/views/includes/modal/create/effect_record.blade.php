<div class="modal fade" tabindex="-1" id="createEffectRecordModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增副作用紀錄</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12">
                        <form action="{{route('effect.store', ['account' => $account])}}" id="createEffectRecordForm" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-2">
                                <label for="createEffectRecordDate" class="input-group-text">紀錄時間</label>
                                <input name="createEffectRecordDate" id="createEffectRecordDate" type="datetime-local"
                                       class="form-control" value="{{old('createEffectRecordDate')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createEffectRecordSymptom" class="input-group-text">症狀</label>
                                <input name="createEffectRecordSymptom" type="text" id="createEffectRecordSymptom"
                                       class="form-control" placeholder="請輸入內容" value="{{old('createEffectRecordSymptom')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createEffectRecordSeverity" class="input-group-text">嚴重度</label>
                                <input name="createEffectRecordSeverity" type="number" id="createEffectRecordSeverity" max="10" min="0"
                                       class="form-control" placeholder="請輸入內容" value="{{old('createEffectRecordSeverity')}}">
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
                <a href="{{route('effect.store', ['account' => $account])}}" class="btn btn-primary" id="createEffectRecordSend"
                   onclick="event.preventDefault();$('#createEffectRecordForm').submit();">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </a>
            </div>
        </div>
    </div>
</div>
