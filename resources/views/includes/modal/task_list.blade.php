<div class="modal fade" tabindex="-1" id="taskListModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="jam:task-list-f"></span>
                    <span>任務清單</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12 overflow-auto" style="max-height: 50vh">
                        <form action="#" id="taskListForm" method="POST" enctype="multipart/form-data">
                            <div class="accordion">
                                @foreach ($categories as $key_category => $value_category)
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#group{{$key_category}}">
                                            類別 {{$key_category}}
                                        </button>
                                    </h2>
                                    <div id="group{{$key_category}}" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            @foreach ($value_category as $key_task => $value_task)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="taskList"
                                                           id="group{{$key_category}}{{$key_task}}00">
                                                    <label class="form-check-label" for="group{{$key_category}}{{$key_task}}00">{{$key_category}}-{{$key_task}}-{{$value_task->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
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
                <button type="button" class="btn btn-primary" id="taskListSend">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>
