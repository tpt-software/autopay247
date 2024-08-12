@extends('frontend.layouts.main')
@section('content')
<style>
    .tab_container .tab-item-container .tab-item.tab-item-sell.active {
        background: #CF304A !important;
        color: white !important;
    }
    .tab_container .tab-item-container .tab-item.tab-item-sell.active:before {
        display: none !important;
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
                                        <div class="css-6qplja theme--text">Bán tiền mã hóa</div>
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
                                        <div data-type="sell" 
                                            class="item-buy-sell bn-flex tab-item tab-item-sell active dark-mode-background">
                                            <span data-type="sell" class="pr-[16px]">Bán</span>
                                        </div>
                                    </div>
                                </div>
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
jQuery( document ).ready( function(){
    // Input bán
    let sell_input = $('#input-fiat-amount-sell');
    // Input nhận
    let receive_input = $('#amount-sell');
    // Input đồng coin
    let coin_type_input = $('#crypto-select-sell');
    // Giá ước tính
    let estimated_price = $('#estimated-price-sell')
    let estimated_price_input = $('#estimated-price-input-sell')
    // Submit
    let submit_btn = $('#submit-bank-sell')

    sell_input.prop('disabled',true)
    submit_btn.prop('disabled',true)

    // Khai báo bảng giá
    var usdtTransferSell = 0;
    var btcSellPrice = 0;
    var bnbSellPrice = 0;

    // Đồng coin mặc định
    var selectedCoint = 'USDT';
    var selectedCointPlaceholder = 'Min 10$ | Max 10000.00$';
    var minPrice = 10;
    var maxPrice = 10000;

    // Set placeholder
    sell_input.attr('placeholder',selectedCointPlaceholder)
    coin_type_input.select2();
    coin_type_input.select2({
        templateResult: formatState,
        templateSelection: formatState
    });
    // Gọi lấy giá mới nhất
    $.ajax({
        type: 'GET',
        url: "{{ route('prices') }}",
        success: function(response) {
            // Cho phép nhập bán
            sell_input.prop('disabled',false);
            
            // Cập nhật giá
            let usdtSellPrice = response.USDT["USDT-VND"]["bid"];
            let btc = response.BTC;
            let bnb = response.BNB;

            // Bán thì trừ 1%
            usdtTransferSell = usdtSellPrice - usdtSellPrice * 0.01;;
            btcSellPrice = (btc * usdtTransferSell).toFixed(2);
            bnbSellPrice = (bnb * usdtTransferSell).toFixed(2);

            // Hiển thị giá ước tính
            estimated_price.html('1 USDT ≈ ' + usdtTransferSell)
            estimated_price_input.val(usdtTransferSell)
        }
    });
    
    // Xử lý khi người dùng nhập số tiền
    // sell_input.maskMoney({
    //     precision: 0
    // });
    sell_input.on('keyup', function() {
        handle_final_price()
    });

    // Xử lý khi người dùng thay đổi đồng coin
    coin_type_input.on('change',function(){
        selectedCoint = $(this).val();
        handle_final_price()
    })

    // Xử lý giá nhận
    function handle_final_price(){
        let sellValue = sell_input.val();
        let inputPrice = sellValue.replace(',','');
        let final_price = 0;
        switch (selectedCoint) {
            case 'USDT':
                final_price = ((inputPrice * usdtTransferSell) * 1).toFixed(2);
                selectedCointPlaceholder = 'Min 10$ | Max 10000.00$';
                minPrice = 10;
                maxPrice = 10000;
                step     = 0.5;

                // Hiển thị giá ước tính
                estimated_price.html('1 USDT ≈ ' + usdtTransferSell)
                estimated_price_input.val(usdtTransferSell)
                break;
            case 'BTC':
                final_price = ((inputPrice * btcSellPrice) * 1).toFixed(2);
                selectedCointPlaceholder = 'Min 0.0007BTC | Max 0.5091BTC';
                minPrice = 0.0007;
                maxPrice = 0.5091;
                step     = 0.0001;

                // Hiển thị giá ước tính
                estimated_price.html('1 BTC ≈ ' + btcSellPrice)
                estimated_price_input.val(btcSellPrice)
                break;
            case 'BNB':
                final_price = ((inputPrice * bnbSellPrice) * 1).toFixed(2);
                selectedCointPlaceholder = 'Min 0.0816BNB | Max 58.3698BNB';
                minPrice = 0.0816;
                maxPrice = 58.3698;
                step     = 0.0001;

                // Hiển thị giá ước tính
                estimated_price.html('1 BTC ≈ ' + bnbSellPrice)
                estimated_price_input.val(bnbSellPrice)
                break;
            default:
                break;
        }
        sell_input.attr('step',step)
        sell_input.attr('min',minPrice)
        sell_input.attr('max',maxPrice)
        sell_input.attr('placeholder',selectedCointPlaceholder)

        // Nếu giá nhập lớn hơn giá hiện tại thì chuyển về lớn nhất
        if( inputPrice > maxPrice ){
            sell_input.val(maxPrice);
            handle_final_price()
            return false;
        }

        if( inputPrice < minPrice ){
            receive_input.val('Số lượng thấp nhất là: ' + minPrice);
            receive_input.css('color','red');
        }else{
            receive_input.css('color','black');
            final_price = number_format(final_price);
            receive_input.val(final_price);
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
    
});
</script>
@endsection