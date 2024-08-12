@extends('frontend.layouts.main')
@section('content')
<main class="css-1wr4jig">
    <div class="css-v2uqgg">
        <div
            class="bn-flex BuySellFlowColletionContainer flex-col w-full min-h-[calc(100vh-64px-122px)] md:min-h-auto dark-mode-background">
            <div class="bn-flex items-center justify-center mt-[24px]">
                <div class="bn-flex flex-col justify-center relative flex-1">
                    <div class="bn-flex justify-center relative z-[1] flex-1 flex-col lg:flex-row">
                        <div class="hidden lg:block w-full lg:w-[486px] mr-0 lg:mr-[52px] bg-transparent pt-[32px]">
                            <div id="promotion-banner" class="css-refety">
                                <div class="css-ct51jz  dark-mode-background">
                                    <div class="css-1ky56cz">
                                        <div class="css-6qplja theme--text">Mua-Bán tiền mã hóa</div>
                                        <div class="css-vptphl theme--text">nhiều phương thức thanh toán khác nhau
                                        </div>
                                        <div class="css-p0edg4">
                                            <div class="css-vxi9ug">
                                                <div class="css-beckt8">
                                                    <svg style="font-size:24px" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" class="bn-svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M11 8.5a3.5 3.5 0 11-7 0 3.5 3.5 0 017 0zM2 17a3 3 0 013-3h5a3 3 0 013 3v3H2v-3zm14.5-1v-3h-3v-3h3V7h3v3h3v3h-3v3h-3z"
                                                            fill="currentColor"></path>
                                                        <path d="M16.5 13v3h3v-3h3v-3h-3V7h-3v3h-3v3h3z" fill="#F0B90B">
                                                        </path>
                                                    </svg>
                                                    <div class="css-vurnku theme--text">Tự động 5s</div>
                                                </div>
                                                <div class="css-1lrfikv"><img
                                                        src="{{ asset('assets/images/id-g.svg') }}" class="css-fafzrk">
                                                    <div class="css-vurnku theme--text">An toàn</div>
                                                </div>
                                                <div class="css-1lrfikv">
                                                    <svg style="font-size:24px" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" class="bn-svg">
                                                        <path
                                                            d="M18.25 3a2.75 2.75 0 110 5.5 2.75 2.75 0 010-5.5zM21 11H3v7a3 3 0 003 3h15v-3.5h-3v-3h3V11zM6.643 9h-3.62a5.5 5.5 0 0110.955 0h-3.62L8.5 7.143 6.643 9z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M6.643 9h-3.62a5.5 5.5 0 0110.955 0h-3.62L8.5 7.143 6.643 9z"
                                                            fill="#F0B90B"></path>
                                                    </svg>
                                                    <div class="css-vurnku theme--text">Hỗ trợ 24/7</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="trade=container" class="bn-flex justify-center">
                            <div class="relative w-full md:w-[550px] main-container">
                                <div class="tab_container buy">
                                    <div class="bn-flex tab-item-container">
                                        <div data-type="buy" onclick="clickBuySell(this)"
                                            class="item-buy-sell bn-flex tab-item tab-item-buy active dark-mode-background">
                                            <span data-type="buy" class="pl-[16px]">Mua</span>
                                        </div>
                                        <div data-type="sell" onclick="clickBuySell(this)"
                                            class="item-buy-sell bn-flex tab-item tab-item-sell not-active dark-mode-background">
                                            <span data-type="sell" class="pr-[16px]">Bán</span>
                                        </div>
                                    </div>
                                </div>
                                @include('frontend.includes.buy')
                                @include('frontend.includes.sell')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script>
