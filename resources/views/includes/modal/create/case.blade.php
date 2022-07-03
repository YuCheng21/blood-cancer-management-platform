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
                    <div class="col-12 overflow-auto" style="max-height: 50vh">
                        <form action="{{route('cases.store')}}" id="createCaseForm" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <p class="text-center fw-bold fs-6">個人資料</p>
                            <div class="input-group mb-2">
                                <label for="createCaseAccount" class="input-group-text required">帳號</label>
                                <input name="createCaseAccount" type="text" id="createCaseAccount"
                                       class="form-control" placeholder="請輸入個案帳號" value="{{old('createCaseAccount')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCasePassword" class="input-group-text required">密碼</label>
                                <input name="createCasePassword" type="password" id="createCasePassword"
                                       class="form-control" placeholder="請輸入個案密碼" value="{{old('createCasePassword')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseTransplantNum" class="input-group-text required">移植編號</label>
                                <input name="createCaseTransplantNum" type="text" id="createCaseTransplantNum"
                                       class="form-control" placeholder="請輸入個案移植編號"
                                       value="{{old('createCaseTransplantNum')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseName" class="input-group-text required">姓名</label>
                                <input name="createCaseName" type="text" id="createCaseName"
                                       class="form-control" placeholder="請輸入個案姓名" value="{{old('createCaseName')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseGender" class="input-group-text required">性別</label>
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
                                <label for="createCaseBirth" class="input-group-text required">生日</label>
                                <input name="createCaseBirth" id="createCaseBirth" type="date" class="form-control"
                                       value="{{old('createCaseBirth')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseHometown" class="input-group-text required">籍貫</label>
                                <select name="hometown_id" id="createCaseHometown" class="form-select">
                                    @foreach($hometowns as $hometown)
                                        <option value="{{$hometown->id}}"
                                            {{ old("hometown_id") == $hometown->id ? "selected":"" }}>
                                            {{$hometown->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="createCaseHometownOther" class="input-group-text">其他</label>
                                <input name="hometown_other" type="text" id="createCaseHometownOther"
                                       class="form-control" placeholder="其他籍貫" value="{{old('hometown_other')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseEducation" class="input-group-text required">教育程度</label>
                                <select name="education_id" id="createCaseEducation" class="form-select">
                                    @foreach($educations as $education)
                                        <option value="{{$education->id}}"
                                            {{ old("education_id") == $education->id ? "selected":"" }}>
                                            {{$education->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseMarriage" class="input-group-text required">婚姻狀況</label>
                                <select name="marriage_id" id="createCaseMarriage" class="form-select">
                                    @foreach($marriages as $marriage)
                                        <option value="{{$marriage->id}}"
                                            {{ old("marriage_id") == $marriage->id ? "selected":"" }}>
                                            {{$marriage->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseReligion" class="input-group-text required">宗教信仰</label>
                                <select name="religion_id" id="createCaseReligion" class="form-select">
                                    @foreach($religions as $religion)
                                        <option value="{{$religion->id}}"
                                            {{ old("religion_id") == $religion->id ? "selected":"" }}>
                                            {{$religion->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="createCaseReligionOther" class="input-group-text">其他</label>
                                <input name="religion_other" type="text" id="createCaseReligionOther"
                                       class="form-control" placeholder="其他宗教" value="{{old('religion_other')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseProfession" class="input-group-text required">職業</label>
                                <select name="profession_id" id="createCaseProfession" class="form-select">
                                    @foreach($professions as $profession)
                                        <option value="{{$profession->id}}"
                                            {{ old("profession_id") == $profession->id ? "selected":"" }}>
                                            {{$profession->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="createCaseProfessionDetail" class="input-group-text d-block"
                                       style="font-size: 0.8em">
                                    職業細項
                                    <br>
                                    <span class="text-danger">（有職業才填）</span>
                                </label>
                                <select name="profession_detail_id" id="createCaseProfessionDetail" class="form-select">
                                    @foreach($profession_details as $profession_detail)
                                        <option value="{{$profession_detail->id}}"
                                            {{ old("profession_detail_id") == $profession_detail->id ? "selected":"" }}>
                                            {{$profession_detail->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseIncome" class="input-group-text required">每個月家中總收入</label>
                                <select name="income_id" id="createCaseIncome" class="form-select">
                                    @foreach($incomes as $income)
                                        <option value="{{$income->id}}"
                                            {{ old("income_id") == $income->id ? "selected":"" }}>
                                            {{$income->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseSource" class="input-group-text required">收入來自於多少人</label>
                                <select name="source_id" id="createCaseSource" class="form-select">
                                    @foreach($sources as $source)
                                        <option value="{{$source->id}}"
                                            {{ old("source_id") == $source->id ? "selected":"" }}>
                                            {{$source->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseEndDate" class="input-group-text required">收案日期</label>
                                <input name="end_date" id="createCaseEndDate" type="date" class="form-control"
                                       value="{{old('end_date')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseExperimental" class="input-group-text required">分組</label>
                                <select name="experimental_id" id="createCaseExperimental" class="form-select">
                                    @foreach($experimental as $experiment)
                                        <option value="{{$experiment->id}}"
                                            {{ old("experimental_id") == $experiment->id ? "selected":"" }}>
                                            {{$experiment->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <p class="text-center fw-bold fs-6">疾病特性</p>
                            <div class="input-group mb-2">
                                <label for="createCaseDiagnosed" class="input-group-text required">確診日期</label>
                                <input name="diagnosed" id="createCaseDiagnosed" type="date" class="form-control"
                                       value="{{old('diagnosed')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDate" class="input-group-text required">移植日期</label>
                                <input name="createCaseDate" id="createCaseDate" type="date" class="form-control"
                                       value="{{old('createCaseDate')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseTransplantType" class="input-group-text required">移植種類</label>
                                <select name="createCaseTransplantType" id="createCaseTransplantType"
                                        class="form-select">
                                    @foreach($transplant_types as $transplant_type)
                                        <option value="{{$transplant_type->id}}"
                                            {{ old("createCaseTransplantType") == $transplant_type->id ? "selected":"" }}>
                                            {{$transplant_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="createCaseTransplantTypeOther" class="input-group-text">其他</label>
                                <input name="transplant_type_other" type="text" id="createCaseTransplantTypeOther"
                                       class="form-control" placeholder="其他" value="{{old('transplant_type_other')}}">
                            </div>

                            <div class="input-group mb-2">
                                <label for="createCaseHlaType" class="input-group-text required">異體移植 HLA type</label>
                                <select name="hla_type_id" id="createCaseHlaType" class="form-select">
                                    @foreach($hla_types as $hla_type)
                                        <option value="{{$hla_type->id}}"
                                            {{ old("hla_type_id") == $hla_type->id ? "selected":"" }}>
                                            {{$hla_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="text-center fw-bold fs-6">病人HLA</p>
                            <div class="input-group mb-2">
                                <label for="createCasePatientHlaA1" class="input-group-text">A1</label>
                                <input name="patient_hla_a1" type="text" id="createCasePatientHlaA1"
                                       class="form-control" value="{{old('patient_hla_a1')}}">
                                <label for="createCasePatientHlaA2" class="input-group-text">A2</label>
                                <input name="patient_hla_a2" type="text" id="createCasePatientHlaA2"
                                       class="form-control" value="{{old('patient_hla_a2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCasePatientHlaB1" class="input-group-text">B1</label>
                                <input name="patient_hla_b1" type="text" id="createCasePatientHlaB1"
                                       class="form-control" value="{{old('patient_hla_b1')}}">
                                <label for="createCasePatientHlaB2" class="input-group-text">B2</label>
                                <input name="patient_hla_b2" type="text" id="createCasePatientHlaB2"
                                       class="form-control" value="{{old('patient_hla_b2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCasePatientHlaC1" class="input-group-text">C1</label>
                                <input name="patient_hla_c1" type="text" id="createCasePatientHlaC1"
                                       class="form-control" value="{{old('patient_hla_c1')}}">
                                <label for="createCasePatientHlaC2" class="input-group-text">C2</label>
                                <input name="patient_hla_c2" type="text" id="createCasePatientHlaC2"
                                       class="form-control" value="{{old('patient_hla_c2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCasePatientHlaDR1" class="input-group-text">DR1</label>
                                <input name="patient_hla_dr1" type="text" id="createCasePatientHlaDR1"
                                       class="form-control" value="{{old('patient_hla_dr1')}}">
                                <label for="createCasePatientHlaDR2" class="input-group-text">DR2</label>
                                <input name="patient_hla_dr2" type="text" id="createCasePatientHlaDR2"
                                       class="form-control" value="{{old('patient_hla_dr2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCasePatientHlaDQ1" class="input-group-text">DQ1</label>
                                <input name="patient_hla_dq1" type="text" id="createCasePatientHlaDQ1"
                                       class="form-control" value="{{old('patient_hla_dq1')}}">
                                <label for="createCasePatientHlaDQ2" class="input-group-text">DQ2</label>
                                <input name="patient_hla_dq2" type="text" id="createCasePatientHlaDQ2"
                                       class="form-control" value="{{old('patient_hla_dq2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCasePatientHlaMatch" class="input-group-text">Match</label>
                                <input name="patient_hla_match" type="text" id="createCasePatientHlaMatch"
                                       class="form-control" value="{{old('patient_hla_match')}}">
                                <label class="input-group-text">/10</label>
                            </div>
                            <hr>
                            <p class="text-center fw-bold fs-6">捐贈者HLA</p>
                            <div class="input-group mb-2">
                                <label for="createCaseDonorHlaA1" class="input-group-text">A1</label>
                                <input name="donor_hla_a1" type="text" id="createCaseDonorHlaA1"
                                       class="form-control" value="{{old('donor_hla_a1')}}">
                                <label for="createCaseDonorHlaA2" class="input-group-text">A2</label>
                                <input name="donor_hla_a2" type="text" id="createCaseDonorHlaA2"
                                       class="form-control" value="{{old('donor_hla_a2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDonorHlaB1" class="input-group-text">B1</label>
                                <input name="donor_hla_b1" type="text" id="createCaseDonorHlaB1"
                                       class="form-control" value="{{old('donor_hla_b1')}}">
                                <label for="createCaseDonorHlaB2" class="input-group-text">B2</label>
                                <input name="donor_hla_b2" type="text" id="createCaseDonorHlaB2"
                                       class="form-control" value="{{old('donor_hla_b2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDonorHlaC1" class="input-group-text">C1</label>
                                <input name="donor_hla_c1" type="text" id="createCaseDonorHlaC1"
                                       class="form-control" value="{{old('donor_hla_c1')}}">
                                <label for="createCaseDonorHlaC2" class="input-group-text">C2</label>
                                <input name="donor_hla_c2" type="text" id="createCaseDonorHlaC2"
                                       class="form-control" value="{{old('donor_hla_c2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDonorHlaDR1" class="input-group-text">DR1</label>
                                <input name="donor_hla_dr1" type="text" id="createCaseDonorHlaDR1"
                                       class="form-control" value="{{old('donor_hla_dr1')}}">
                                <label for="createCaseDonorHlaDR2" class="input-group-text">DR2</label>
                                <input name="donor_hla_dr2" type="text" id="createCaseDonorHlaDR2"
                                       class="form-control" value="{{old('donor_hla_dr2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDonorHlaDQ1" class="input-group-text">DQ1</label>
                                <input name="donor_hla_dq1" type="text" id="createCaseDonorHlaDQ1"
                                       class="form-control" value="{{old('donor_hla_dq1')}}">
                                <label for="createCaseDonorHlaDQ2" class="input-group-text">DQ2</label>
                                <input name="donor_hla_dq2" type="text" id="createCaseDonorHlaDQ2"
                                       class="form-control" value="{{old('donor_hla_dq2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDonorHlaMatch" class="input-group-text">Match</label>
                                <input name="donor_hla_match" type="text" id="createCaseDonorHlaMatch"
                                       class="form-control" value="{{old('donor_hla_match')}}">
                                <label class="input-group-text">/10</label>
                            </div>
                            <hr>
                            <div class="input-group mb-2">
                                <label for="createCaseDiseaseType" class="input-group-text required">疾病種類</label>
                                <select name="createCaseDiseaseType" id="createCaseDiseaseType"
                                        class="form-select form-select">
                                    @foreach($disease_types as $disease_type)
                                        <option value="{{$disease_type->id}}"
                                            {{ old("createCaseDiseaseType") == $disease_type->id ? "selected":"" }}>
                                            {{$disease_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <label for="createCaseDiseaseTypeOther" class="input-group-text">其他</label>
                                <input name="disease_type_other" type="text" id="createCaseDiseaseTypeOther"
                                       class="form-control" placeholder="其他" value="{{old('disease_type_other')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDiseaseState" class="input-group-text"
                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                       title="若無需選擇則選取「未選擇」">疾病分期</label>
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
                                <label for="createCaseDiseaseClass" class="input-group-text"
                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                       title="若無需選擇則選取「未選擇」">疾病分類</label>
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

                            <div class="input-group mb-2">
                                <label for="createCaseTransplantState" class="input-group-text">移植時的疾病狀態</label>
                                <select name="transplant_state_id" id="createCaseTransplantState" class="form-select">
                                    @foreach($transplant_states as $transplant_state)
                                        <option value="{{$transplant_state->id}}"
                                            {{ old("transplant_state_id") == $transplant_state->id ? "selected":"" }}>
                                            {{$transplant_state->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseBeforeBloodType" class="input-group-text">病人移植前血型</label>
                                <select name="before_blood_type_id" id="createCaseBeforeBloodType" class="form-select">
                                    @foreach($before_blood_types as $before_blood_type)
                                        <option value="{{$before_blood_type->id}}"
                                            {{ old("before_blood_type_id") == $before_blood_type->id ? "selected":"" }}>
                                            {{$before_blood_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseDonorBloodType" class="input-group-text">捐贈者血型</label>
                                <select name="donor_blood_type_id" id="createCaseDonorBloodType" class="form-select">
                                    @foreach($donor_blood_types as $donor_blood_type)
                                        <option value="{{$donor_blood_type->id}}"
                                            {{ old("donor_blood_type_id") == $donor_blood_type->id ? "selected":"" }}>
                                            {{$donor_blood_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="createCaseAfterBloodType" class="input-group-text">病人移植後血型</label>
                                <select name="after_blood_type_id" id="createCaseAfterBloodType" class="form-select">
                                    @foreach($after_blood_types as $after_blood_type)
                                        <option value="{{$after_blood_type->id}}"
                                            {{ old("after_blood_type_id") == $after_blood_type->id ? "selected":"" }}>
                                            {{$after_blood_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
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
                    <a href="{{route('cases.store')}}" class="btn btn-primary" id="createCaseSend"
                       onclick="event.preventDefault();$('#createCaseForm').submit();">
                        <span class="iconify-inline" data-icon="subway:tick"></span>
                        <span>確認</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
