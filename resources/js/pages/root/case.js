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

            $('#updateCaseDiagnosed').val(value['diagnosed']);

            $('#updateCaseDate').val(value['date']);
            $('#updateCaseTransplantType').val(value['transplant_type_id']).change();
            $('#updateCaseDiseaseType').val(value['disease_type_id']).change();
            $('#updateCaseDiseaseState').val(value['disease_state_id']).change();
            $('#updateCaseDiseaseClass').val(value['disease_class_id']).change();
        }
    })
})
