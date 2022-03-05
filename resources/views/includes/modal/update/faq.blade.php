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
                            @csrf
                            @method('patch')
                            <div class="input-group mb-2">
                                <label for="updateFaqType" class="input-group-text">類型</label>
                                <select name="updateFaqType" id="updateFaqType" class="form-select">
                                    <option value="0" selected>請選擇問題類型</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->category_1}}">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
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
                <a href="#" class="btn btn-primary" id="updateFaqSend"
                   onclick="event.preventDefault();$('#updateFaqForm').submit();">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </a>
            </div>
        </div>
    </div>
</div>
