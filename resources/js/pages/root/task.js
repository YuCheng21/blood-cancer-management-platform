$(document).on('change', '#selectSubTemplate', function (e) {
    const name = $(this).find(':selected').data('name')
    const deleteUrl = $(this).find(':selected').data('delete-url')
    const updateUrl = $(this).find(':selected').data('update-url')
    const applyUrl = $(this).find(':selected').data('apply-url')
    $('#deleteTaskForm').attr('action', deleteUrl)
    $('#deleteTaskSend').attr('href', deleteUrl)
    $('#updateTaskBtn').attr('href', updateUrl)
    $('#applyTaskForm').attr('action', applyUrl)
    $('#applyTaskSend').attr('href', applyUrl)

    let target = $(this).val();
    let template = templates.filter(element => element['name'] === target)
    let weeks = template.map(function (obj) {
        return obj['week'];
    });
    weeks = weeks.filter(function(v,i) { return weeks.indexOf(v) === i; });
    $('#subTemplate tbody>tr>td:nth-child(2)').html(null)
    weeks.forEach(function (week) {
        let taskOfWeek = template.filter(element => element['week'] === week)
        let ul = document.createElement('ul');
        taskOfWeek.forEach(function (tasks) {
            let li = document.createElement("li");
            li.innerText = tasks['task']['category_1']+'-'+tasks['task']['category_2']+'-'+tasks['task']['name'];
            ul.appendChild(li);
        })
        ul.classList.add('mb-0')

        $(`#subTemplate tbody>tr[data-index=${week-1}]>td:nth-child(2)`).html(ul)
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
})
