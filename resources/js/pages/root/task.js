$(document).on('change', '#selectSubTemplate', function (e) {
    const deleteUrl = $(this).find(':selected').data('delete-url')
    const updateUrl = $(this).find(':selected').data('update-url')
    $('#deleteTaskForm').attr('action', deleteUrl)
    $('#deleteTaskSend').attr('href', deleteUrl)
    $('#updateTaskBtn').attr('href', updateUrl)

    let target = $(this).val();
    let template = templates.filter(element => element['name'] === target)
    let weeks = template.map(function (obj) {
        return obj['week'];
    });
    weeks = weeks.filter(function(v,i) { return weeks.indexOf(v) === i; });
    $('tbody>tr>td:nth-child(2)').html('')
    weeks.forEach(function (week) {
        let taskOfWeek = template.filter(element => element['week'] === week)
        let ul = document.createElement('ul');
        taskOfWeek.forEach(function (tasks) {
            let li = document.createElement("li");
            li.innerText = tasks['task']['name'];
            ul.appendChild(li);
        })
        ul.classList.add('mb-0')

        $(`tbody>tr[data-index=${week-1}]>td:nth-child(2)`).html(ul)
    })
})
