$(document).on('click', '.deleteFaqBtn', function () {
    let deleteUrl = $(this).closest('tr').data('delete-url');
    $('#deleteFaqForm').attr('action', deleteUrl);
    $('#deleteFaqSend').attr('href', deleteUrl);
})

$(document).on('click', '.updateFaqBtn', function () {
    let updateUrl = $(this).closest('tr').data('update-url');
    $('#updateFaqForm').attr('action', updateUrl);
    $('#updateFaqSend').attr('href', updateUrl);

    let updateFaqId = $(this).closest('tr').data('id');
    let faq = faqs.filter(function (value) {
        return value['id'] === updateFaqId;
    })

    $('#updateFaqType').val(faq[0]['category_1']).change();
    $('#updateFaqTitle').val(faq[0]['title']);
    $('#updateFaqContent').val(faq[0]['content']);
})
