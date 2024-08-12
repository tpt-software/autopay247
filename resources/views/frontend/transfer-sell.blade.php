@extends('frontend.layouts.main')
@section('content')
<style>
    .css-vb7ksi {
        width: 100% !important;
    }
</style>
<main class="main-content css-vurnku">
   
    @if (session('success'))
    <div class="css-ny4q9y" id="final-status">
        <div class="text-center p-4">
            <h1> {{ session('success') }} </h1>
        </div>
    </div>
    @else
    <div class="css-ny4q9y" id="final-status">
        <div class="text-center p-4">
            @if( $order_status == 1 )
            <h1> Đơn hàng đã hoàn thành </h1>
            @endif
            @if( $order_status == 2 )
            <h1> Hệ thống đang xử lý </h1>
            @endif
        </div>
    </div>
    @endif
    <div class="css-g2mx2m">
        <div class="css-1n1my9o">
            <div class="css-1rql8v5">
                @if(@$order_status != 1)
                <div class="css-10nf7hq">
                    <div data-bn-type="text" class="css-l9jms3 theme--text">Đã đặt lệnh</div>
                </div>
                <div class="css-161fc19">
                    <div data-bn-type="text" class="css-rt4opq theme--text">Thanh toán cho người mua trong vòng
                        <div class="css-1f9551p">
                            <div class="css-1k5ro4k">
                                <div class="css-yw9f4w">
                                    <div data-bn-type="text" class="minute-tens css-niwjst"></div>
                                </div>
                                <div class="css-yw9f4w">
                                    <div data-bn-type="text" class="minute-ones css-niwjst"></div>
                                </div>:
                                <div class="css-yw9f4w">
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
            <div class="css-18pto7p step2-rows">
                <div class="css-10nf7hq">
                    <div data-bn-type="text" class="css-fhtmef theme--text">Số lệnh</div>
                    <div data-bn-type="text" class="css-3my46j theme--text">{{ $uuid }}</div>
                    
                </div>
                <div class="css-kah20n">
                    <div data-bn-type="text" class="css-fhtmef theme--text">Thời gian tạo</div>
                    <div data-bn-type="text" class="css-3my46j theme--text" id="current-date-time">
                    {{ \Carbon\Carbon::parse($order_created)->setTimezone('Asia/Ho_Chi_Minh')->format('H:i:s d/m/Y') }}    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif -->
    <form action="{{ route('admin.order.store') }}" method="post">
        @csrf
        <div class="css-ny4q9y dark-mode-background">
            <div class="css-d49pd">
                <div class="css-1c7ksm9">
                    <div class="css-hkht7k">
                        <div class="css-hkg8yb">
                            <div id="order-detail-container" class="css-ufg8u0">
                                <div class="css-4cffwv">
                                    <div class="css-1g9n4q8">
                                        <div class="css-1o6lork theme--text">1</div>
                                        <div class="css-1afiqm5"></div>
                                    </div>
                                    <div class="css-1tr0qpm">
                                        <div class="css-12xnkhk">
                                            <div class="css-1ij6mzy">
                                                <div class="css-1wm8bgi">
                                                    <div data-bn-type="text" class="css-4q9gwc theme--text">Xác nhận
                                                        thông tin
                                                        lệnh</div>
                                                </div>
                                                <div role="button" id="C2COrderDetail_buyOrderInfo_btn_info"
                                                    class="css-me3g1k"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="none" class="css-1iztezc">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12.11 12.178L16 8.287l1.768 1.768-5.657 5.657-1.768-1.768-3.889-3.889 1.768-1.768 3.889 3.89z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="css-1n0o39o step1-rows">
                                                <div class="css-1xxc2ay">
                                                    <div data-bn-type="text" class="css-bwnouq"><span
                                                            class="css-12cl38p theme--text">Số lượng bán</span>
                                                        <div class="css-nbvh49">
                                                            <div class="css-vurnku">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="none" class="css-xku7ik">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-bn-type="text" class="css-vwvc5o theme--text"
                                                        style="line-height: 28px;color:red">
                                                        {{ $cryptoAmountSell ?? '' }} {{ $stateSell ?? '' }}
                                                    </div>
                                                    <input type="hidden" name="want_to_buy"
                                                        value="{{ $amountSell ?? '' }}">
                                                </div>
                                                <div class="css-1xxc2ay">
                                                    <div data-bn-type="text" class="css-16r0c6w theme--text">Giá</div>
                                                    <div data-bn-type="text" class="css-pze5kt theme--text"
                                                        style="direction: ltr;">
                                                        ₫ {{ number_format($priceSell ?? 0, 0, ',', '.') }}
                                                    </div>
                                                </div>
                                                <div class="css-1xxc2ay">
                                                    <div data-bn-type="text" class="css-16r0c6w theme--text">Số tiền
                                                        nhận được</div>
                                                    <div data-bn-type="text" class="css-pze5kt theme--text">
                                                        <div data-bn-type="text" class="css-vwvc5o theme--text"
                                                            style="line-height: 28px;">₫
                                                            {{ number_format($amountSell ?? 0, 0, ',', '.') }}
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="total_payment"
                                                        value="{{ $cryptoAmountSell ?? '' }}">
                                                    <input type="hidden" name="state_sell"
                                                        value="{{ $stateSell ?? '' }}">
                                                    <input type="hidden" name="type" value="2">
                                                    <input type="hidden" name="verify_id"
                                                        value="{{ $verify_id ?? '' }}">
                                                    <input type="hidden" name="status" value="0">
                                                    <input type="hidden" name="wallet_address"
                                                        value="{{ $info_coin['address'] ?? '' }}">
                                                    <input type="hidden" name="network" value="BEP20">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="css-4cffwv">
                                    <div class="css-1g9n4q8">
                                        <div class="css-1o6lork theme--text">2</div>
                                        <div class="css-1afiqm5"></div>
                                    </div>
                                    <div class="css-1tr0qpm">
                                        <div class="css-ot2ytd">
                                            <div data-bn-type="text" class="css-4q9gwc theme--text">Thanh toán</div>
                                            <div data-bn-type="text" class="css-1dmj7t7 theme--text">Chuyển tiền vào tài
                                                khoản
                                                của người mua được cung cấp bên dưới.<div class="css-1f9551p"><svg
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" class="css-1pp0nin">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                                            fill="currentColor"></path>
                                                    </svg></div>
                                            </div>
                                            @if (!\Carbon\Carbon::now()->greaterThan($expired_in))
                                            <div class="css-vb7ksi">
                                                <div class="css-qbxz06">
                                                    <div class="css-1gou3t8">
                                                        <div class="css-7aqo2m">
                                                            <div class="css-1x9ln48 dark-mode-background">
                                                                <div class="css-2tdjbu"></div>
                                                                <div data-bn-type="text"
                                                                    class="css-13ieqgy theme--text">Chuyển
                                                                    khoản coin</div>
                                                            </div>
                                                            <div class="qr-code-verify">
                                                                @if (isset($info_coin['image']))
                                                                <img src="{{ asset('storage/' . $info_coin['image']) }}"
                                                                    alt="qr code">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="css-1f5v8tq">
                                                        <div class="css-epiuoh">
                                                            <div class="css-164229y">
                                                                <div class="css-10nf7hq">
                                                                    <div data-bn-type="text"
                                                                        class="css-vspdms theme--text">Địa chỉ nhận</div>
                                                                    <div class="css-1f9551p">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            class="css-1kvlt27">
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                                                                fill="currentColor"></path>
                                                                        </svg>

                                                                    </div>
                                                                </div>
                                                                <div class="css-1gmq84w">
                                                                    <div data-copy-target="coin_address" data-bn-type="text" class="css-6uwbzv theme--text">
                                                                        {{ $info_coin['address'] ?? '' }}
                                                                    </div>
                                                                        
                                                                        <svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        id="C2CorderDetail_btn_copy_paymentItem"
                                                                        data-action="copy"
                                                                        data-target="coin_address"
                                                                        class="css-1g6lkvi"
                                                                        style="vertical-align: -6px; cursor: pointer;">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="css-164229y">
                                                                <div class="css-10nf7hq">
                                                                    <div data-bn-type="text"
                                                                        class="css-vspdms theme--text">Loại tài khoản
                                                                    </div>
                                                                </div>
                                                                <div class="css-1gmq84w">
                                                                    <div data-bn-type="text"
                                                                        class="css-6uwbzv theme--text">
                                                                        {{ $info_coin['coin_name'] ?? '' }}
                                                                        ({{ $info_coin['network_name'] ?? '' }})</div>
                                                                    <!-- <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        id="C2CorderDetail_btn_copy_paymentItem"
                                                                        data-action="copy"
                                                                        class="css-1g6lkvi"
                                                                        style="vertical-align: -6px; cursor: pointer;">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                                            fill="currentColor"></path>
                                                                    </svg> -->
                                                                </div>
                                                            </div>
                                                            <div class="css-164229y">
                                                                <div class="css-10nf7hq">
                                                                    <div data-bn-type="text"
                                                                        class="css-vspdms theme--text">Số lượng nhận</div>
                                                                </div>
                                                                <div class="css-1gmq84w">
                                                                    <div data-bn-type="text"
                                                                        class="css-6uwbzv theme--text">
                                                                        <span data-copy-target="cryptoAmountSell">{{ $cryptoAmountSell ?? '' }}</span> 
                                                                        {{ $stateSell ?? '' }}
                                                                    </div><svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        id="C2CorderDetail_btn_copy_paymentItem"
                                                                        data-action="copy"
                                                                        data-target="cryptoAmountSell"
                                                                        class="css-1g6lkvi"
                                                                        style="vertical-align: -6px; cursor: pointer;">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="css-164229y">
                                                                <div class="css-10nf7hq">
                                                                    <div data-bn-type="text"
                                                                        class="css-vspdms theme--text">Chú ý
                                                                    </div>
                                                                </div>
                                                                <div class="css-1gmq84w">
                                                                    <div data-bn-type="text"
                                                                        class="css-6uwbzv theme--text">Hãy kiểm tra lại thông tin trước khi xác nhận.
                                                                    </div>
                                                                    <!-- <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        id="C2CorderDetail_btn_copy_paymentItem"
                                                                        data-target="#coin_id"
                                                                        data-action="copy"
                                                                        class="css-1g6lkvi"
                                                                        style="vertical-align: -6px; cursor: pointer;">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                                            fill="currentColor"></path>
                                                                    </svg> -->
                                                                </div>
                                                            </div>

                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <h2>
                                                <strong>Đơn hàng đã hết hạn</strong>
                                            </h2>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="css-4cffwv">
                                    <div class="css-1g9n4q8">
                                        <div class="css-1o6lork theme--text">3</div>
                                    </div>
                                    <div class="css-1tr0qpm">
                                        <div class="css-1arnokf">
                                            <div class="css-1hph6e4">
                                                <div class="css-uliqdc">
                                                    <div data-bn-type="text" class="css-4q9gwc theme--text">Thông báo
                                                        cho người bán
                                                        </div>
                                                    <div class="css-1w1kjhg">
                                                        <div data-bn-type="text" class="css-spxc6d theme--text">Sau khi
                                                            chuyển
                                                            tiền, nhấp vào nút "Đã chuyển". Vui lòng đợi hệ thống xác nhận giao dịch
                                                            <div class="css-1f9551p"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" fill="none" class="css-1pp0nin">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                                                        fill="currentColor"></path>
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (!\Carbon\Carbon::now()->greaterThan($expired_in))
                                            <div class="css-ygbf2l">
                                                @if(@$order_status == 1)
                                                <p class=" css-1htc24x">
                                                    Đã được duyệt
                                                </p>
                                                @elseif(@$order_status  == 0)
                                                <button data-bn-type="submit" id="C2COrderDetail_btn_transferred"
                                                    class=" css-1htc24x">
                                                    Xác nhận (Đã chuyển)
                                                </button>
                                                @endif
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
    </form>
