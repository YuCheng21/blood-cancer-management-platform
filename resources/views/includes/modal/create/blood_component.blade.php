<div class="modal fade" tabindex="-1" id="createBloodComponentModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增抽血數據</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12">
                        <form action="{{route('blood-components.add', ['account' => $account])}}" id="createBloodComponentForm" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-2">
                                <label for="createBloodComponentDate" class="input-group-text">時間</label>
                                <input name="createBloodComponentDate" id="createBloodComponentDate" type="datetime-local"
                                       class="form-control" value="{{old('createBloodComponentDate')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createBloodComponentName" class="input-group-text">名稱</label>
                                <input name="createBloodComponentName" type="text" id="createBloodComponentName"
                                       class="form-control" placeholder="請輸入內容" value="{{old('createBloodComponentName')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createBloodComponentValue" class="input-group-text">數值</label>
                                <input name="createBloodComponentValue" type="number" id="createBloodComponentValue"
                                       class="form-control" placeholder="請輸入內容" value="{{old('createBloodComponentValue')}}">
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
                <a href="{{route('blood-components.add', ['account' => $account])}}" class="btn btn-primary" id="createBloodComponentSend"
                   onclick="event.preventDefault();$('#createBloodComponentForm').submit();">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </a>
            </div>
        </div>
    </div>
</div>
