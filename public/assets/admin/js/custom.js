(() => {

    // active menu
    document.addEventListener('DOMContentLoaded', function () {
        const url = window.location.href;
        $('#admin-side-menu').find(`a[href="${url}"]`).closest('li').addClass('active');;
    });
})()
