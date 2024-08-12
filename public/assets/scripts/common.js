function clickBuySell(e) {
    $('#buy, #sell').addClass('d-none');
    $('.item-buy-sell').removeClass('active').addClass('not-active');

    $(e).removeClass('not-active').addClass('active');

    let attr = $(e).attr('data-type');
    $("#" + attr).removeClass('d-none');
}


function clickSell() {
    window.location.href = 'transaction?#sell';
    $('#buy').addClass('d-none');
}
