@extends('frontend.layouts.main')
@section('content')
<style>
    .tab_container .tab-item-container .tab-item.tab-item-buy.active {
        background: #03A66D !important;
        color: white !important;
    }
    .tab_container .tab-item-container .tab-item.tab-item-buy.active:after {
        display:none !important;
    }
</style>
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
                                        <div class="css-6qplja theme--text">Mua tiền mã hóa</div>
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
                                        <div data-type="buy" 
                                            class="item-buy-sell bn-flex tab-item tab-item-buy active dark-mode-background">
                                            <span data-type="buy" class="pl-[16px]">Mua</span>
                                        </div>
                                    </div>
                                </div>
                                @include('frontend.includes.buy')
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
    // Input mua
    let buy_input = $('#input-fiat-amount');
    // Input thanh toán
    let pay_input = $('#amount-buy');
    // Input đồng coin
    let coin_type_input = $('#crypto-select');
    // Giá ước tính
    let estimated_price = $('#estimated-price')
    let estimated_price_input = $('#estimated-price-input')
    // Let công thức tính
    let inputFiatreceive = $('#noti-infor-buy');
    // Submit
    let submit_btn = $('#submit-bank-buy')

    // network-select
    let network_select = $('#network-select');

    // Phí giao dịch mặc định
    let transactionFee = 1;

    buy_input.prop('disabled',true)
    // submit_btn.prop('disabled',true)

    // Khai báo bảng giá
    var usdtTransferBuy = 0;
    var btcBuyPrice = 0;
    var bnbBuyPrice = 0;
    var fee = 0;
    var verified = null;

    // Đồng coin mặc định
    var selectedCoint = 'USDT';
    var selectedCointPlaceholder = 'Min 10$ | Max 10000.00$';
    var minPrice = 10;
    var maxPrice = 10000;

    // Set placeholder
    buy_input.attr('placeholder',selectedCointPlaceholder)
    coin_type_input.select2({
        templateResult: formatState,
        templateSelection: formatState
    });

    // Gọi lấy giá mới nhất
    $.ajax({
        type: 'GET',
        url: "{{ route('prices') }}",
        success: function(response) {
            fee = {{ $fee }};
            verified = {{ $is_verified }};
            if(verified){
                //Hiển thị thông tin ngân hàng
                $('.choose-bank').removeClass('d-none');
                verificationStatus = `Tài khoản của bạn đã được KYC bằng bank phí giao dịch là 0%</br>`;
            }else{
                verificationStatus = `Tài khoản của bạn chưa KYC phí giao dịch là 3%</br>
                    <a href="{{ route('verify') }}" style="color:#dc3545!important; text-decoration: none;">Nhấn vào để KYC bằng bank với phí giao dịch là 0%</a></br>`;
            }
            $("#noti-price-buy").show().html(verificationStatus);

            // Cho phép nhập bán
            buy_input.prop('disabled',false);
            
            // Cập nhật giá
            let usdtBuyPrice = response.USDT["USDT-VND"]["ask"];
            let btc = response.BTC;
            let bnb = response.BNB;

            // Mua thì tawng 1%
            usdtTransferBuy = usdtBuyPrice + usdtBuyPrice * 0.01;;
            btcBuyPrice = (btc * usdtTransferBuy).toFixed(2);
            bnbBuyPrice = (bnb * usdtTransferBuy).toFixed(2);

            // Hiển thị giá ước tính
            estimated_price.html('1 USDT ≈ ' + usdtTransferBuy)
            estimated_price_input.val(usdtTransferBuy)

            // Cập nhật phí giao dịch
            transactionFee = transactionFee * usdtTransferBuy
        }
    });

    // Xử lý khi người dùng nhập số tiền
    // buy_input.maskMoney({
    //     precision: 0
    // });
    buy_input.on('keyup', function() {
        handle_final_price()
    });

    // Xử lý khi người dùng thay đổi đồng coin
    coin_type_input.on('change',function(){
        selectedCoint = $(this).val();
        // Chọn mạng lưới tương ứng
        network_select.find('optgroup').prop('disabled',true);
        network_select.find('option').prop('selected',false);
        network_select.find('optgroup[data-type="'+selectedCoint+'"]').prop('disabled',false);
        network_select.find('optgroup[data-type="'+selectedCoint+'"]').find('option:first-child').prop('selected',true);

        // Cập nhật lại giá transactionFee
        handle_transaction_fee()
        // Cập nhật lại giá chi
        handle_final_price();
    })

    // Xử lý khi người dùng thay đổi mạng lưới
    network_select.on('change',function(){
        // Cập nhật lại giá transactionFee
        handle_transaction_fee()
        // Cập nhật lại giá chi
        handle_final_price();
    })

    function handle_transaction_fee(){
        let selectedNextwork = network_select.find('option:selected');
        let fee = selectedNextwork.data('fee');
        let type = selectedNextwork.data('type');
        switch (type) {
            case 'USDT':
                transactionFee = fee * usdtTransferBuy
                break;
            case 'BTC':
                transactionFee = fee * btcBuyPrice
                break;
            case 'BNB':
                transactionFee = fee * bnbBuyPrice
                break;
        }
    }

    // Xử lý Số tiền cần thanh toán
    function handle_final_price(){
        let verificationPrice = '';
        let buyValue = buy_input.val();

        let inputPrice = buyValue.replace(',','');
        let final_price = 0;
        switch (selectedCoint) {
            case 'USDT':
                final_price = ((inputPrice * usdtTransferBuy) + ( usdtTransferBuy * fee) ).toFixed(2);
                // Cộng thêm phí giao dịch
                final_price = parseFloat(final_price) + parseFloat(transactionFee);

                selectedCointPlaceholder = 'Min 10$ | Max 10000.00$';
                minPrice = 10;
                maxPrice = 10000;
                step     = 0.5;

                // Hiển thị giá ước tính
                estimated_price.html('1 USDT ≈ ' + usdtTransferBuy)
                estimated_price_input.val(usdtTransferBuy)

                // Hiển thị công thức
                if(verified){
                    verificationPrice = '<a class="fs-4 text-success text-decoration-none">Thông tin: ' + number_format(final_price) + ' = (' + buyValue + '*' + usdtTransferBuy + ')' + ' + ' + transactionFee +  '</br> Số tiền thanh toán = (Mua * Giá) + Phí</a>'
                }else{
                    verificationPrice = '<a class="fs-4 text-success text-decoration-none">Thông tin: ' + number_format(final_price) + ' = (' + buyValue + '*' + usdtTransferBuy + ') * ' + '0.03 + ' + transactionFee + ' </br> Số tiền thanh toán = (Mua * Giá) * 0.03 + Phí</a>'
                }
                break;
            case 'BTC':
                final_price = ((inputPrice * btcBuyPrice) + ( btcBuyPrice * fee) ).toFixed(2);
                // Cộng thêm phí giao dịch
                final_price = parseFloat(final_price) + parseFloat(transactionFee);

                selectedCointPlaceholder = 'Min 0.0007BTC | Max 0.1873BTC';
                minPrice = 0.0007;
                maxPrice = 0.1873;
                step     = 0.0001;

                // Hiển thị giá ước tính
                estimated_price.html('1 BTC ≈ ' + btcBuyPrice)
                estimated_price_input.val(btcBuyPrice)

                // Hiển thị công thức
                if(verified){
                    verificationPrice = '<a class="fs-4 text-success text-decoration-none">Thông tin: ' + number_format(final_price) + ' = (' + buyValue + '*' + btcBuyPrice + ')' + ' + ' + transactionFee + '</br> Số tiền thanh toán = (Mua * Giá) + Phí</a>'
                }else{
                    verificationPrice = '<a class="fs-4 text-success text-decoration-none">Thông tin: ' + number_format(final_price) + ' = (' + buyValue + '*' + btcBuyPrice + ') * ' + '0.03 + ' +transactionFee+ ' </br> Số tiền thanh toán = (Mua * Giá) * 0.03 + Phí</a>'
                }
                break;
            case 'BNB':
                final_price = ((inputPrice * bnbBuyPrice) + ( bnbBuyPrice * fee) ).toFixed(2);
                // Cộng thêm phí giao dịch
                final_price = parseFloat(final_price) + parseFloat(transactionFee);

                selectedCointPlaceholder = 'Min 0.0835BNB | Max 21.2140BNB';
                minPrice = 0.0835;
                maxPrice = 21.2140;
                step     = 0.0001;

                // Hiển thị giá ước tính
                estimated_price.html('1 BNB ≈ ' + bnbBuyPrice)
                estimated_price_input.val(bnbBuyPrice)

                // Hiển thị công thức
                if(verified){
                    verificationPrice = '<a class="fs-4 text-success text-decoration-none">Thông tin: ' + number_format(final_price) + ' = (' + buyValue + '*' + bnbBuyPrice + ')' + ' + ' + transactionFee + '</br> Số tiền thanh toán = (Mua * Giá) + Phí </a>'
                }else{
                    verificationPrice = '<a class="fs-4 text-success text-decoration-none">Thông tin: ' + number_format(final_price) + ' = (' + buyValue + '*' + bnbBuyPrice + ') * ' + '0.03 + ' +transactionFee+ ' </br> Số tiền thanh toán = (Mua * Giá) * 0.03 + Phí</a>'
                }
                break;
            default:
                break;
        }
        buy_input.attr('step',step)
        buy_input.attr('min',minPrice)
        buy_input.attr('max',maxPrice)
        buy_input.attr('placeholder',selectedCointPlaceholder)

        // Nếu giá nhập lớn hơn giá hiện tại thì chuyển về lớn nhất
        if( inputPrice > maxPrice ){
            buy_input.val(maxPrice);
            handle_final_price()
            return false;
        }
        if( inputPrice < minPrice ){
            pay_input.val('Số lượng thấp nhất là: ' + minPrice);
            pay_input.css('color','red');
            inputFiatreceive.html('')
        }else{
            // Render công thức
            inputFiatreceive.html(verificationPrice);

            final_price = number_format(final_price);
            pay_input.css('color','black');
            pay_input.val(final_price);
        }
    }
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
</script>
@endsection