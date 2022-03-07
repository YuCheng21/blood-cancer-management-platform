$(document).on('click', '.btn-export', function () {
    const target = $(this);
    const id = target.data('action');
    const url = id === 'total' ? urlTotal :
        id === 'information' ? urlInformation :
            id === 'blood' ? urlBlood :
                id === 'task' ? urlTask :
                    id === 'medicine' ? urlMedicine :
                        id === 'effect' ? urlEffect :
                            id === 'report' ? urlReport : 'except';

    let selected = [];
    $("table input:checkbox:checked").each(function () {
        selected.push($(this).closest('tr').data('case-id'));
    });

    var input1 = document.createElement('input');
    input1.setAttribute('type', 'hidden');
    input1.setAttribute('name', 'selected');
    input1.setAttribute('value', JSON.stringify(selected));

    let form = $('#exportForm');

    form.attr('action', url)
    form[0].appendChild(input1)
    form.submit()
})
