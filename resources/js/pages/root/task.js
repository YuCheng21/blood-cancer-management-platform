$(document).on('change', '#selectSubTemplate', function (e) {
    let target = $(this)
    const updateUrl = target.find(':selected').data('update-url')
    $('#updateTaskBtn').attr('href', updateUrl === undefined ? '#' : updateUrl)

    const deleteUrl = target.find(':selected').data('delete-url')
    $('#deleteTaskForm').attr('action', deleteUrl === undefined ? '#' : deleteUrl)
    $('#deleteTaskSend').attr('href', deleteUrl === undefined ? '#' : deleteUrl)

    const applyUrl = target.find(':selected').data('apply-url')
    $('#applyTaskForm').attr('action', applyUrl === undefined ? '#' : applyUrl)
    $('#applyTaskSend').attr('href', applyUrl === undefined ? '#' : applyUrl)

    if (target.val() === '') {
        $('#updateTaskBtn').addClass('disabled')
        $('button[data-bs-target="#deleteTaskModal"]').addClass('disabled')
        $('button[data-bs-target="#applyTaskModal"]').addClass('disabled')
    }else{
        $('#updateTaskBtn').removeClass('disabled')
        $('button[data-bs-target="#deleteTaskModal"]').removeClass('disabled')
        $('button[data-bs-target="#applyTaskModal"]').removeClass('disabled')
    }
    let template = templates.filter(element => element['name'] === target.val())
    let weeks = template.map(function (obj) {
        return obj['week'];
    });
    weeks = weeks.filter(function (v, i) {
        return weeks.indexOf(v) === i;
    });
    $('#subTemplate tbody>tr>td:nth-child(2)').html(null)
    weeks.forEach(function (week) {
        let taskOfWeek = template.filter(element => element['week'] === week)
        let ul = document.createElement('ul');
        taskOfWeek.forEach(function (tasks) {
            let li = document.createElement("li");
            li.innerText = tasks['task']['category_1'] + '-' + tasks['task']['category_2'] + '. ' + tasks['task']['name'];
            ul.appendChild(li);
        })
        ul.classList.add('mb-0')

        $(`#subTemplate tbody > tr[data-index=${week - 1}] > td:nth-child(2)`).html(ul)
    })
})

$('#applyTaskSend').on('click', function () {
    let applyList = $('#applyTaskModal table tr.selected').map(function () {
        return $(this).find('td:nth-child(2)').text();
    }).get();

    var form = document.createElement('form');
    form.setAttribute('action', $('#applyTaskForm').attr('action'));
    form.setAttribute('method', 'POST');

    var input0 = document.createElement('input');
    input0.setAttribute('type', 'hidden');
    input0.setAttribute('name', '_token');
    input0.setAttribute('value', csrf_token);

    var input2 = document.createElement('input');
    input2.setAttribute('type', 'text');
    input2.setAttribute('name', 'applyList');
    input2.setAttribute('value', JSON.stringify(applyList));

    var submit = document.createElement('input');
    submit.setAttribute('type', 'submit');

    form.appendChild(input0);
    form.appendChild(input2);
    form.appendChild(submit);

    document.body.appendChild(form).submit();
    $('body').prepend(loading);
})
