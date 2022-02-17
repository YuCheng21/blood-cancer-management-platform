window.onload = function() {
    $('.deleteCaseBtn').click(function () {
        const url = $(this).data('url');
        $('#deleteCaseForm').attr('action', url)
        $('#deleteCaseSend').attr('href', url)
    })
};
