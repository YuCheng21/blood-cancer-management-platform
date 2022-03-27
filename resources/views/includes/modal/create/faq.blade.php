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
                    <div class="col-12 overflow-auto" style="max-height: 70vh">
                        <form action="{{ route('faqs.store') }}" id="createFaqForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-2">
                                <label for="createFaqType" class="input-group-text"
                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                       title="哪個任務類型的 Q&A">類型</label>
                                <select name="createFaqType" id="createFaqType" class="form-select">
                                    <option value="0" selected>請選擇問題類型</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->category_1}}">
                                            {{$category->short}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createFaqTitle" class="input-group-text">問題</label>
                                <textarea name="createFaqTitle" id="createFaqTitle"
                                          class="form-control" placeholder="請輸入問題內容" rows="3"></textarea>
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
                <button type="button" class="btn btn-primary" id="createFaqSend"
                        onclick="$('#createFaqForm').submit()">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>
