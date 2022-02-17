<div class="modal fade" tabindex="-1" id="deleteCaseModal">
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
                    <div class="col-12">
                        <span>確定要刪除該項目嗎？</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <span class="iconify-inline" data-icon="websymbol:cancel"></span>
                    <span>關閉</span>
                </button>
                <form method="POST" id="deleteCaseForm" action="#">
                    @csrf
                    @method('delete')
                    <a href="#" class="btn btn-primary" id="deleteCaseSend"
                       onclick="event.preventDefault();this.closest('form').submit();">
                        <span class="iconify-inline" data-icon="subway:tick"></span>
                        <span>確認</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
