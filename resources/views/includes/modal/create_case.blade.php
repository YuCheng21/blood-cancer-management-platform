<div class="modal fade" tabindex="-1" id="createCaseModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="carbon:add-filled"></span>
                    <span>新增個案</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-2">
                    <div class="col-12">
                        <form action="#" id="createCaseForm" method="POST" enctype="multipart/form-data">
                            <div class="input-group mb-2">
                                <label for="caseAccount" class="input-group-text">帳號</label>
                                <input name="caseAccount" type="text" id="caseAccount"
                                       class="form-control" placeholder="請輸入個案帳號">
                            </div>
                            <div class="input-group mb-2">
                                <label for="casePassword" class="input-group-text">密碼</label>
                                <input name="casePassword" type="password" id="casePassword"
                                       class="form-control" placeholder="請輸入個案密碼">
                            </div>
                            <div class="input-group mb-2">
                                <label for="caseTransplantNum" class="input-group-text">移植編號</label>
                                <input name="caseTransplantNum" type="text" id="caseTransplantNum"
                                       class="form-control" placeholder="請輸入個案移植編號">
                            </div>
                            <div class="input-group mb-2">
                                <label for="caseName" class="input-group-text">姓名</label>
                                <input name="caseName" type="text" id="caseName"
                                       class="form-control" placeholder="請輸入個案姓名">
                            </div>
                            <div class="input-group mb-2">
                                <label for="caseGender" class="input-group-text">性別</label>
                                <select name="caseGender" id="caseGender" class="form-select">
                                    <option value="0" selected>請選擇個案性別</option>
                                    <option value="1">男性</option>
                                    <option value="2">女性</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="caseBirth" class="input-group-text">生日</label>
                                <input name="caseBirth" id="caseBirth" type="date" class="form-control">
                            </div>
                            <div class="input-group mb-2">
                                <label for="caseAccount" class="input-group-text">移植日期</label>
                                <input id="date" type="date" class="form-control" name="test">
                            </div>
                            <div class="input-group mb-2">
                                <label for="caseTransplantType" class="input-group-text">移植種類</label>
                                <select name="caseTransplantType" id="caseTransplantType"
                                        class="form-select">
                                    <option value="0" selected>請選擇移植種類</option>
                                    <option value="1">自體移植</option>
                                    <option value="2">異體移植</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="caseDiseaseType" class="input-group-text">疾病種類</label>
                                <select name="caseDiseaseType" id="caseDiseaseType" class="form-select form-select">
                                    <option value="0" selected>請選擇疾病種類</option>
                                    <option value="1">AML</option>
                                    <option value="2">ALL</option>
                                    <option value="3">MM</option>
                                    <option value="4">何杰金氏淋巴癌</option>
                                    <option value="5">非何杰金氏淋巴癌</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="caseDiseaseState" class="input-group-text">疾病分期</label>
                                <select name="caseDiseaseState" id="caseDiseaseState" class="form-select form-select">
                                    <option value="0" selected>無</option>
                                    <option value="1">第一期</option>
                                    <option value="2">第二期</option>
                                    <option value="3">第三期</option>
                                    <option value="4">第四期</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="caseDiseaseClass" class="input-group-text">疾病分類</label>
                                <select name="caseDiseaseClass" id="caseDiseaseClass" class="form-select form-select">
                                    <option value="0" selected>無</option>
                                    <option value="1">B-cell</option>
                                    <option value="2">T-cell</option>
                                    <option value="3">Mantle-cell</option>
                                    <option value="4">邊緣 B-cell</option>
                                    <option value="5">其他型</option>
                                </select>
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
                <button type="button" class="btn btn-primary" id="createCaseSend">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </button>
            </div>
        </div>
    </div>
</div>
