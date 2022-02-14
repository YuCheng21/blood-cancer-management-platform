<div class="modal fade" tabindex="-1" id="updateFaqModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>編輯 Q&A</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12 overflow-auto" style="max-height: 70vh">
                        <form action="#" id="updateFaqForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-2">
                                <label for="updateFaqType" class="input-group-text">類型</label>
                                <select name="updateFaqType" id="updateFaqType" class="form-select">
                                    <option value="0" selected>請選擇問題類型</option>
                                    <option value="1">問題類型1</option>
                                    <option value="2">問題類型2</option>
                                    <option value="3">問題類型3</option>
                                    <option value="4">問題類型4</option>
                                    <option value="5">問題類型5</option>
                                    <option value="6">問題類型6</option>
                                    <option value="7">問題類型7</option>
                                    <option value="8">問題類型8</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateFaqTitle" class="input-group-text">問題</label>
                                <textarea name="updateFaqTitle" id="updateFaqTitle"
                                          class="form-control" placeholder="請輸入問題內容" rows="3"></textarea>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateFaqContent" class="input-group-text">回答</label>
                                <textarea name="updateFaqContent" id="updateFaqContent"
                                          class="form-control" placeholder="請輸入回答內容" rows="8"></textarea>
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
                <button type="button" class="btn btn-primary" id="updateFaqSend">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>
