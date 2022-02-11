<div class="modal fade" tabindex="-1" id="createFaqModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增 Q&A</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12">
                        <form action="#" id="createFaqForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-2">
                                <label for="selectFaqType" class="input-group-text">類型</label>
                                <select name="selectFaqType" id="selectFaqType" class="form-select">
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
                                <label for="createFaqTitle" class="input-group-text">問題</label>
                                <input name="createFaqTitle" id="createFaqTitle" type="text"
                                       class="form-control" placeholder="請輸入問題內容">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createFaqContent" class="input-group-text">回答</label>
                                <textarea name="createFaqContent" id="createFaqContent"
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
                <button type="button" class="btn btn-primary" id="createFaqSend">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>