let user = localStorage.getItem('user');
if (user) {
    user = JSON.parse(user);
    if (user.status == 1) {
        jQuery('.choose-bank-buy').hide();
    } else {
        jQuery('.choose-bank-buy').show();
    }
} else {
    jQuery('.choose-bank-buy').show();
}
console.log(user);
</script>
<script>
$('[data-action="format-money"]').on('input', function(event) {
    const displayTarget = $(this).data('display-target');
    const value = parseInt($(this).val()) || 0;
    const format = new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND'
    }).format(value)
    $(displayTarget).text(format)
})

$(document).ready(function() {
    var url = window.location.href;
    var element = url.split("?")[1];
    // console.log(element);
    // Vào sell khi click vào bán ở trang chủ
    if (element === "#sell") {
        jQuery('[data-type="sell"]').trigger('click');
    } else {
        jQuery('[data-type="buy"]').trigger('click');

    }

    // Hiển thị thông tin verify ở buys
    const account_number = localStorage.getItem("my_bank");
    const bank_name = localStorage.getItem("bank_name") ?? '970415';
    const accountName = localStorage.getItem("accountName");
    const bankFullName = localStorage.getItem("bankFullName");
    $('.account-number').text(account_number)
    $('.account-name').text(accountName)
    $('.bank-full-name').text(bankFullName)
    $('.bank_number').val(account_number)
    $('.bank_number-sell').val(account_number)
    $('.bank_id').val(bank_name)
    // Hiển thị thông tin verify ở sell
    // if (account_number || accountName || bankFullName) {
    //     $('.choose-bank-buy').addClass('d-none');
    // } else {
    //     $('.choose-bank').addClass('d-none');
    // }

    $(".js-example-basic-single").select2({
        templateResult: formatState,
        templateSelection: formatState
    });
    $(".js-example-basic-single-sell").select2({
        templateResult: formatStateSell,
        templateSelection: formatStateSell
    });
});

function formatState(state) {
    if (!state.id) {
        return state.text;
    }
    var baseUrl = "/user/pages/images/flags";
    var $state = $(
        '<span class="option-container"><img src="' + state.element.getAttribute('data-image') +
        '" class="img-flag" /> ' + state.text + '</span>'
    );
    return $state;
};
const cryptoNetworks = {
    'BTC': [{
            value: 'BTC',
            name: 'BTC-Bitcoin',
            processingTime: '60 phút',
            transactionFee: '0.00062 BTC'
        },
        {
            value: 'LIGHTNING',
            name: 'LIGHTNING-Lightning Network',
            processingTime: '0 phút',
            transactionFee: '0.000001 BTC'
        },
        {
            value: 'BSC',
            name: 'BSC-BNB Smart Chain (BEP20)',
            processingTime: '3 phút',
            transactionFee: '0.000009 BTC'
        },
        {
            value: 'ETH',
            name: 'ETH-Ethereum (ERC20)',
            processingTime: '4 phút',
            transactionFee: '0.00025 BTC'
        },
    ],
    'USDT': [{
            value: 'TRX',
            name: 'TRX-Tron (TRC20)',
            processingTime: '2 phút',
            transactionFee: '1 USDT'
        },
        {
            value: 'BSC',
            name: 'BSC-BNB Smart Chain (BEP20)',
            processingTime: '3 phút',
            transactionFee: '0.19 USDT'
        },
        {
            value: 'ETH',
            name: 'ETH-Ethereum (ERC20)',
            processingTime: '4 phút',
            transactionFee: '8 USDT'
        },
    ],
    'BNB': [{
        value: 'BSC',
        name: 'BSC-BNB Smart Chain (BEP20)',
        processingTime: '2 phút',
        transactionFee: '0.00012 BNB'
    }, ]
};

function updateNetworkOptions() {
    const cryptoSelect = document.getElementById('crypto-select');
    const networkSelect = document.getElementById('network-select');
    const inputFiatAmount = document.getElementById('input-fiat-amount');
    const selectedCrypto = cryptoSelect.value;
    networkSelect.innerHTML = '';

    cryptoNetworks[selectedCrypto].forEach(network => {
        const option = document.createElement('option');
        option.value = network.value;
        option.textContent =
            `${network.name} - Thời gian xử lý giao dịch ≈ ${network.processingTime}, Fee ≈ ${network.transactionFee}`;
        networkSelect.appendChild(option);
    });
    handleTransfer()


}

