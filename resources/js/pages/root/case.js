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
            $('#updateCaseTransplantNum').val(value['transplantNum']);
            $('#updateCaseName').val(value['name']);
            $('#updateCaseGender').val(value['gender']).change();
            $('#updateCaseBirth').val(value['birthday']);
            $('#updateCaseDate').val(value['date']);
            $('#updateCaseTransplantType').val(value['transplantType']).change();
            $('#updateCaseDiseaseType').val(value['diseaseType']).change();
            $('#updateCaseDiseaseState').val(value['diseaseState']).change();
            $('#updateCaseDiseaseClass').val(value['diseaseClass']).change();
        }
    })
})
