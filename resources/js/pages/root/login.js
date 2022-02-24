window.onpageshow = function () {
    if (loading){
        loading.remove();
    }
}

$('#loginSend').click(function () {
    $('body').prepend(loading);
})