updateNetworkOptions();

const inputFiatAmount = document.getElementById('input-fiat-amount'); // Updated to use the correct ID
const errorMessage = document.getElementById('error-message');
const inputFiatreceive = document.getElementById('amount-buy');

// inputFiatAmount.addEventListener('keyup', function() {
//     const inputValue = parseFloat(this.value.replace(/,/g,'')); // Remove commas and parse as float
//     const placeholder = this.placeholder.split(' - ').map(parseFloat);
//     // if (isNaN(inputValue)) {
//     //     errorMessage.textContent = 'Vui lòng nhập số tiền hợp lệ.';
//     // } else if (inputValue < 360000) {
//     //     errorMessage.textContent = `Số tiền tối thiểu 360.000 VND.`;
//     // } else if (inputValue > 300000000) {
//     //     errorMessage.textContent = `Số tiền tối đa 300.000.000 VND.`;
//     // } else {
//     //     errorMessage.textContent = ''; // Clear error message if input is valid
//     // }
// });



function handleTransfer() {
    let priceDifference = 0;
    const cryptoSelect = document.getElementById('crypto-select');
    const estimatedPrice = document.getElementById('estimated-price')
    const estimatedPriceInput = document.getElementById('estimated-price-input')
    const selectedCrypto = cryptoSelect.value;
    let account_number = localStorage.getItem("my_bank");
    let verified = localStorage.getItem('verified_' + account_number);
    $.ajax({
        type: 'GET',
        url: "{{ route('prices') }}?type=buy",

        success: function(response) {
            let verificationStatus =
                `Tài khoản của bạn chưa KYC phí giao dịch là 3%</br>
                <a href="{{ route('verify') }}" style="color:#dc3545!important; text-decoration: none;">Nhấn vào để KYC bằng bank với phí giao dịch là 0%</a></br>`;

            let fee = 0;
            if(verified){
                fee = 0;
                verificationStatus = `Tài khoản của bạn đã được KYC bằng bank phí giao dịch là 0%</br>`;
            }else{
                fee = 0.03;
                verificationStatus = `Tài khoản của bạn chưa KYC phí giao dịch là 3%</br>
                    <a href="{{ route('verify') }}" style="color:#dc3545!important; text-decoration: none;">Nhấn vào để KYC bằng bank với phí giao dịch là 0%</a></br>`;
            }


            console.log('fee buy', fee);
            // console.log(verificationStatus);
            // hiển thị nút submit bán / mua khi có verify
            if (localStorage.getItem("user")) {
                $('.choose-bank').removeClass('d-none');
                $('#submit-bank-buy').prop('disabled', false);
                $('.main-container__bottom').removeClass('d-none');
                document.getElementById("noti-price-buy").innerHTML = verificationStatus;
            }

            let usdtSellPrice = response.USDT["USDT-VND"]["bid"];
            let usdtBuyPrice = response.USDT["USDT-VND"]["ask"];

            let usdtTransferBuy = usdtBuyPrice + usdtBuyPrice * 0.01;
            let usdtTransferSell = usdtBuyPrice - usdtBuyPrice * 0.01;;

            let btc = response.BTC;
            let bnb = response.BNB;

            let btcSellPrice = (btc * usdtTransferSell).toFixed(2);
            let btcBuyPrice = (btc * usdtTransferBuy).toFixed(2);

            let bnbSellPrice = (bnb * usdtTransferSell).toFixed(2);
            let bnbBuyPrice = (bnb * usdtTransferBuy).toFixed(2);

            inputFiatAmount.addEventListener('keydown', function() {
                const inputValue = parseFloat(this.value.replace(/,/g, ''));
                if( inputValue > 10000 ){
                    event.preventDefault();
                    inputFiatAmount.value = number_format(10000);
                    return false;
                }
            })

            inputFiatAmount.addEventListener('keyup', function() {
                const inputValue = parseFloat(this.value.replace(/,/g, ''));
                if( inputValue > 10000 ){
                    inputFiatAmount.value = number_format(10000);
                    return false;
                }
                
                if (inputValue && (isNaN(inputValue) || !isFinite(inputValue))) {
                    inputFiatreceive.value = 0;
                } else {
                    let verificationPrice = '';
                    switch (selectedCrypto) {
                        // Chuyển đổi tiền hiển thị công thức tính tiền buy
                        case 'BTC':
                            inputFiatreceive.value = ((inputValue / btcBuyPrice) + ( btcBuyPrice * fee) ).toFixed(2);
                            if(verified){
                                verificationPrice =
                                '<a class="fs-4 text-success text-decoration-none">Thông tin: ' +
                                inputFiatreceive.value + ' = (' + btcBuyPrice * inputValue.toFixed(2) + ')' + '</br> Công thức: Chi = (Mua * Giá) + Phí</a>'
                            }else{
                                verificationPrice =
                                '<a class="fs-4 text-success text-decoration-none">Thông tin: ' +
                                inputFiatreceive.value + ' = (' + btcBuyPrice * inputValue.toFixed(2) + ') + ' + '3% </br> Công thức: Chi = (Mua * Giá) + Phí</a>'
                            }
                            
                            break;
                        case 'USDT':
                            inputFiatreceive.value = ((inputValue * usdtTransferBuy) + ( usdtTransferBuy *fee) ).toFixed(2);
                            if(verified){
                                verificationPrice =
                                '<a class="fs-4 text-success text-decoration-none">Thông tin: ' + inputFiatreceive.value + ' = (' + inputValue + '*' + usdtTransferBuy.toFixed(2) + ')' + '</br> Công thức: Chi = (Mua * Giá) + Phí</a>'
                            }else{
                                verificationPrice =
                                '<a class="fs-4 text-success text-decoration-none">Thông tin: ' + inputFiatreceive.value + ' = (' + inputValue + '*' + usdtTransferBuy.toFixed(2) + ') + ' + '3% </br> Công thức: Chi = (Mua * Giá) + Phí</a>'
                            }
                            
                            break;
                        case 'BNB':
                            inputFiatreceive.value = ((inputValue / bnbBuyPrice) + ( bnbBuyPrice * fee) ).toFixed(2);
                            if(verified){
                                verificationPrice =
                                '<a class="fs-4 text-success text-decoration-none">Thông tin: ' +
                                inputFiatreceive.value + ' = (' + inputValue + '*' + bnbBuyPrice.toFixed(2) + ')' + '</br> Công thức: Chi = (Mua * Giá) + Phí</a>'
                            }else{
                                verificationPrice =
                                '<a class="fs-4 text-success text-decoration-none">Thông tin: ' +
                                inputFiatreceive.value + ' = (' + inputValue + '*' + bnbBuyPrice.toFixed(2) + ') + ' + '3% </br> Công thức: Chi = (Mua * Giá) + Phí</a>'
                            }
                            
                            break;
                        default:
                            inputFiatreceive.value = '0.00';
                            break;
                    }
                    // Format number
                    inputFiatreceive.value = number_format(inputFiatreceive.value)

                    document.getElementById("noti-infor-buy").innerHTML = '';
                    if (inputValue) {
                        document.getElementById("noti-infor-buy").innerHTML = verificationPrice;
                    }
                }
            });
            const inputValue = parseFloat(inputFiatAmount.value.replace(/,/g, ''));
            if (isNaN(inputValue) || !isFinite(
                    inputValue)) {
                inputFiatreceive.value = '0.00';
            }
            switch (selectedCrypto) {
                case 'BTC':
                    estimatedPrice.textContent = '1 BTC ≈ ' + btcBuyPrice;
                    estimatedPriceInput.value = btcBuyPrice;
                    inputFiatreceive.value = isNaN((inputValue / btcBuyPrice)) ? '0.00' : (
                        inputValue /
                        btcBuyPrice).toFixed(2);
                    break;
                case 'USDT':
                    estimatedPrice.textContent = '1 USDT ≈ ' + usdtTransferBuy;
                    estimatedPriceInput.value = usdtTransferBuy;
                    inputFiatreceive.value = isNaN((inputValue / usdtTransferBuy)) ?
                        '0.00' : (
                            inputValue / usdtTransferBuy).toFixed(2);
                    break;
                case 'BNB':
                    estimatedPrice.textContent = '1 USDT ≈ ' + bnbBuyPrice;
                    estimatedPriceInput.value = bnbBuyPrice;
                    inputFiatreceive.value = isNaN((inputValue / bnbBuyPrice)) ? '0.00' : (
                        inputValue /
                        bnbBuyPrice).toFixed(2);
                    break;
            }
        },
        error: function(response) {
            // console.log('Error:', response);
        }
    });
}
handleTransfer()

