jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf_token"]').attr('content')
    }
});
jQuery( document ).ready( function(){
    // Handle SELL FORM
    jQuery('#verify-bank-number-sell').on('click',function(){
		$('.choose-bank-sell-info').hide();
		$('.bank-full-name').empty();
		$('.account-name').empty();
		$('.account-number').empty();
		
        let _this = jQuery(this);
        let app_url = jQuery('meta[name="app_url"]').attr('content');
        let apiCheckBankNumberUrl = `${app_url}/verify-bank-number`;
        let bankName = $('.name-bank-sell').val();
        let bankFullName = $('.name-bank-sell').find(':selected').data('name');
        let bankNumber = $('.bank_number-sell').val();

        $('#verified-sell ,#err-bank-sell').addClass('d-none');
        $.ajax({
            method: 'POST',
            url: apiCheckBankNumberUrl,
            data: {
                bank: bankName,
                account: bankNumber,
                bankFullName
            },
            beforeSend: function () {
                _this.append('<i class="fa fa-spinner fa-spin"></i>')
            },
            success: function (response) {
                _this.find('.fa-spinner').remove();
                if(response.code == '00' || response.hasOwnProperty('verified')){
                    $('#verified-sell').removeClass('d-none');
                    $('#submit-bank-sell').prop('disabled',false);
					
					$('.choose-bank-sell-info').show();
					
					if( response.code == '00' ){
						$('.bank-full-name').text(response.data.accountName);
					}
					if( response.hasOwnProperty('verified') ){
						$('.bank-full-name').text(response.data.bank_name);
						$('.account-name').text(response.data.account_name);
						$('.account-number').text(response.data.account_number);
					}
					
					
                }else{
                    $('#submit-bank-sell').prop('disabled',true);
                    $('#err-bank-sell').removeClass('d-none');
                }
            }
        });
    })
})


// format giá tiền
function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function startTimer(endTime,obj = null) {
    endTime = new Date(endTime).getTime();
    var interval = setInterval(function() {
        var now = new Date().getTime();
        var distance = endTime - now;
        if (distance <= 0) {
            clearInterval(interval);
            distance = 0; // Đảm bảo thời gian không âm
            window.location.reload();
        }
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Cập nhật hiển thị
        $('.minute-tens').html( parseInt(minutes / 10, 10) );
        $('.minute-ones').html( minutes % 10 );
        $('.second-tens').html( parseInt(seconds / 10, 10) );
        $('.second-ones').html( seconds % 10 );
        if (distance < 0) {
            clearInterval(interval);
            window.location.reload();
        }
    }, 1000);
}

$('[data-action="copy"]').on("click", function() {
    const target = $(this).data('target');
    const el = document.querySelector(`[data-copy-target="${target}"]`)
    copyInputContent(el)
});
function copyInputContent(elm) {
    let copyText = elm.textContent.trim();
    if (navigator.clipboard && typeof navigator.clipboard.writeText === 'function') {
        const textToCopy = copyText; // Replace with the text you want to copy
        navigator.clipboard.writeText(textToCopy)
          .then(() => {
            alert('Đã copy nội dung');
          })
          .catch((error) => {
            console.error('Failed to copy text: ', error);
          });
      } else {
        // Fallback for older browsers that don't support the Clipboard API
        const textArea = document.createElement('textarea');
        textArea.value = copyText; // Replace with the text you want to copy
      
        // Make the textarea hidden
        textArea.style.position = 'fixed';
        textArea.style.top = '-9999px';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        try {
          const successful = document.execCommand('copy');
          const message = successful ? 'Đã copy nội dung' : '';
          if(message){
              alert(message);
          }
        } catch (error) {
          console.error('Failed to copy text: ', error);
        }
        document.body.removeChild(textArea);
      }
}