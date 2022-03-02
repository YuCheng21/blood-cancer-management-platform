$(document).on('click', '.updateTaskListBtn', function (e) {
    // getting the target week that was click.
    const index = $(e.currentTarget).closest('tr').data('index');
    // store week in modal element.
    $('#taskListSend').attr('data-index', index).data('index', index)
    // getting selected items from table.
    let tasks = $(`tbody > tr[data-index=${index}] > td:nth-child(2) > ul > li`).map(function () {
        return {
            'category_1': $(this).data('category-1'),
            'category_2': $(this).data('category-2'),
        }
    }).get()
    // initialize checkbox.
    $('input:checkbox[name=taskList]').prop('checked', false);
    // setting checkbox.
    $('#taskListForm input').map(function () {
        let list = $(this);
        tasks.forEach((item) => {
            let item_id = 'group' + item['category_1'] + '-' + item['category_2']
            if (list.attr('id') === item_id) {
                list.prop('checked', true)
            }
        })
    })
})

$(document).on('click', '#taskListSend', function () {
    // getting selected items from modal.
    let checkItem = [];
    $("input:checkbox[name=taskList]:checked").each(function () {
        let number = $(this).attr('id').split('group')[1].split('-');
        let category_1 = number[0];
        let category_2 = number.slice(1);
        let text = $(this).nextAll('label').text();
        checkItem.push({
            'category_1': category_1,
            'category_2': category_2,
            'text': text,
        });
    });
    // getting the target week that was click.
    let index = $('#taskListSend').data('index')
    // rendering items to table.
    if (checkItem.length) {
        let ul = document.createElement('ul');
        checkItem.forEach((item) => {
            let li = document.createElement("li");
            li.innerText = item['text'];
            li.setAttribute('data-category-1', item['category_1'])
            li.setAttribute('data-category-2', item['category_2'])
            ul.appendChild(li);
        })
        ul.classList.add('mb-0')
        $(`tr[data-index=${index}] > td:nth-child(2)`).html(ul)
    } else {
        $(`tr[data-index=${index}] > td:nth-child(2)`).html(null)
    }
    // hide the modal.
    $('#taskListModal').modal('hide')
})

$('#createTaskSend').on('click', function () {
    const taskList = $('tr li').map(function () {
        let week = $(this).closest('tr').data('index') + 1; // data-index start as 0
        return {
            'week': week,
            'category_1': $(this).data('category-1'),
            'category_2': $(this).data('category-2'),
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
