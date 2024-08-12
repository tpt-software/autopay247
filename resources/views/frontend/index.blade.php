@extends('frontend.layouts.main')
@section('content')
    <section class="header__main">
        <div class="header__main--content">
            <h1 class="std-title theme--text">
                Web3.0 - MUA BÁN TỰ ĐỘNG 10s & HỖ TRỢ 24/24
            </h1>
            <h1 class="std-title theme--text">
                Hỗ trợ All Bank | Bảo Hiểm 20000$!
            </h1>

            <div class="header__main--content__max">
                <div class="css-75g3nm dark-mode-background">
                    <div class="css-1qs8gjy">
                        <div class="css-16vu25q">
                            <span id="top_crypto_table-2-USDT" class="css-sujoqu">
                                <div class="css-hp0wk0">
                                    <div class="css-5x6ly7">
                                        <div data-bn-type="text" class="coinRow-coinCode css-1brrg87"></div>
                                        <div data-bn-type="text" class="css-1ev4kiq"></div>
                                    </div>
                                </div>
                                <div class="css-fiavot">
                                    <div class="css-10nf7hq">
                                        <div data-bn-type="text" class=" css-1ld3mhe label-buy theme--text">Giá Mua</div>
                                    </div>
                                </div>
                                <div class="css-ej4c9n">
                                    <div data-bn-type="text" style="direction:ltr" class=" label-sell theme--text">Giá Bán
                                    </div>
                                </div>

                            </span><span id="top_crypto_table-1-BTC_USDT" class="css-sujoqu">
                                <div class="css-hp0wk0"><img alt=""
                                        data-src="{{ asset('assets/images/btc-coin.png') }}"
                                        src="{{ asset('assets/images/btc-coin.png') }}" class="mica-lazy-img css-r8bci2"
                                        style="background-color: transparent;">
                                    <div class="css-5x6ly7">
                                        <div data-bn-type="text" class="coinRow-coinCode css-1brrg87 theme--text">BTC</div>
                                        <div data-bn-type="text" class="css-1ev4kiq theme--text">Bitcoin</div>
                                    </div>
                                </div>
                                <div class="css-fiavot">
                                    <div class="css-10nf7hq">
                                        <div data-bn-type="text" id="btc-buy-price" class="coinRow-coinPrice css-1ld3mhe">
                                        </div>
                                    </div>
                                </div>
                                <div class="css-ej4c9n">
                                    <div data-bn-type="text" id="btc-sell-price" style="direction:ltr" class="css-k2pbmh">
                                    </div>
                                </div>
                            </span>
                            <span id="top_crypto_table-2-USDT" class="css-sujoqu">
                                <div class="css-hp0wk0"><img alt="" data-src="{{ asset('assets/images/usdt.png') }}"
                                        src="{{ asset('assets/images/usdt.png') }}" class="mica-lazy-img css-r8bci2"
                                        style="background-color: transparent;">
                                    <div class="css-5x6ly7">
                                        <div data-bn-type="text" class="coinRow-coinCode css-1brrg87 theme--text">USDT</div>
                                        <div data-bn-type="text" class="css-1ev4kiq theme--text">USDT</div>
                                    </div>
                                </div>
                                <div class="css-fiavot">
                                    <div class="css-10nf7hq">
                                        <div data-bn-type="text" id="usdt-buy-price" class="coinRow-coinPrice css-1ld3mhe">
                                        </div>
                                    </div>
                                </div>
                                <div class="css-ej4c9n">
                                    <div data-bn-type="text" id="usdt-sell-price" style="direction:ltr" class="css-k2pbmh">
                                    </div>
                                </div>
                            </span><span id="top_crypto_table-3-BNB_USDT" class="css-sujoqu">
                                <div class="css-hp0wk0"><img alt="" data-src="{{ asset('assets/images/bnb.png') }}"
                                        src="{{ asset('assets/images/bnb.png') }}" class="mica-lazy-img css-r8bci2"
                                        style="background-color: transparent;">
                                    <div class="css-5x6ly7">
                                        <div data-bn-type="text" class="coinRow-coinCode css-1brrg87 theme--text">BNB</div>
                                        <div data-bn-type="text" class="css-1ev4kiq theme--text">BNB</div>
                                    </div>
                                </div>
                                <div class="css-fiavot">
                                    <div class="css-10nf7hq">
                                        <div data-bn-type="text" id="bnb-buy-price" class="coinRow-coinPrice css-1ld3mhe">
                                        </div>
                                    </div>
                                </div>
                                <div class="css-ej4c9n">
                                    <div data-bn-type="text" id="bnb-sell-price" style="direction:ltr" class="css-k2pbmh">
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="header__main--content__continue theme--text">
                    <span></span>
                    <p>Chọn Tiếp Tục Với</p>
                    <span></span>
                </div>
                <div class="header__main--content__auth-btn">
                    <div class="header__main--content__auth-btn--btn-buy">
                        <button class="transaction" data-bs-toggle="modal" data-bs-target="#chooseVerify" id="verify-button">Mua</button>
                    </div>
                    <div class="header__main--content__auth-btn--btn-sell">
                        <a class="transaction item-buy-sell" id="btnSell" href="{{ route('sell') }}">
                            <div>
                                Bán
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__main--image">
            <div class="css-75g3nm dark-mode-background">
                <div class="css-1qs8gjy">
                    <div class="css-16vu25q">
                        <span id="top_crypto_table-2-USDT" class="css-sujoqu">

                            <div class="css-fiavot">
                                <div class="css-10nf7hq">
                                    <div data-bn-type="text" class=" css-1ld3mhe label-history theme--text">Lịch sử giao
                                        dịch khách
                                        hàng: </div>
                                </div>
                            </div>

                        </span>
                        <div id="history-fake">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="header__stats theme--text">
        <div class="header__stats--stat">
            <div>
                <h1>10 tỷ</h1>
                <p>Khối lượng giao dịch 30 ngày trên AUTOPAY247
                </p>
            </div>
        </div>
        <div class="header__stats--stat">
            <div>
                <h1>5 giây</h1>
                <p>Tốc độ xử lý</p>
            </div>
        </div>
        <div class="header__stats--stat">
            <div>
                <h1>8000</h1>
                <p>Người dùng đã đăng ký
                </p>
            </div>
        </div>
        <div class="header__stats--stat">
            <div>
                <h1>&lt;0.10%</h1>
                <p>Phí giao dịch thấp nhất
                </p>
            </div>
        </div>
    </section>
    @include('frontend.includes.chooseVerifyHome')
