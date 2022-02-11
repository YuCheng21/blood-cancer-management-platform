<div class="modal fade" tabindex="-1" id="createTopicModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增題目</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12 overflow-auto" style="max-height: 70vh">
                        <form action="#" id="createTopicForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-2">
                                <label for="createSelectTopicType" class="input-group-text">課程</label>
                                <select name="createSelectTopicType" id="createSelectTopicType" class="form-select">
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
                                <label for="createTopicTitle" class="input-group-text">題目</label>
                                <textarea name="createTopicTitle" id="createTopicTitle"
                                          class="form-control" placeholder="請輸入回答內容" rows="3"></textarea>
                            </div>
                            <div class="btn-group w-100">
                                <input type="radio" class="btn-check" name="questionType" id="createTfqType"
                                       autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="createTfqType">是非題</label>

                                <input type="radio" class="btn-check" name="questionType" id="createMcqType"
                                       autocomplete="off">
                                <label class="btn btn-outline-primary" for="createMcqType">選擇題</label>
                            </div>
                            <div id="createTfqBlock">
                                <hr>
                                <p class="text-center fs-5">是非題</p>
                                <div class="btn-group w-100">
                                    <input type="radio" class="btn-check" name="answer" id="createTrue">
                                    <label class="btn btn-outline-primary" for="createTrue">是</label>

                                    <input type="radio" class="btn-check" name="answer" id="createFalse">
                                    <label class="btn btn-outline-primary" for="createFalse">否</label>
                                </div>
                            </div>
                            <div id="createMcqBlock">
                                <hr>
                                <p class="text-center fs-5">選擇題</p>
                                <div class="input-group mb-2">
                                    <label for="createItemContent1" class="input-group-text">
                                        <input class="form-check-input mt-0 me-2" type="radio" name="answer">
                                        <span>A</span>
                                    </label>
                                    <input name="createItemContent1" id="createItemContent1" type="text"
                                           class="form-control" placeholder="請輸入選項內容">
                                </div>
                                <div class="input-group mb-2">
                                    <label for="createItemContent2" class="input-group-text">
                                        <input class="form-check-input mt-0 me-2" type="radio" name="answer">
                                        <span>B</span>
                                    </label>
                                    <input name="createItemContent2" id="createItemContent2" type="text"
                                           class="form-control" placeholder="請輸入選項內容">
                                </div>
                                <div class="input-group mb-2">
                                    <label for="createItemContent3" class="input-group-text">
                                        <input class="form-check-input mt-0 me-2" type="radio" name="answer">
                                        <span>C</span>
                                    </label>
                                    <input name="createItemContent3" id="createItemContent3" type="text"
                                           class="form-control" placeholder="請輸入選項內容">
                                </div>
                                <div class="input-group mb-2">
                                    <label for="createItemContent4" class="input-group-text">
                                        <input class="form-check-input mt-0 me-2" type="radio" name="answer">
                                        <span>D</span>
                                    </label>
                                    <input name="createItemContent4" id="createItemContent4" type="text"
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
                <button type="button" class="btn btn-primary" id="createTopicSend">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#createMcqBlock').hide();
    $('#createTfqType').click(function (){
        $('#createMcqBlock').slideUp(300, 'swing');
        $('#createTfqBlock').slideDown(300, 'swing');
    })
    $('#createMcqType').click(function (){
        $('#createMcqBlock').slideDown(300, 'swing');
        $('#createTfqBlock').slideUp(300, 'swing');
    })
</script>
