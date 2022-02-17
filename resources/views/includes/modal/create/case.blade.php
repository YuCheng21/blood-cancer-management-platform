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
                        <form action="{{route('cases.store')}}" id="createCaseForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-2">
                                <label for="createCaseAccount" class="input-group-text">帳號</label>
                                <input name="createCaseAccount" type="text" id="createCaseAccount"
                                       class="form-control" placeholder="請輸入個案帳號" value="{{old('createCaseAccount')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCasePassword" class="input-group-text">密碼</label>
                                <input name="createCasePassword" type="password" id="createCasePassword"
                                       class="form-control" placeholder="請輸入個案密碼" value="{{old('createCasePassword')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseTransplantNum" class="input-group-text">移植編號</label>
                                <input name="createCaseTransplantNum" type="text" id="createCaseTransplantNum"
                                       class="form-control" placeholder="請輸入個案移植編號" value="{{old('createCaseTransplantNum')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseName" class="input-group-text">姓名</label>
                                <input name="createCaseName" type="text" id="createCaseName"
                                       class="form-control" placeholder="請輸入個案姓名" value="{{old('createCaseName')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseGender" class="input-group-text">性別</label>
                                <select name="createCaseGender" id="createCaseGender" class="form-select">
                                    <option value="1" {{ old("createCaseGender") == 1 ? "selected":"" }}>請選擇個案性別</option>
                                    <option value="2" {{ old("createCaseGender") == 2 ? "selected":"" }}>男性</option>
                                    <option value="3" {{ old("createCaseGender") == 3 ? "selected":"" }}>女性</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseBirth" class="input-group-text">生日</label>
                                <input name="createCaseBirth" id="createCaseBirth" type="date" class="form-control" value="{{old('createCaseBirth')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDate" class="input-group-text">移植日期</label>
                                <input name="createCaseDate" id="createCaseDate" type="date" class="form-control" value="{{old('createCaseDate')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseTransplantType" class="input-group-text">移植種類</label>
                                <select name="createCaseTransplantType" id="createCaseTransplantType"
                                        class="form-select">
                                    <option value="1" {{ old("createCaseTransplantType") == 1 ? "selected":"" }}>請選擇移植種類</option>
                                    <option value="2" {{ old("createCaseTransplantType") == 2 ? "selected":"" }}>自體移植</option>
                                    <option value="3" {{ old("createCaseTransplantType") == 3 ? "selected":"" }}>異體移植</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDiseaseType" class="input-group-text">疾病種類</label>
                                <select name="createCaseDiseaseType" id="createCaseDiseaseType" class="form-select form-select">
                                    <option value="1" {{ old("createCaseDiseaseType") == 1 ? "selected":"" }}>請選擇疾病種類</option>
                                    <option value="2" {{ old("createCaseDiseaseType") == 2 ? "selected":"" }}>AML</option>
                                    <option value="3" {{ old("createCaseDiseaseType") == 3 ? "selected":"" }}>ALL</option>
                                    <option value="4" {{ old("createCaseDiseaseType") == 4 ? "selected":"" }}>MM</option>
                                    <option value="5" {{ old("createCaseDiseaseType") == 5 ? "selected":"" }}>何杰金氏淋巴癌</option>
                                    <option value="6" {{ old("createCaseDiseaseType") == 6 ? "selected":"" }}>非何杰金氏淋巴癌</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDiseaseState" class="input-group-text">疾病分期</label>
                                <select name="createCaseDiseaseState" id="createCaseDiseaseState" class="form-select form-select">
                                    <option value="1" {{ old("createCaseDiseaseState") == 1 ? "selected":"" }}>無</option>
                                    <option value="2" {{ old("createCaseDiseaseState") == 2 ? "selected":"" }}>第一期</option>
                                    <option value="3" {{ old("createCaseDiseaseState") == 3 ? "selected":"" }}>第二期</option>
                                    <option value="4" {{ old("createCaseDiseaseState") == 4 ? "selected":"" }}>第三期</option>
                                    <option value="5" {{ old("createCaseDiseaseState") == 5 ? "selected":"" }}>第四期</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDiseaseClass" class="input-group-text">疾病分類</label>
                                <select name="createCaseDiseaseClass" id="createCaseDiseaseClass" class="form-select form-select">
                                    <option value="1" {{ old("createCaseDiseaseClass") == 1 ? "selected":"" }}>無</option>
                                    <option value="2" {{ old("createCaseDiseaseClass") == 2 ? "selected":"" }}>B-cell</option>
                                    <option value="3" {{ old("createCaseDiseaseClass") == 3 ? "selected":"" }}>T-cell</option>
                                    <option value="4" {{ old("createCaseDiseaseClass") == 4 ? "selected":"" }}>Mantle-cell</option>
                                    <option value="5" {{ old("createCaseDiseaseClass") == 5 ? "selected":"" }}>邊緣 B-cell</option>
                                    <option value="6" {{ old("createCaseDiseaseClass") == 6 ? "selected":"" }}>其他型</option>
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
                <a href="{{route('cases.store')}}" class="btn btn-primary" id="createCaseSend"
                        onclick="event.preventDefault();$('#createCaseForm').submit();">
                    <span class="iconify-inline" data-icon="subway:tick"></span>
                    <span>確認</span>
                </a>
            </div>
        </div>
    </div>
</div>
