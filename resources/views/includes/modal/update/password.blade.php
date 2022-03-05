<div class="modal fade" tabindex="-1" id="updatePasswordModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="fa-solid:tools"></span>
                    <span>修改密碼</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12">
                        <form action="{{ route('users.update') }}"
                              id="updatePasswordForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="input-group mb-2">
                                <label for="oldPassword" class="input-group-text fs-5">舊密碼</label>
                                <input name="oldPassword" type="password" id="oldPassword"
                                       class="form-control form-control-lg"
                                       placeholder="請輸入舊密碼">
                            </div>
                            <div class="input-group mb-2">
                                <label for="password" class="input-group-text fs-5">新密碼</label>
                                <input name="password" type="password" id="password"
                                       class="form-control form-control-lg"
                                       placeholder="請輸入新密碼">
                            </div>
                            <div class="input-group">
                                <label for="passwordConfirm" class="input-group-text fs-5">確認密碼</label>
                                <input name="passwordConfirm" type="password" id="passwordConfirm"
                                       class="form-control passwordConfirm form-control-lg"
                                       placeholder="請輸入確認密碼">
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
                <a href="{{ route('users.update') }}"
                   class="btn btn-primary" id="updatePasswordSend"
                   onclick="event.preventDefault();$('#updatePasswordForm').submit()">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </a>
            </div>
        </div>
    </div>
</div>

