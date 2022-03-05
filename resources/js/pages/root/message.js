$(document).on('click', '.deleteMessageBtn', function () {
    let deleteUrl = $(this).closest('tr').data('delete-url');
    $('#deleteMessageForm').attr('action', deleteUrl);
    $('#deleteMessageSend').attr('href', deleteUrl);
})

$(document).on('click', '.updateMessageBtn', function () {
    let updateUrl = $(this).closest('tr').data('update-url');
    $('#updateMessageForm').attr('action', updateUrl);
    $('#updateMessageSend').attr('href', updateUrl);

    let updateMessageId = $(this).closest('tr').data('id');
    let message = messages.filter(function (value) {
        return value['id'] === updateMessageId;
    })

    $('#updateMessageTitle').val(message[0]['title']);
    $('#updateMessageContent').val(message[0]['content']);
})