@endsection
@section('script')
    <script>
        jQuery( document ).ready( function(){
            jQuery('#continue-button-home').on('click',function(){
                var checkedValue = $('input[name="fav_language"]:checked').val();
                window.location.href = checkedValue;
            });
        });
    </script> 
    <script>
        // setInterval(() => {
        $.ajax({
            type: 'GET',
            url: "{{ route('prices') }}",

            success: function(response) {
                let priceDifference = 100;
                let usdtSellPrice = response.USDT["USDT-VND"]["bid"];
                let usdtBuyPrice = response.USDT["USDT-VND"]["ask"];
                let btc = response.BTC;
                let bnb = response.BNB;

                // Bán thì trừ 1%
                let usdtTransferSell = usdtSellPrice - usdtSellPrice * 0.01;;
                let btcSellPrice = (btc * usdtTransferSell).toFixed(2);
                let bnbSellPrice = (bnb * usdtTransferSell).toFixed(2);
				
				usdtTransferSell = number_format(usdtTransferSell);
				btcSellPrice = number_format(btcSellPrice);
				bnbSellPrice = number_format(bnbSellPrice);
                
                // Mua thì tawng 1%
                let usdtTransferBuy = usdtBuyPrice + usdtBuyPrice * 0.01;;
                let btcBuyPrice = (btc * usdtTransferBuy).toFixed(2);
                let bnbBuyPrice = (bnb * usdtTransferBuy).toFixed(2);

				usdtTransferBuy = number_format(usdtTransferBuy);
				btcBuyPrice = number_format(btcBuyPrice);
				bnbBuyPrice = number_format(bnbBuyPrice);
                

                $('#btc-buy-price').text(btcBuyPrice.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }));
                $('#btc-sell-price').text(btcSellPrice.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }));

                $('#usdt-buy-price').text(usdtTransferBuy.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }));
                $('#usdt-sell-price').text(usdtTransferSell.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }));

                $('#bnb-buy-price').text(bnbBuyPrice.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }));
                $('#bnb-sell-price').text(bnbSellPrice.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }));

            },
            error: function(response) {
                console.log('Error:', response);
            }
        });
        // }, 2000);

        $(document).ready(function() {
            var data = [];

            // Hàm thực hiện AJAX request để lấy dữ liệu mới và cập nhật mảng data
            function fetchData() {
                $.ajax({
                    url: '/get-random-history',
                    method: 'GET',
                    success: function(newData) {
                        displayData(newData); // Hiển thị dữ liệu
                    }
                });
            }

            // Hàm hiển thị dữ liệu
            function displayData(data) {
                // console.log(data);
                $('#history-fake').empty();
                var html = '';
                // Duyệt qua mảng dữ liệu và hiển thị từng phần tử
                // for (var ele = 0; ele < 5; ele++) {
                for (var i = 0; i < data.length; i++) {
                    var className = data[i].type === 'bán' ? 'css-k2pbmh' : 'coinRow-coinPrice';
                    // Làm tròn giá trị amount_coin đến 2 chữ số sau dấu thập phân
                    var amount_coin = parseFloat(data[i].amount_coin).toFixed(2);
                    html += `
                        <span id="top_crypto_table-1-BTC_USDT" class="css-sujoqu" href="">
                        <div class="css-fiavot">
                        <div>
                        <div data-bn-type="text" class="${className}">${data[i].bank} (${data[i].stk}) » ${data[i].type} ${amount_coin} ${data[i].name_coin}</div>
                        <div data-bn-type="text" class="time-history">${data[i].time} phút trước</div>
                        </div>
                        </div>
                        <div class="css-ej4c9n">
                        <div data-bn-type="text" style="direction:ltr" class="start"> 5 &#11088;</div>
                        </div>
                        </span>`;
                }
                // }
                $('#history-fake').html(html);
            }

            // // Gọi hàm fetchData mỗi 30 giây
            setInterval(fetchData, 30000);

            // Hiển thị dữ liệu ban đầu (5 giá trị đầu tiên)
            fetchData();
        });
    </script>
@endsection
