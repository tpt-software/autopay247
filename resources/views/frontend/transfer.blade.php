@extends('frontend.layouts.main')
@section('content')
    <style>
        .css-1htc24x {
            height: auto;
            width: auto;
            padding: 18px 59px;
            font-size: 18px;
            margin-top: 19px !important;
        }
        div#bank-otp-wrapper {
            width: 100%;
            display: block;
        }
        .css-164229y {
            display: flex;
            flex-direction: row;
        }
        .css-vb7ksi .css-10nf7hq {
            width: 68% !important;
        }
        .css-qbxz06 {
            width: 100% !important;
        }
        .css-vb7ksi .css-vspdms {
            width: auto !important;;
        }
    </style>
    <main class="main-content css-vurnku">
        <div class="css-ny4q9y">
            <div class="css-d49pd text-center p-4">
                <h1 class="verify-status">
                @php
                    $statuses = \App\Models\Transaction::getStatues();
                    echo 'Trạng thái: '.$statuses[$data['status']];
                @endphp
                </h1>
            </div>
        </div>
        <div class="css-g2mx2m">
            <div class="css-1n1my9o">
                <div class="css-1rql8v5">
                    @if($data['status'] != 1)
                    <div class="css-10nf7hq">
                        <div data-bn-type="text" class="css-l9jms3">Đã đặt lệnh</div>
                    </div>
                    <div class="css-161fc19">
                        <div data-bn-type="text" class="css-rt4opq">Thanh toán cho người bán trong vòng <div
                                class="css-1f9551p">
                                <div class="css-1k5ro4k">
                                    <div class="css-yw9f4w">
                                        <div data-bn-type="text" class="minute-tens css-niwjst"></div>
                                    </div>
                                    <div class="css-yw9f4w">
                                        <div data-bn-type="text" class="minute-ones css-niwjst"></div>
                                    </div>:<div class="css-yw9f4w">
                                        <div data-bn-type="text" class="second-tens css-niwjst"></div>
                                    </div>
                                    <div class="css-yw9f4w">
                                        <div data-bn-type="text" class="second-ones css-niwjst"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="css-18pto7p">
                    <div class="css-10nf7hq">
                        <div data-bn-type="text" class="css-fhtmef">Số lệnh</div>
                        <div data-bn-type="text" class="css-3my46j">{{ $data['uuid'] }}</div>
                        <div class="css-1f9551p">
						</div>
                    </div>
                    <div class="css-kah20n">
                        <div data-bn-type="text" class="css-fhtmef">Thời gian tạo</div>
                        <div data-bn-type="text" class="css-3my46j">
                            {{ \Carbon\Carbon::parse($data['created_at'])->setTimezone('Asia/Ho_Chi_Minh')->format('H:i:s d/m/Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="css-ny4q9y">
            <div class="css-d49pd">
                <div class="css-1c7ksm9">
                    <div class="css-hkht7k">
                        <div class="css-hkg8yb">
                            <div id="order-detail-container" class="css-ufg8u0">
                                <div class="css-4cffwv">
                                    <div class="css-1g9n4q8">
                                        <div class="css-1o6lork">1</div>
                                        <div class="css-1afiqm5"></div>
                                    </div>
                                    <div class="css-1tr0qpm">
                                        <div class="css-12xnkhk">
                                            <div class="css-1ij6mzy">
                                                <div class="css-1wm8bgi">
                                                    <div data-bn-type="text" class="css-4q9gwc">Xác nhận thông tin
                                                        lệnh</div>
                                                </div>
                                                <div role="button" id="C2COrderDetail_buyOrderInfo_btn_info"
                                                    class="css-me3g1k"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="none" class="css-1iztezc">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12.11 12.178L16 8.287l1.768 1.768-5.657 5.657-1.768-1.768-3.889-3.889 1.768-1.768 3.889 3.89z"
                                                            fill="currentColor"></path>
                                                    </svg></div>
                                            </div>
                                            <div class="css-1n0o39o step1-rows">
                                                <div class="css-1xxc2ay">
                                                    <div data-bn-type="text" class="css-bwnouq"><span class="css-12cl38p">Số
                                                            tiền thanh toán</span>
                                                        <div class="css-nbvh49">
                                                            <div class="css-vurnku"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="none" class="css-xku7ik">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                                                        fill="currentColor"></path>
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                    <div data-bn-type="text" class="css-vwvc5o" style="line-height: 28px;">₫
                                                        {{ number_format($data['amount_buy'], 0, ',', '.') }}</div>
                                                </div>
                                                <div class="css-1xxc2ay">
                                                    <div data-bn-type="text" class="css-16r0c6w">Giá</div>
                                                    <div data-bn-type="text" class="css-pze5kt" style="direction: ltr;">₫
                                                        {{ number_format($data['estimated_price_input'], 0, ',', '.') }}
                                                    </div>
                                                </div>
                                                <div class="css-1xxc2ay">
                                                    <div data-bn-type="text" class="css-16r0c6w">Số lượng nhận được
                                                    </div>
                                                    <div data-bn-type="text" class="css-vwvc5o theme--text" style="line-height: 28px;color:red">
                                                        {{ $data['crypto_amount'] }} {{ $data['state'] }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="css-4cffwv">
                                    <div class="css-1g9n4q8">
                                        <div class="css-1o6lork">2</div>
                                        <div class="css-1afiqm5"></div>
                                    </div>
                                    <div class="css-1tr0qpm">
                                        <div class="css-ot2ytd">
                                            <div data-bn-type="text" class="css-4q9gwc">Thanh toán</div>
                                            <div data-bn-type="text" class="css-1dmj7t7">Chuyển tiền vào tài khoản
                                                của người bán được cung cấp bên dưới.<div class="css-1f9551p"><svg
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" class="css-1pp0nin">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                                            fill="currentColor"></path>
                                                    </svg></div>
                                            </div>
                                            <div class="css-vb7ksi">
                                                @if ($data['status'] == \App\Models\Transaction::STATUS_VALID)
                                                    <h2>
                                                        <strong>Đơn hàng đã hoàn thành</strong>
                                                    </h2>
                                                @elseif (\Carbon\Carbon::now()->greaterThan($data['expired_in']))
                                                    <h2>
                                                        <strong>Đơn hàng đã hết hạn</strong>
                                                    </h2>
                                                @else
                                                    <div class="css-qbxz06">
                                                        <div class="css-1gou3t8">
                                                            <div class="css-7aqo2m">
                                                                <div class="css-1x9ln48">
                                                                    <div class="css-2tdjbu"></div>
                                                                    <div data-bn-type="text" class="css-13ieqgy">
                                                                        Chuyển khoản ngân hàng</div>
                                                                </div>
                                                                <div class="qr-code-verify">
                                                                    <img src="{!! $data['qrCode'] !!}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="css-1f5v8tq">
                                                            <div class="css-epiuoh">
                                                                <div class="css-164229y">
                                                                    <div class="css-10nf7hq">
                                                                        <div data-bn-type="text" class="css-vspdms">
                                                                            Nội dung chuyển khoản</div>
                                                                        <div class="css-1f9551p"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                class="css-1kvlt27">
                                                                                <path fill-rule="evenodd"
                                                                                    clip-rule="evenodd"
                                                                                    d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                                                                    fill="currentColor"></path>
                                                                            </svg></div>
                                                                    </div>
                                                                    <div class="css-1gmq84w">
                                                                        <div data-bn-type="text" class="css-6uwbzv"
                                                                            id="buy-uuid" data-copy-target="buy-uuid">
                                                                            {{ $data['content'] }}</div><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            id="C2CorderDetail_btn_copy_paymentItem"
                                                                            class="css-1g6lkvi" data-action="copy"
                                                                            data-target="buy-uuid"
                                                                            style="vertical-align: -6px; cursor: pointer;">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="css-164229y">
                                                                    <div class="css-10nf7hq">
                                                                        <div data-bn-type="text" class="css-vspdms">
                                                                            Tên tài khoản
                                                                        </div>
                                                                    </div>
                                                                    <div class="css-1gmq84w">
                                                                        <div data-bn-type="text" class="css-6uwbzv"
                                                                            id="buy-account-name" data-copy-target="buy-account-name">
                                                                            {{ $data['account_name'] }}</div><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            id="C2CorderDetail_btn_copy_paymentItem"
                                                                            class="css-1g6lkvi" data-action="copy"
                                                                            data-target="buy-account-name"
                                                                            style="vertical-align: -6px; cursor: pointer;">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="css-164229y">
                                                                    <div class="css-10nf7hq">
                                                                        <div data-bn-type="text" class="css-vspdms">Số tài khoản</div>
                                                                    </div>
                                                                    <div class="css-1gmq84w">
                                                                        <div data-bn-type="text" class="css-6uwbzv"
                                                                            id="buy-account-number" data-copy-target="buy-account-number">
                                                                            {{ $data['bank_account'] }}</div><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            id="C2CorderDetail_btn_copy_paymentItem"
                                                                            class="css-1g6lkvi" data-action="copy"
                                                                            data-target="buy-account-number"
                                                                            style="vertical-align: -6px; cursor: pointer;">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="css-164229y">
                                                                    <div class="css-10nf7hq">
                                                                        <div data-bn-type="text" class="css-vspdms"
                                                                            id="buy">Tên ngân hàng</div>
                                                                    </div>
                                                                    <div class="css-1gmq84w">
                                                                        <div data-bn-type="text" class="css-6uwbzv"
                                                                            id="buy-bank-name" data-copy-target="buy-bank-name">
                                                                            Ngân Hàng Quân Đội </div><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            id="C2CorderDetail_btn_copy_paymentItem"
                                                                            class="css-1g6lkvi" data-action="copy"
                                                                            data-target="buy-bank-name"
                                                                            style="vertical-align: -6px; cursor: pointer;">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="css-4cffwv">
                                    <div class="css-1g9n4q8">
                                        <div class="css-1o6lork">3</div>
                                    </div>
                                    <div class="css-1tr0qpm">
                                        <div class="css-1arnokf">
                                            <div class="css-1hph6e4">
                                                <div class="css-uliqdc">
                                                    <div data-bn-type="text" class="css-4q9gwc">Thông báo cho người mua</div>
                                                    <div class="css-1w1kjhg">
                                                        <div data-bn-type="text" class="css-spxc6d">Sau khi chuyển tiền, vui lòng đợi hệ thống xác nhận giao dịch..
                                                            <div class="css-1f9551p"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                    fill="none" class="css-1pp0nin">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                                                        fill="currentColor"></path>
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @if (!\Carbon\Carbon::now()->greaterThan($data['expired_in']) && false)
                                            <div class="css-ygbf2l">
                                                <button id="transfer-handle-buy-test" data-status="{{ $data['status'] }}" data-bn-type="button" id="C2COrderDetail_btn_transferred" class=" css-1htc24x">
                                                    <span class="verify-status">
                                                        @php
                                                            $statuses = \App\Models\Transaction::getStatues();
                                                            echo 'Trạng thái: '.$statuses[$data['status']];
                                                        @endphp
                                                    </span>
                                                </button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
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
        var intervalCheckBanking;
        <?php if($data['status'] == 2 || $data['status'] == 0):?>
            setInterval(checkBankingStatus, 5000);
            intervalCheckBanking = setInterval(checkBankingStatus, 10000); //30000 MS == 30 seconds
        <?php endif;?>

        @if (!\Carbon\Carbon::now()->greaterThan($data['expired_in']))
            let endTime = "{{ $data['expired_in'] }}";
            startTimer(endTime);
        @endif

        $('#transfer-handle-buy').on('click',function(){
            const status = $(this).data('status');
            let task = '';
            switch (status) {
                case 0:
                    task = 'da_chuyen_tien'
                    break;
                default:
                    break;
            }
            const uuid = @json($data['uuid']);
            $.ajax({
                method: 'post',
                url: @json(route('check-banking')),
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    uuid,
                    task
                },
                success: function(response) {
                    if( response.reload ){
                        window.location.reload();
                    }
                }
            })
        })

        function checkBankingStatus() {
            const uuid = @json($data['uuid']);
            $.ajax({
                method: 'post',
                url: @json(route('check-banking')),
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    uuid
                },
                success: function(response) {
                    $('.verify-status').text(response.message);
                    if(response.status == 1){
                        $('.verify-status').text(response.message);
                        $('#final-status').show();
                        clearInterval(intervalCheckBanking)
                        window.location.reload();
                    }
                }
            })
        }


    </script>
@endsection
