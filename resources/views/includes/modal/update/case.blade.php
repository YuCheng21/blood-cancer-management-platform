<div class="modal fade" tabindex="-1" id="updateCaseModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-opacity-50">
                <h5 class="modal-title fw-bold fs-4">
                    <span class="iconify-inline" data-icon="fa-solid:tools"></span>
                    <span>修改個案</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" id="updateCaseForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="row gy-2">
                        <div class="col-12">
                            <div class="input-group mb-2">
                                <label for="updateCaseAccount" class="input-group-text">帳號</label>
                                <input name="updateCaseAccount" type="text" id="updateCaseAccount"
                                       class="form-control" placeholder="請輸入個案帳號" disabled>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCasePassword" class="input-group-text">密碼</label>
                                <input name="updateCasePassword" type="password" id="updateCasePassword"
                                       class="form-control" placeholder="請輸入個案密碼">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseTransplantNum" class="input-group-text">移植編號</label>
                                <input name="updateCaseTransplantNum" type="text" id="updateCaseTransplantNum"
                                       class="form-control" placeholder="請輸入個案移植編號">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseName" class="input-group-text">姓名</label>
                                <input name="updateCaseName" type="text" id="updateCaseName"
                                       class="form-control" placeholder="請輸入個案姓名">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseGender" class="input-group-text">性別</label>
                                <select name="updateCaseGender" id="updateCaseGender" class="form-select">
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}">
                                            {{$gender->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseBirth" class="input-group-text">生日</label>
                                <input name="updateCaseBirth" id="updateCaseBirth" type="date" class="form-control">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseDate" class="input-group-text">移植日期</label>
                                <input name="updateCaseDate" id="updateCaseDate" type="date" class="form-control">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseTransplantType" class="input-group-text">移植種類</label>
                                <select name="updateCaseTransplantType" id="updateCaseTransplantType"
                                        class="form-select">
                                    @foreach($transplant_types as $transplant_type)
                                        <option value="{{$transplant_type->id}}">
                                            {{$transplant_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseDiseaseType" class="input-group-text">疾病種類</label>
                                <select name="updateCaseDiseaseType" id="updateCaseDiseaseType"
                                        class="form-select form-select">
                                    @foreach($disease_types as $disease_type)
                                        <option value="{{$disease_type->id}}">
                                            {{$disease_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseDiseaseState" class="input-group-text">疾病分期</label>
                                <select name="updateCaseDiseaseState" id="updateCaseDiseaseState"
                                        class="form-select form-select">
                                    @foreach($disease_states as $disease_state)
                                        <option value="{{$disease_state->id}}">
                                            {{$disease_state->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseDiseaseClass" class="input-group-text">疾病分類</label>
                                <select name="updateCaseDiseaseClass" id="updateCaseDiseaseClass"
                                        class="form-select form-select">
                                    @foreach($disease_classes as $disease_class)
                                        <option value="{{$disease_class->id}}">
                                            {{$disease_class->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <span class="iconify-inline" data-icon="websymbol:cancel"></span>
                        <span>關閉</span>
                    </button>
                    <a href="#" class="btn btn-primary" id="updateCaseSend"
                       onclick="event.preventDefault();this.closest('form').submit();">
                        <span class="iconify-inline" data-icon="subway:tick"></span>
                        <span>確認</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