//sell
function formatStateSell(state) {
    if (!state.id) {
        return state.text;
    }
    var baseUrl = "/user/pages/images/flags";
    var $state = $(
        '<span class="option-container"><img src="' + state.element.getAttribute('data-image') +
        '" class="img-flag" /> ' + state.text + '</span>'
    );
    return $state;
};


function updateNetworkOptionsSell() {
    const cryptoSelect = document.getElementById('crypto-select-sell');
    const inputFiatAmount = document.getElementById('input-fiat-amount-sell');
    const selectedCrypto = cryptoSelect.value;
    handleTransferSell()

}
updateNetworkOptionsSell()

// const inputFiatAmountSell = document.getElementById('amount-sell'); // Updated to use the correct ID
const inputFiatAmountSell = document.getElementById('input-fiat-amount-sell'); // Updated to use the correct ID
const errorMessageSell = document.getElementById('error-message-sell');

// inputFiatAmountSell.addEventListener('keydown', function() {
//     const inputValueSell = parseFloat(this.value.replace(/,/g, '')); // Remove commas and parse as float
//     const placeholderSell = this.placeholder.split(' - ').map(parseFloat);

//     // if (isNaN(inputValueSell)) {
//     //     errorMessageSell.textContent = 'Vui lòng nhập số tiền hợp lệ.';
//     // } else if (inputValueSell < 360000) {
//     //     errorMessageSell.textContent = `Số tiền tối thiểu 360.000 VND.`;
//     // } else if (inputValueSell > 300000000) {
//     //     errorMessageSell.textContent = `Số tiền tối đa 300.000.000 VND.`;
//     // } else {
//     //     errorMessageSell.textContent = ''; // Clear error message if input is valid
//     // }
// });

