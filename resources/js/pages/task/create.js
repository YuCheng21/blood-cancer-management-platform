$(document).on('click', '.updateTaskListBtn', function (e) {
    const index = $(e.currentTarget).closest('tr').data('index');
    $('#taskListSend').attr('data-index', index).data('index', index)
    $('input:checkbox[name=taskList]').prop('checked', false);
})

$(document).on('click', '#taskListSend', function () {
    let checkItem = [];
    $("input:checkbox[name=taskList]:checked").each(function () {
        checkItem.push($(this).nextAll('label').text());
    });
    if (checkItem.length) {
        let ul = document.createElement('ul');
        checkItem.forEach((item) => {
            let li = document.createElement("li");
            li.innerText = item;
            ul.appendChild(li);
        })
        ul.classList.add('mb-0')
        const index = $('#taskListSend').data('index')
        $(`tr[data-index=${index}] > td:nth-child(2)`).html(ul)
    }
    $('#taskListModal').modal('hide')
})

$('#createTaskSend').on('click', function () {
    const taskList = $('tr li').map(function () {
        week = $(this).closest('tr').data('index') + 1; // data-index start as 0
        return {
            'week': week,
            'content': $(this).text()
        }
    }).get();
    const name = $('#createSubTemplate').val();

    var form = document.createElement('form');
    form.setAttribute('action', sub_create_post);
    form.setAttribute('method', 'POST');

    var input0 = document.createElement('input');
    input0.setAttribute('type', 'hidden');
    input0.setAttribute('name', '_token');
    input0.setAttribute('value', csrf_token);

    var input1 = document.createElement('input');
    input1.setAttribute('type', 'text');
    input1.setAttribute('name', 'name');
    input1.setAttribute('value', name);

    var input2 = document.createElement('input');
    input2.setAttribute('type', 'text');
    input2.setAttribute('name', 'taskList');
    input2.setAttribute('value', JSON.stringify(taskList));

    var submit = document.createElement('input');
    submit.setAttribute('type', 'submit');

    form.appendChild(input0);
    form.appendChild(input1);
    form.appendChild(input2);
    form.appendChild(submit);

    document.body.appendChild(form).submit();
})
