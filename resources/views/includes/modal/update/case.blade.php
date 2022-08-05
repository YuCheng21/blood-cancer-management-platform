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
                                <label for="updateCaseProfessionDetail" class="input-group-text d-block"
                                       style="font-size: 0.8em">
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
                            <div class="input-group mb-2">
                                <label for="updateCaseEndDate" class="input-group-text required">收案日期</label>
                                <input name="end_date" id="updateCaseEndDate" type="date" class="form-control"
                                       value="{{old('end_date')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseExperimental" class="input-group-text required">分組</label>
                                <select name="experimental_id" id="updateCaseExperimental" class="form-select">
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
                                <label for="updateCaseHlaType" class="input-group-text required">異體移植 HLA type</label>
                                <select name="hla_type_id" id="updateCaseHlaType" class="form-select">
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
                                <label for="updateCasePatientHlaA1" class="input-group-text">A1</label>
                                <input name="patient_hla_a1" type="text" id="updateCasePatientHlaA1"
                                       class="form-control" value="{{old('patient_hla_a1')}}">
                                <label for="updateCasePatientHlaA2" class="input-group-text">A2</label>
                                <input name="patient_hla_a2" type="text" id="updateCasePatientHlaA2"
                                       class="form-control" value="{{old('patient_hla_a2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCasePatientHlaB1" class="input-group-text">B1</label>
                                <input name="patient_hla_b1" type="text" id="updateCasePatientHlaB1"
                                       class="form-control" value="{{old('patient_hla_b1')}}">
                                <label for="updateCasePatientHlaB2" class="input-group-text">B2</label>
                                <input name="patient_hla_b2" type="text" id="updateCasePatientHlaB2"
                                       class="form-control" value="{{old('patient_hla_b2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCasePatientHlaC1" class="input-group-text">C1</label>
                                <input name="patient_hla_c1" type="text" id="updateCasePatientHlaC1"
                                       class="form-control" value="{{old('patient_hla_c1')}}">
                                <label for="updateCasePatientHlaC2" class="input-group-text">C2</label>
                                <input name="patient_hla_c2" type="text" id="updateCasePatientHlaC2"
                                       class="form-control" value="{{old('patient_hla_c2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCasePatientHlaDR1" class="input-group-text">DR1</label>
                                <input name="patient_hla_dr1" type="text" id="updateCasePatientHlaDR1"
                                       class="form-control" value="{{old('patient_hla_dr1')}}">
                                <label for="updateCasePatientHlaDR2" class="input-group-text">DR2</label>
                                <input name="patient_hla_dr2" type="text" id="updateCasePatientHlaDR2"
                                       class="form-control" value="{{old('patient_hla_dr2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCasePatientHlaDQ1" class="input-group-text">DQ1</label>
                                <input name="patient_hla_dq1" type="text" id="updateCasePatientHlaDQ1"
                                       class="form-control" value="{{old('patient_hla_dq1')}}">
                                <label for="updateCasePatientHlaDQ2" class="input-group-text">DQ2</label>
                                <input name="patient_hla_dq2" type="text" id="updateCasePatientHlaDQ2"
                                       class="form-control" value="{{old('patient_hla_dq2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCasePatientHlaMatch" class="input-group-text">Match</label>
                                <input name="patient_hla_match" type="text" id="updateCasePatientHlaMatch"
                                       class="form-control" value="{{old('patient_hla_match')}}">
                                <label class="input-group-text">/10</label>
                            </div>
                            <hr>
                            <p class="text-center fw-bold fs-6">捐贈者HLA</p>
                            <div class="input-group mb-2">
                                <label for="updateCaseDonorHlaA1" class="input-group-text">A1</label>
                                <input name="donor_hla_a1" type="text" id="updateCaseDonorHlaA1"
                                       class="form-control" value="{{old('donor_hla_a1')}}">
                                <label for="updateCaseDonorHlaA2" class="input-group-text">A2</label>
                                <input name="donor_hla_a2" type="text" id="updateCaseDonorHlaA2"
                                       class="form-control" value="{{old('donor_hla_a2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseDonorHlaB1" class="input-group-text">B1</label>
                                <input name="donor_hla_b1" type="text" id="updateCaseDonorHlaB1"
                                       class="form-control" value="{{old('donor_hla_b1')}}">
                                <label for="updateCaseDonorHlaB2" class="input-group-text">B2</label>
                                <input name="donor_hla_b2" type="text" id="updateCaseDonorHlaB2"
                                       class="form-control" value="{{old('donor_hla_b2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseDonorHlaC1" class="input-group-text">C1</label>
                                <input name="donor_hla_c1" type="text" id="updateCaseDonorHlaC1"
                                       class="form-control" value="{{old('donor_hla_c1')}}">
                                <label for="updateCaseDonorHlaC2" class="input-group-text">C2</label>
                                <input name="donor_hla_c2" type="text" id="updateCaseDonorHlaC2"
                                       class="form-control" value="{{old('donor_hla_c2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseDonorHlaDR1" class="input-group-text">DR1</label>
                                <input name="donor_hla_dr1" type="text" id="updateCaseDonorHlaDR1"
                                       class="form-control" value="{{old('donor_hla_dr1')}}">
                                <label for="updateCaseDonorHlaDR2" class="input-group-text">DR2</label>
                                <input name="donor_hla_dr2" type="text" id="updateCaseDonorHlaDR2"
                                       class="form-control" value="{{old('donor_hla_dr2')}}">
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseDonorHlaDQ1" class="input-group-text">DQ1</label>
                                <input name="donor_hla_dq1" type="text" id="updateCaseDonorHlaDQ1"
                                       class="form-control" value="{{old('donor_hla_dq1')}}">
                                <label for="updateCaseDonorHlaDQ2" class="input-group-text">DQ2</label>
                                <input name="donor_hla_dq2" type="text" id="updateCaseDonorHlaDQ2"
                                       class="form-control" value="{{old('donor_hla_dq2')}}">
                            </div>
{{--                            <div class="input-group mb-2">--}}
{{--                                <label for="updateCaseDonorHlaMatch" class="input-group-text">Match</label>--}}
{{--                                <input name="donor_hla_match" type="text" id="updateCaseDonorHlaMatch"--}}
{{--                                       class="form-control" value="{{old('donor_hla_match')}}">--}}
{{--                                <label class="input-group-text">/10</label>--}}
{{--                            </div>--}}
                            <hr>

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

                            <div class="input-group mb-2">
                                <label for="updateCaseTransplantState" class="input-group-text">移植時的疾病狀態</label>
                                <select name="transplant_state_id" id="updateCaseTransplantState" class="form-select">
                                    @foreach($transplant_states as $transplant_state)
                                        <option value="{{$transplant_state->id}}"
                                            {{ old("transplant_state_id") == $transplant_state->id ? "selected":"" }}>
                                            {{$transplant_state->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseBeforeBloodType" class="input-group-text">病人移植前血型</label>
                                <select name="before_blood_type_id" id="updateCaseBeforeBloodType" class="form-select">
                                    @foreach($before_blood_types as $before_blood_type)
                                        <option value="{{$before_blood_type->id}}"
                                            {{ old("before_blood_type_id") == $before_blood_type->id ? "selected":"" }}>
                                            {{$before_blood_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseDonorBloodType" class="input-group-text">捐贈者血型</label>
                                <select name="donor_blood_type_id" id="updateCaseDonorBloodType" class="form-select">
                                    @foreach($donor_blood_types as $donor_blood_type)
                                        <option value="{{$donor_blood_type->id}}"
                                            {{ old("donor_blood_type_id") == $donor_blood_type->id ? "selected":"" }}>
                                            {{$donor_blood_type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label for="updateCaseAfterBloodType" class="input-group-text">病人移植後血型</label>
                                <select name="after_blood_type_id" id="updateCaseAfterBloodType" class="form-select">
                                    @foreach($after_blood_types as $after_blood_type)
                                        <option value="{{$after_blood_type->id}}"
                                            {{ old("after_blood_type_id") == $after_blood_type->id ? "selected":"" }}>
                                            {{$after_blood_type->name}}
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
