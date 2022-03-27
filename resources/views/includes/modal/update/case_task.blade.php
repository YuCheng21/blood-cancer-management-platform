<div class="modal fade" tabindex="-1" id="updateCaseTaskModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="akar-icons:info-fill"></span>
                    <span>提醒</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12 text-center">
                        <p>確定要修改個案任務嗎？</p>
                        <p class="alert alert-primary py-1 fw-bold">※此操作將重製原先的任務進度※</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="confirm" id="confirm">
                    <label class="form-check-label" for="confirm">我確認修改個案任務</label>
                </div>
                <div>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span class="iconify-inline" data-icon="websymbol:cancel"></span>
                        <span>關閉</span>
                    </button>
                    <button type="button" class="btn btn-primary" id="updateCaseTaskSend" disabled>
                        <span class="iconify-inline" data-icon="subway:tick"></span>
                        <span>確認</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
