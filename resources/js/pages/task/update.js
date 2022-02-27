$(document).on('click', '.updateTaskListBtn', function (e) {
    const index = $(e.currentTarget).closest('tr').data('index');
    $('#taskListSend').attr('data-index', index).data('index', index)
    let tasks = $(`tbody > tr[data-index=${index}] > td:nth-child(2) > ul > li`).map(function () {
        return $(this).text()
    }).get()
    $('input:checkbox[name=taskList]').prop('checked', false);
    $('#taskListForm label').map(function (){
        let list = $(this);
        tasks.forEach((item) => {
            if (list.text() === item){
                list.prevAll('input').prop('checked', true)
            }
        })
    })
})

$(document).on('click', '#taskListSend', function () {
    let checkItem = [];
    $("input:checkbox[name=taskList]:checked").each(function () {
        checkItem.push($(this).nextAll('label').text());
    });
    const index = $('#taskListSend').data('index')
    if (checkItem.length) {
        let ul = document.createElement('ul');
        checkItem.forEach((item) => {
            let li = document.createElement("li");
            li.innerText = item;
            ul.appendChild(li);
        })
        ul.classList.add('mb-0')
        $(`tr[data-index=${index}] > td:nth-child(2)`).html(ul)
    }else{
        $(`tr[data-index=${index}] > td:nth-child(2)`).html(null)
    }
    $('#taskListModal').modal('hide')
})

$('#createAsTaskSend').on('click', function () {

})

$('#updateTaskSend, #createAsTaskSend').on('click', function () {
    const taskList = $('tr li').map(function () {
        week = $(this).closest('tr').data('index') + 1; // data-index start as 0
        return {
            'week': week,
            'content': $(this).text()
        }
    }).get();
    let url;
    if ($(this).attr('id') === 'updateTaskSend'){
        url = sub_update_post
    }else if ($(this).attr('id') === 'createAsTaskSend'){
        url = sub_create_post
    }
    const name = $('#updateSubTemplate').val();

    var form = document.createElement('form');
    form.setAttribute('action', url);
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
