$(document).on('click', '.deleteCaseBtn', function (e) {
    const deleteUrl = $(e.currentTarget).data('url');
    $('#deleteCaseForm').attr('action', deleteUrl)
    $('#deleteCaseSend').attr('href', deleteUrl)
})

$(document).on('click', '.updateCaseBtn', function () {
    const updateUrl = $(this).data('update-url');
    const updateAccount = $(this).data('account');
    $.each(cases, function (key, value) {
        if (value.account === updateAccount) {
            $('#updateCaseForm').attr('action', updateUrl)
            $('#updateCaseSend').attr('href', updateUrl)

            $('#updateCaseAccount').val(value['account']);
            $('#updateCasePassword').val(value['password']);
            $('#updateCaseTransplantNum').val(value['transplant_num']);
            $('#updateCaseName').val(value['name']);
            $('#updateCaseGender').val(value['gender_id']).change();
            $('#updateCaseBirth').val(value['birthday']);

            $('#updateCaseHometown').val(value['hometown_id']).change();
            $('#updateCaseHometownOther').val(value['hometown_other']);
            $('#updateCaseEducation').val(value['education_id']).change();
            $('#updateCaseMarriage').val(value['marriage_id']).change();
            $('#updateCaseReligion').val(value['religion_id']).change();
            $('#updateCaseReligionOther').val(value['religion_other']);
            $('#updateCaseProfession').val(value['profession_id']).change();
            $('#updateCaseProfessionDetail').val(value['profession_detail_id']).change();
            $('#updateCaseIncome').val(value['income_id']).change();
            $('#updateCaseSource').val(value['source_id']).change();

            $('#updateCaseEndDate').val(value['end_date']);
            $('#updateCaseExperimental').val(value['experimental_id']).change();

            $('#updateCaseDiagnosed').val(value['diagnosed']);

            $('#updateCaseDate').val(value['date']);
            $('#updateCaseTransplantType').val(value['transplant_type_id']).change();
            $('#updateCaseTransplantTypeOther').val(value['transplant_type_other']);

            $('#updateCaseHlaType').val(value['hla_type_id']).change();
            $('#updateCasePatientHlaA1').val(value['patient_hla_a1']);
            $('#updateCasePatientHlaA2').val(value['patient_hla_a2']);
            $('#updateCasePatientHlaB1').val(value['patient_hla_b1']);
            $('#updateCasePatientHlaB2').val(value['patient_hla_b2']);
            $('#updateCasePatientHlaC1').val(value['patient_hla_c1']);
            $('#updateCasePatientHlaC2').val(value['patient_hla_c2']);
            $('#updateCasePatientHlaDR1').val(value['patient_hla_dr1']);
            $('#updateCasePatientHlaDR2').val(value['patient_hla_dr2']);
            $('#updateCasePatientHlaDQ1').val(value['patient_hla_dq1']);
            $('#updateCasePatientHlaDQ2').val(value['patient_hla_dq2']);
            $('#updateCasePatientHlaMatch').val(value['patient_hla_match']);
            $('#updateCaseDonorHlaA1').val(value['donor_hla_a1']);
            $('#updateCaseDonorHlaA2').val(value['donor_hla_a2']);
            $('#updateCaseDonorHlaB1').val(value['donor_hla_b1']);
            $('#updateCaseDonorHlaB2').val(value['donor_hla_b2']);
            $('#updateCaseDonorHlaC1').val(value['donor_hla_c1']);
            $('#updateCaseDonorHlaC2').val(value['donor_hla_c2']);
            $('#updateCaseDonorHlaDR1').val(value['donor_hla_dr1']);
            $('#updateCaseDonorHlaDR2').val(value['donor_hla_dr2']);
            $('#updateCaseDonorHlaDQ1').val(value['donor_hla_dq1']);
            $('#updateCaseDonorHlaDQ2').val(value['donor_hla_dq2']);
            $('#updateCaseDonorHlaMatch').val(value['donor_hla_match']);

            $('#updateCaseDiseaseType').val(value['disease_type_id']).change();
            $('#updateCaseDiseaseTypeOther').val(value['disease_type_other']);
            $('#updateCaseDiseaseState').val(value['disease_state_id']).change();
            $('#updateCaseDiseaseClass').val(value['disease_class_id']).change();

            $('#updateCaseTransplantState').val(value['transplant_state_id']).change();
            $('#updateCaseBeforeBloodType').val(value['before_blood_type_id']).change();
            $('#updateCaseDonorBloodType').val(value['donor_blood_type_id']).change();
            $('#updateCaseAfterBloodType').val(value['after_blood_type_id']).change();
        }
    })
})
