$(document).on('click', '.deleteCaseBtn', function (e) {
    const deleteUrl = $(e.currentTarget).data('url');
    $('#deleteCaseForm').attr('action', deleteUrl)
    $('#deleteCaseSend').attr('href', deleteUrl)
})

$(document).on('click', '.updateCaseBtn', function () {
    const updateUrl = $(this).data('url');
    $('#updateCaseForm').attr('action', updateUrl)
    $('#updateCaseSend').attr('href', updateUrl)

    const updateAccount = $(this).data('account');
    $.each(cases, function (key, value) {
        if (value.account === updateAccount) {
            $('#updateCaseAccount').val(value['account']);
            $('#updateCasePassword').val(value['password']);
            $('#updateCaseTransplantNum').val(value['transplant_num']);
            $('#updateCaseName').val(value['name']);
            $('#updateCaseGender').val(value['gender_id']).change();
            $('#updateCaseBirth').val(value['birthday']);
            $('#updateCaseDate').val(value['date']);
            $('#updateCaseTransplantType').val(value['transplant_type_id']).change();
            $('#updateCaseDiseaseType').val(value['disease_type_id']).change();
            $('#updateCaseDiseaseState').val(value['disease_state_id']).change();
            $('#updateCaseDiseaseClass').val(value['disease_class_id']).change();
        }
    })
})