function handleTransferSell() {
    console.log('handleTransferSell');
    let priceDifference = 0;
    const cryptoSelectSell = document.getElementById('crypto-select-sell');
    const estimatedPriceSell = document.getElementById('estimated-price-sell')
    const estimatedPriceInputSell = document.getElementById('estimated-price-input-sell')
    const selectedCryptoSell = cryptoSelectSell.value;
    const account_number = localStorage.getItem("my_bank");
    let verified = localStorage.getItem('verified_' + account_number);
    $.ajax({
        type: 'GET',
        url: "{{ route('prices') }}?type=sell",

        success: function(response) {
            let verificationSellStatus = 'Tài khoản chưa xác minh';
            let verificationStatus =
                `Tài khoản của bạn chưa KYC phí giao dịch là 10%</br>
                <a href="{{ route('verify') }}" style="color:#dc3545!important; text-decoration: none;">Nhấn vào để KYC bằng bank với phí giao dịch là 5%</a></br>
                `;

            let fee = 0;

            // response.bank.forEach(function(bank) {
            //     // Nếu đã verified thì ghi đè lại giá trị
            //     if (bank.status == 1) {
            //         verified = 1;
            //         // verificationSellStatus = 'Tài khoản đã xác minh';
            //         // jQuery('.choose-bank-sell').hide();
            //     }

            //     if (bank.account_number === account_number && verified == 1) {
            //         // Nếu account_number trùng khớp, lấy loại type của ngân hàng
            //         const bankType = bank.type;
            //         // Kiểm tra và cập nhật trạng thái xác minh tương ứng
            //         if (bankType === 1) {
            //             fee = 1;
            //             verificationStatus =
            //                 `Tài khoản của bạn đã được KYC bằng bank phí giao dịch là 0%</br>
            //             `;
            //         } else if (bankType === 2) {
            //             fee = 1;
            //             verificationStatus =
            //                 "Tài khoản của bạn đã được KYC bằng cccd phí giao dịch là 0%";
            //         } else {
            //             fee = 0.7;
            //             verificationStatus =
            //                 `Tài khoản của bạn chưa KYC phí giao dịch là 3%</br>
            //             <a href="{{ route('verify') }}" style="color:#dc3545!important; text-decoration: none;">Nhấn vào để KYC bằng bank với phí giao dịch là 0%</a></br>
            //             `;
            //         }
            //         // Thoát khỏi vòng lặp khi tìm thấy khớp
            //         return;
            //     }
            // });

            console.log('fee', fee);
            // hiển thị thông tin verify
            if (account_number) {
                document.getElementById("noti-price-sell").innerHTML = verificationSellStatus;
            }
            // Cho phép mua bán
            // console.log('verified', verified);
            if (verified == 1) {
                // $('#submit-bank-sell').prop('disabled', false);
                $('#submit-bank-buy').prop('disabled', false);
            }

            let usdtSellPrice = response.USDT["USDT-VND"]["bid"];
            let usdtBuyPrice = response.USDT["USDT-VND"]["ask"];

            let usdtTransferBuy = usdtBuyPrice + usdtBuyPrice * 0.01;
            let usdtTransferSell = usdtBuyPrice - usdtBuyPrice * 0.01;

            let btc = response.BTC;
            let bnb = response.BNB;

            let btcSellPrice = (btc * usdtTransferSell).toFixed(2);
            let btcBuyPrice = (btc * usdtTransferBuy).toFixed(2);

            let bnbSellPrice = (bnb * usdtTransferSell).toFixed(2);
            let bnbBuyPrice = (bnb * usdtTransferBuy).toFixed(2);
            // const inputFiatreceiveSell = document.getElementById('input-fiat-amount-sell');
            const inputFiatreceiveSell = document.getElementById('amount-sell');

            // Nhập vào số bán
            inputFiatAmountSell.addEventListener('keydown', function() {
                const inputValueSell = parseFloat(this.value.replace(/,/g, ''));
                if( inputValueSell > 10000 ){
                    event.preventDefault();
                    inputFiatAmountSell.value = number_format(10000);
                    return false;
                }
            })
            inputFiatAmountSell.addEventListener('keyup', function() {
                const inputValueSell = parseFloat(this.value.replace(/,/g, ''));
                if( inputValueSell > 10000 ){
                    event.preventDefault();
                    inputFiatAmountSell.value = number_format(10000);
                    return false;
                }

                if (isNaN(inputValueSell) || !isFinite(inputValueSell)) {
                    inputFiatreceiveSell.value = '0.00';
                } else {
                    switch (selectedCryptoSell) {
                        case 'BTC':
                            inputFiatreceiveSell.value = (inputValueSell * btcSellPrice).toFixed(
                                2);
                            break;
                        case 'USDT':
                            inputFiatreceiveSell.value = (inputValueSell * usdtTransferSell)
                                .toFixed(
                                    2);

                            break;
                        case 'BNB':
                            inputFiatreceiveSell.value = (inputValueSell * bnbSellPrice).toFixed(2);
                            break;
                        default:
                            inputFiatreceiveSell.value = '0.00';
                            break;
                    }
                }

                inputFiatreceiveSell.value = number_format(inputFiatreceiveSell.value)
            });
            const inputValueSell = parseFloat(inputFiatAmountSell.value.replace(/,/g, ''));
            if (isNaN(inputValueSell) || !isFinite(
                    inputValueSell)) {
                inputFiatreceiveSell.value = '0.00';
            }
            let verificationPrice = "";
            switch (selectedCryptoSell) {
                case 'BTC':
                    // Bán giảm 1%
                    estimatedPriceSell.textContent = '1 BTC ≈ ' + btcSellPrice;
                    estimatedPriceInputSell.value = btcSellPrice;
                    inputFiatreceiveSell.value = isNaN((inputValueSell * btcSellPrice)) ? '0.00' : ((
                        inputValueSell * btcSellPrice) * 1).toFixed(2);
                    // verificationPrice =
                    //     '<a class="fs-4 text-success text-decoration-none">Thông tin: ' +
                    //     inputFiatreceiveSell.value + ' = (' + inputValueSell + '*' + btcSellPrice
                    //     .toFixed(2) + ')*' + Math.round((1 - fee) * 100) +
                    //     '% </br> Công thức: Nhận = (Bán x Giá) + Phí</a>'
                    break;
                case 'USDT':
                    estimatedPriceSell.textContent = '1 USDT ≈ ' + usdtTransferSell;
                    estimatedPriceInputSell.value = usdtTransferSell;
                    inputFiatreceiveSell.value = isNaN((inputValueSell * usdtTransferSell)) ? '0.00' : (
                        (inputValueSell * usdtTransferSell) * 1).toFixed(2);
                    // verificationPrice =
                    //     '<a class="fs-4 text-success text-decoration-none">Thông tin: ' +
                    //     inputFiatreceiveSell.value + ' = (' + inputValueSell + '*' + usdtTransferSell
                    //     .toFixed(2) + ')*' + Math.round((1 - fee) * 100) +
                    //     '% </br> Công thức: Nhận = (Bán x Giá) + Phí</a>'
                    break;
                case 'BNB':
                    estimatedPriceSell.textContent = '1 USDT ≈ ' + bnbSellPrice;
                    estimatedPriceInputSell.value = bnbSellPrice;
                    inputFiatreceiveSell.value = isNaN((inputValueSell * bnbSellPrice)) ? '0.00' : ((
                        inputValueSell * bnbSellPrice) * 1).toFixed(2);
                    // verificationPrice =
                    //     '<a class="fs-4 text-success text-decoration-none">Thông tin: ' +
                    //     inputFiatreceiveSell.value + ' = (' + inputValueSell + '/' + bnbSellPrice
                    //     .toFixed(
                    //         2) + ')*' + Math.round((1 - fee) * 100) +
                    //     '% </br> Công thức: Nhận = (Chi/Giá)*Phí</a>'

                    // verificationPrice =
                    //     '<a class="fs-4 text-success text-decoration-none">Thông tin: ' +
                    //     inputFiatreceiveSell.value + ' = (' + inputValueSell + '*' + bnbSellPrice
                    //     .toFixed(2) + ')*' + Math.round((1 - fee) * 100) +
                    //     '% </br> Công thức: Nhận = (Bán x Giá) + Phí</a>'

                    break;
            }
            inputFiatreceiveSell.value = number_format(inputFiatreceiveSell.value)
            // hiển thị thông tin bán và công thức tính
            if (inputValueSell) {
                document.getElementById("noti-infor-sell").innerHTML = verificationPrice;
            }
        },
        error: function(response) {
            // console.log('Error:', response);
        }
    });
}
handleTransferSell()

function number_format(number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
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
</script>
@endsection