</main>

@endsection

<script>
//Gọi ajax 5s 1 lần
//order_id => $order_id
//order_created => $order_created
//Nếu order status 1 thì tắt disabled
</script>

@section('script')
    @if(@$order_status != '')
    <script>
        var order_status = '{{ $order_status }}';
        console.log('order_status',order_status);
        function checkOrderStatus() {
            $.ajax({
                method: 'get',
                url: '{{ route('admin.order.show',$order_id) }}',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        if (response.item.status == 1) {
                            $('.css-ygbf2l').html('<p class="css-1htc24x">Đã được duyệt</p>');
                            $('.css-ygbf2l').hide();
                            $('#final-status').show();
                            $('#final-status h1').html('Đã được duyệt');
                            window.location.reload();
                        }
                    }
                }
            })
        }

        window.onload = function() {
            if (order_status != 1) {
                checkOrderStatus();
                setInterval(() => {
                    checkOrderStatus();
                }, 5000);
            }
        };
    </script>
    @endif

    <script>
        @if (!\Carbon\Carbon::now()->greaterThan($expired_in))
            let endTime = "{{ $expired_in }}";
            if (order_status != 1) {
                startTimer(endTime);
            }
        @endif

        // $('#transfer-handle-sell').on('click',function(){
        //     const status = $(this).data('status');
        //     let task = '';
        //     switch (status) {
        //         case 0:
        //             task = 'da_chuyen_coin'
        //             break;
        //         default:
        //             break;
        //     }
        //     $.ajax({
        //         method: 'put',
        //         url: '{{ route('admin.order.show',$order_id) }}',
        //         data: {
        //             _token: $('meta[name="csrf-token"]').attr('content'),
        //             task
        //         },
        //         success: function(response) {
        //             if( response.reload ){
        //                 window.location.reload();
        //             }
        //         }
        //     })
        // })
    </script>
@endsection
