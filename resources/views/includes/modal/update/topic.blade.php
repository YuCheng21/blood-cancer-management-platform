<div class="modal fade" tabindex="-1" id="updateTopicModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="fa-solid:tools"></span>
                    <span>修改題目</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12 overflow-auto" style="max-height: 70vh">
                        <form action="#" id="updateTopicForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-2">
                                <label for="updateSelectTopicType" class="input-group-text">課程</label>
                                <select name="updateSelectTopicType" id="updateSelectTopicType" class="form-select">
                                    <option value="0" selected>請選擇內容</option>
                                    <option value="1">課程1</option>
                                    <option value="2">課程2</option>
                                    <option value="3">課程3</option>
                                    <option value="4">課程4</option>
                                    <option value="5">課程5</option>
                                    <option value="6">課程6</option>
                                    <option value="7">課程7</option>
                                    <option value="8">課程8</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateTopicTitle" class="input-group-text">題目</label>
                                <textarea name="updateTopicTitle" id="updateTopicTitle"
                                          class="form-control" placeholder="請輸入回答內容" rows="3"></textarea>
                            </div>
                            <div class="btn-group w-100">
                                <input type="radio" class="btn-check" name="questionType" id="updateTfqType"
                                       autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="updateTfqType">是非題</label>

                                <input type="radio" class="btn-check" name="questionType" id="updateMcqType"
                                       autocomplete="off">
                                <label class="btn btn-outline-primary" for="updateMcqType">選擇題</label>
                            </div>
                            <div id="updateTfqBlock">
                                <hr>
                                <p class="text-center fs-5">是非題</p>
                                <div class="btn-group w-100">
                                    <input type="radio" class="btn-check" name="answer" id="updateTrue">
                                    <label class="btn btn-outline-primary" for="updateTrue">是</label>

                                    <input type="radio" class="btn-check" name="answer" id="updateFalse">
                                    <label class="btn btn-outline-primary" for="updateFalse">否</label>
                                </div>
                            </div>
                            <div id="updateMcqBlock">
                                <hr>
                                <p class="text-center fs-5">選擇題</p>
                                <div class="input-group mb-2">
                                    <label for="updateupdateItemContent1" class="input-group-text">
                                        <input class="form-check-input mt-0 me-2" type="radio" name="answer">
                                        <span>A</span>
                                    </label>
                                    <input name="updateupdateItemContent1" id="updateupdateItemContent1" type="text"
                                           class="form-control" placeholder="請輸入選項內容">
                                </div>
                                <div class="input-group mb-2">
                                    <label for="updateItemContent2" class="input-group-text">
                                        <input class="form-check-input mt-0 me-2" type="radio" name="answer">
                                        <span>B</span>
                                    </label>
                                    <input name="updateItemContent2" id="updateItemContent2" type="text"
                                           class="form-control" placeholder="請輸入選項內容">
                                </div>
                                <div class="input-group mb-2">
                                    <label for="updateItemContent3" class="input-group-text">
                                        <input class="form-check-input mt-0 me-2" type="radio" name="answer">
                                        <span>C</span>
                                    </label>
                                    <input name="updateItemContent3" id="updateItemContent3" type="text"
                                           class="form-control" placeholder="請輸入選項內容">
                                </div>
                                <div class="input-group mb-2">
                                    <label for="updateItemContent4" class="input-group-text">
                                        <input class="form-check-input mt-0 me-2" type="radio" name="answer">
                                        <span>D</span>
                                    </label>
                                    <input name="updateItemContent4" id="updateItemContent4" type="text"
                                           class="form-control" placeholder="請輸入選項內容">
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
                <button type="button" class="btn btn-primary" id="updateTopicSend">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#updateMcqBlock').hide();
    $('#updateTfqType').click(function (){
        $('#updateMcqBlock').slideUp(300, 'swing');
        $('#updateTfqBlock').slideDown(300, 'swing');
    })
    $('#updateMcqType').click(function (){
        $('#updateMcqBlock').slideDown(300, 'swing');
        $('#updateTfqBlock').slideUp(300, 'swing');
    })
</script>
