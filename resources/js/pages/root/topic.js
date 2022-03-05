$(document).on('click', '.deleteTopicBtn', function () {
    let deleteUrl = $(this).closest('tr').data('delete-url');
    $('#deleteTopicForm').attr('action', deleteUrl);
    $('#deleteTopicSend').attr('href', deleteUrl);
})

$(document).on('click', '.updateTopicBtn', function () {
    let updateUrl = $(this).closest('tr').data('update-url');
    $('#updateTopicForm').attr('action', updateUrl);
    $('#updateTopicSend').attr('href', updateUrl);

    let updateTopicId = $(this).closest('tr').data('id');
    let topic = topics.filter(function (value) {
        return value['id'] === updateTopicId;
    })
    $('#updateSelectTopicType').val(topic[0]['task_id']).change();
    $('#updateTopicTitle').val(topic[0]['question']);

    if (topic[0]['question_type'] === $('#updateMcqType').val()){
        $('#updateMcqType').prop('checked', true);
        $('#updateMcqBlock').show();
        $('#updateTfqBlock').hide();
    }else if (topic[0]['question_type'] === $('#updateTfqType').val()){
        $('#updateTfqType').prop('checked', true);
        $('#updateMcqBlock').hide();
        $('#updateTfqBlock').show();
    }
    $(`#updateTopicModal input[name=answer][value=${topic[0]['answer']}]`).prop('checked', true);
    $('#updateItemContent1').val(topic[0]['option_a']);
    $('#updateItemContent2').val(topic[0]['option_b']);
    $('#updateItemContent3').val(topic[0]['option_c']);
    $('#updateItemContent4').val(topic[0]['option_d']);
})
