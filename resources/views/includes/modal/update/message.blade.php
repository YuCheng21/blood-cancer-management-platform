<div class="modal fade" tabindex="-1" id="updateMessageModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="fa-solid:tools"></span>
                    <span>編輯消息</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12 overflow-auto" style="max-height: 70vh">
                        <form action="#" id="updateMessageForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="input-group mb-2">
                                <label for="updateMessageTitle" class="input-group-text">標題</label>
                                <input name="updateMessageTitle" id="updateMessageTitle" type="text"
                                       class="form-control" placeholder="請輸入消息標題">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateMessageContent" class="input-group-text">內容</label>
                                <textarea name="updateMessageContent" id="updateMessageContent"
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
                <a href="#" class="btn btn-primary" id="updateMessageSend"
                   onclick="event.preventDefault();$('#updateMessageForm').submit();">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </a>
            </div>
        </div>
    </div>
</div>
