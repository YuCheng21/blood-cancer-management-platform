$(document).on('click', '.deleteMessageBtn', function () {
    let deleteUrl = $(this).closest('tr').data('delete-url');
    $('#deleteMessageForm').attr('action', deleteUrl);
    $('#deleteMessageSend').attr('href', deleteUrl);
})

$(document).on('click', '.updateMessageBtn', function () {
    let updateUrl = $(this).closest('tr').data('update-url');
    $('#updateMessageForm').attr('action', updateUrl);
    $('#updateMessageSend').attr('href', updateUrl);

    let MessageId = $(this).closest('tr').data('id');
    let message = messages.filter(function (value) {
        return value['id'] === MessageId;
    })

    $('#updateMessageTitle').val(message[0]['title']);
    $('#updateMessageContent').val(message[0]['content']);
})

$(document).on('click', '.applyMessageBtn', function () {
    $('#applyMessageModal input:checkbox').prop('checked', false);

    let applyUrl = $(this).closest('tr').data('apply-url');
    $('#applyMessageForm').attr('action', applyUrl);
    $('#applyMessageSend').attr('href', applyUrl);

    let MessageId = $(this).closest('tr').data('id');
    let message = case_messages.filter(function (value) {
        return value['message_id'] === MessageId;
    })
    if (message.length === 0){
        message.push({undefined});
    }

    $('#applyMessageModal table>tbody>tr').each(function (key, value) {
        let currentRow = $(this);
        let case_id = message.map(function (element) {
            return element['case_id'];
        })
        if (case_id.includes(currentRow.data('case-id'))){
            $(currentRow).find('td:nth-child(4)')
                .text('已發送消息')
                .attr('class', 'text-success')
        }else{
            $(currentRow).find('td:nth-child(4)')
                .text('未發送消息')
                .addClass('text-success')
                .attr('class', 'text-primary')
        }
    })
})

$(document).on('click', '#applyMessageSend', function () {
    let selectedCase = [];
    $("#applyMessageModal input:checkbox:checked").each(function () {
        selectedCase.push($(this).closest('tr').data('case-id'));
    });
    var input1 = document.createElement('input');
    input1.setAttribute('type', 'hidden');
    input1.setAttribute('name', 'selectedCase');
    input1.setAttribute('value', JSON.stringify(selectedCase));

    let form = $('#applyMessageForm');
    form[0].appendChild(input1)
    form.submit()
})
