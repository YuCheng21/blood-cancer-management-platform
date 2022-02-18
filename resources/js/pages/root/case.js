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
            $('#updateCaseGender').val(value['gender']['name']).change();
            $('#updateCaseBirth').val(value['birthday']);
            $('#updateCaseDate').val(value['date']);
            $('#updateCaseTransplantType').val(value['transplant_type']['name']).change();
            $('#updateCaseDiseaseType').val(value['disease_type']['name']).change();
            $('#updateCaseDiseaseState').val(value['disease_state']['name']).change();
            $('#updateCaseDiseaseClass').val(value['disease_class']['name']).change();
        }
    })
})
