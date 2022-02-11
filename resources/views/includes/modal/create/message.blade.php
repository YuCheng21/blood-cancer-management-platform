<div class="modal fade" tabindex="-1" id="createMessageModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增消息</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12 overflow-auto" style="max-height: 70vh">
                        <form action="#" id="createMessageForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-2">
                                <label for="createMessageTitle" class="input-group-text">標題</label>
                                <input name="createMessageTitle" id="createMessageTitle" type="text"
                                       class="form-control" placeholder="請輸入消息標題">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createMessageContent" class="input-group-text">內容</label>
                                <textarea name="createMessageContent" id="createMessageContent"
                                          class="form-control" placeholder="請輸入消息內容" rows="8"></textarea>
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
                <button type="button" class="btn btn-primary" id="createMessageSend">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>
