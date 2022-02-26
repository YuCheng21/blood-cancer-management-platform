$(document).on('click', '.deleteCaseBtn', function (e) {
    const deleteUrl = $(e.currentTarget).data('url');
    $('#deleteCaseForm').attr('action', deleteUrl)
    $('#deleteCaseSend').attr('href', deleteUrl)
})

$(document).on('click', '.updateCaseBtn', function () {
    const showUrl = $(this).data('show-url');
    const updateUrl = $(this).data('update-url');

    axios({
        url: showUrl,
        method: 'GET',
    }).then(function (res) {
        const cases = res['data']['data'][0]
        $('#updateCaseForm').attr('action', updateUrl)
        $('#updateCaseSend').attr('href', updateUrl)

        $('#updateCaseAccount').val(cases['account']);
        $('#updateCasePassword').val(cases['password']);
        $('#updateCaseTransplantNum').val(cases['transplant_num']);
        $('#updateCaseName').val(cases['name']);
        $('#updateCaseGender').val(cases['gender_id']).change();
        $('#updateCaseBirth').val(cases['birthday']);
        $('#updateCaseDate').val(cases['date']);
        $('#updateCaseTransplantType').val(cases['transplant_type_id']).change();
        $('#updateCaseDiseaseType').val(cases['disease_type_id']).change();
        $('#updateCaseDiseaseState').val(cases['disease_state_id']).change();
        $('#updateCaseDiseaseClass').val(cases['disease_class_id']).change();
    }).catch(function (err) {
        console.log(err)
    }).finally(function () {
    })
})
