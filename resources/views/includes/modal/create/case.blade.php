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
                        <form action="{{route('cases.store')}}" id="createCaseForm" method="POST"
                              enctype="multipart/form-data">
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
                                       class="form-control" placeholder="請輸入個案移植編號"
                                       value="{{old('createCaseTransplantNum')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseName" class="input-group-text">姓名</label>
                                <input name="createCaseName" type="text" id="createCaseName"
                                       class="form-control" placeholder="請輸入個案姓名" value="{{old('createCaseName')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseGender" class="input-group-text">性別</label>
                                <select name="createCaseGender" id="createCaseGender" class="form-select">
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}"
                                            {{ old("createCaseGender") == $gender->id ? "selected":"" }}>
                                            {{$gender->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseBirth" class="input-group-text">生日</label>
                                <input name="createCaseBirth" id="createCaseBirth" type="date" class="form-control"
                                       value="{{old('createCaseBirth')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDate" class="input-group-text">移植日期</label>
                                <input name="createCaseDate" id="createCaseDate" type="date" class="form-control"
                                       value="{{old('createCaseDate')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseTransplantType" class="input-group-text">移植種類</label>
                                <select name="createCaseTransplantType" id="createCaseTransplantType"
                                        class="form-select">
                                    @foreach($transplant_types as $transplant_type)
                                        <option value="{{$transplant_type->id}}"
                                            {{ old("createCaseTransplantType") == $transplant_type->id ? "selected":"" }}>
                                            {{$transplant_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDiseaseType" class="input-group-text">疾病種類</label>
                                <select name="createCaseDiseaseType" id="createCaseDiseaseType"
                                        class="form-select form-select">
                                    @foreach($disease_types as $disease_type)
                                        <option value="{{$disease_type->id}}"
                                            {{ old("createCaseDiseaseType") == $disease_type->id ? "selected":"" }}>
                                            {{$disease_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDiseaseState" class="input-group-text">疾病分期</label>
                                <select name="createCaseDiseaseState" id="createCaseDiseaseState"
                                        class="form-select form-select">
                                    @foreach($disease_states as $disease_state)
                                        <option value="{{$disease_state->id}}"
                                            {{ old("createCaseDiseaseState") == $disease_state->id ? "selected":"" }}>
                                            {{$disease_state->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDiseaseClass" class="input-group-text">疾病分類</label>
                                <select name="createCaseDiseaseClass" id="createCaseDiseaseClass"
                                        class="form-select form-select">
                                    @foreach($disease_classes as $disease_class)
                                        <option value="{{$disease_class->id}}"
                                            {{ old("createCaseDiseaseClass") == $disease_class->id ? "selected":"" }}>
                                            {{$disease_class->name}}
                                        </option>
                                    @endforeach
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
