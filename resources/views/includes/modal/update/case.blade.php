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
                        <div class="col-12 overflow-auto" style="max-height: 50vh">
                            <p class="text-center fw-bold fs-6">個人資料</p>
                            <div class="input-group mb-2">
                                <label for="updateCaseAccount" class="input-group-text">帳號</label>
                                <input name="updateCaseAccount" type="text" id="updateCaseAccount"
                                       class="form-control" placeholder="請輸入個案帳號" disabled>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCasePassword" class="input-group-text required">密碼</label>
                                <input name="updateCasePassword" type="password" id="updateCasePassword"
                                       class="form-control" placeholder="請輸入個案密碼">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseTransplantNum" class="input-group-text required">移植編號</label>
                                <input name="updateCaseTransplantNum" type="text" id="updateCaseTransplantNum"
                                       class="form-control" placeholder="請輸入個案移植編號">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseName" class="input-group-text required">姓名</label>
                                <input name="updateCaseName" type="text" id="updateCaseName"
                                       class="form-control" placeholder="請輸入個案姓名">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseGender" class="input-group-text required">性別</label>
                                <select name="updateCaseGender" id="updateCaseGender" class="form-select">
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}">
                                            {{$gender->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseBirth" class="input-group-text required">生日</label>
                                <input name="updateCaseBirth" id="updateCaseBirth" type="date" class="form-control">
                            </div>

                            <div class="input-group mb-2">
                                <label for="updateCaseHometown" class="input-group-text required">籍貫</label>
                                <select name="hometown_id" id="updateCaseHometown" class="form-select">
                                    @foreach($hometowns as $hometown)
                                        <option value="{{$hometown->id}}"
                                            {{ old("hometown_id") == $hometown->id ? "selected":"" }}>
                                            {{$hometown->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="updateCaseHometownOther" class="input-group-text">其他</label>
                                <input name="hometown_other" type="text" id="updateCaseHometownOther"
                                       class="form-control" placeholder="其他籍貫" value="{{old('hometown_other')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseEducation" class="input-group-text required">教育程度</label>
                                <select name="education_id" id="updateCaseEducation" class="form-select">
                                    @foreach($educations as $education)
                                        <option value="{{$education->id}}"
                                            {{ old("education_id") == $education->id ? "selected":"" }}>
                                            {{$education->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseMarriage" class="input-group-text required">婚姻狀況</label>
                                <select name="marriage_id" id="updateCaseMarriage" class="form-select">
                                    @foreach($marriages as $marriage)
                                        <option value="{{$marriage->id}}"
                                            {{ old("marriage_id") == $marriage->id ? "selected":"" }}>
                                            {{$marriage->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseReligion" class="input-group-text required">宗教信仰</label>
                                <select name="religion_id" id="updateCaseReligion" class="form-select">
                                    @foreach($religions as $religion)
                                        <option value="{{$religion->id}}"
                                            {{ old("religion_id") == $religion->id ? "selected":"" }}>
                                            {{$religion->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="updateCaseReligionOther" class="input-group-text">其他</label>
                                <input name="religion_other" type="text" id="updateCaseReligionOther"
                                       class="form-control" placeholder="其他宗教" value="{{old('religion_other')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseProfession" class="input-group-text required">職業</label>
                                <select name="profession_id" id="updateCaseProfession" class="form-select">
                                    @foreach($professions as $profession)
                                        <option value="{{$profession->id}}"
                                            {{ old("profession_id") == $profession->id ? "selected":"" }}>
                                            {{$profession->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="updateCaseProfessionDetail" class="input-group-text d-block">
                                    職業細項
                                    <br>
                                    <span class="text-danger">（有職業才填）</span>
                                </label>
                                <select name="profession_detail_id" id="updateCaseProfessionDetail" class="form-select">
                                    @foreach($profession_details as $profession_detail)
                                        <option value="{{$profession_detail->id}}"
                                            {{ old("profession_detail_id") == $profession_detail->id ? "selected":"" }}>
                                            {{$profession_detail->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseIncome" class="input-group-text required">每個月家中總收入</label>
                                <select name="income_id" id="updateCaseIncome" class="form-select">
                                    @foreach($incomes as $income)
                                        <option value="{{$income->id}}"
                                            {{ old("income_id") == $income->id ? "selected":"" }}>
                                            {{$income->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseSource" class="input-group-text required">收入來自於多少人</label>
                                <select name="source_id" id="updateCaseSource" class="form-select">
                                    @foreach($sources as $source)
                                        <option value="{{$source->id}}"
                                            {{ old("source_id") == $source->id ? "selected":"" }}>
                                            {{$source->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <p class="text-center fw-bold fs-6">疾病特性</p>
                            <div class="input-group mb-2">
                                <label for="updateCaseDiagnosed" class="input-group-text required">確診日期</label>
                                <input name="diagnosed" id="updateCaseDiagnosed" type="date" class="form-control"
                                       value="{{old('diagnosed')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseDate" class="input-group-text required">移植日期</label>
                                <input name="updateCaseDate" id="updateCaseDate" type="date" class="form-control">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseTransplantType" class="input-group-text required">移植種類</label>
                                <select name="updateCaseTransplantType" id="updateCaseTransplantType"
                                        class="form-select">
                                    @foreach($transplant_types as $transplant_type)
                                        <option value="{{$transplant_type->id}}">
                                            {{$transplant_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="updateCaseTransplantTypeOther" class="input-group-text">其他</label>
                                <input name="transplant_type_other" type="text" id="updateCaseTransplantTypeOther"
                                       class="form-control" placeholder="其他" value="{{old('transplant_type_other')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseDiseaseType" class="input-group-text required">疾病種類</label>
                                <select name="updateCaseDiseaseType" id="updateCaseDiseaseType"
                                        class="form-select form-select">
                                    @foreach($disease_types as $disease_type)
                                        <option value="{{$disease_type->id}}">
                                            {{$disease_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="updateCaseDiseaseTypeOther" class="input-group-text">其他</label>
                                <input name="disease_type_other" type="text" id="updateCaseDiseaseTypeOther"
                                       class="form-control" placeholder="其他" value="{{old('disease_type_other')}}">
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
                <div class="modal-footer justify-content-between">
                    <div>
                        <p class="mb-0"><span class="text-danger">*</span>欄位為必要項目</p>
                    </div>
                    <div>
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
                </div>
            </form>
        </div>
    </div>
</div>
