@extends('frontend.layouts.main')
@section('content')
    <div class="max-wrapper dark-mode-background crypto-portfolio">
        <div class="max-wrapper__content">
            <div class="crypto-portfolio__mobile-title">
                <h1 class="theme--text">XÁC MINH TÀI KHOẢN TẠI AUTOPAY247
                </h1>
                <p class="theme--text-light">Xác minh tài khoản một lần duy nhất và dùng mãi mãi</p>
            </div>

            <div class="crypto-portfolio__box">
                <div class="crypto-portfolio__box--main">
                    <div class="crypto-portfolio__box--main__title">
                        <h1 class="std-title theme--text">XÁC MINH TÀI KHOẢN TẠI AUTOPAY247
                        </h1>
                        <p class="theme--text-light">Xác minh tài khoản một lần duy nhất và dùng mãi mãi</p>
                    </div>
                    <div class="css-efn41d">
                        <label for="30304681704965607424" class="css-y6mvi3">Chọn loại Ngân hàng và nhập STK của bạn:
                        </label>
                        <div class="input-group mb-3 css-18c7jg verify-check">
                            <select name="bank_name" class="name-bank-buy select2">
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank['bin'] }}" data-name="{{ $bank['shortName'] }}">
                                        {{ $bank['shortName'] }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" placeholder="Nhập số tài khoản ngân hàng của bạn..."
                                name="bank_number">
                            <button class="btn btn-outline-secondary submit-bank" type="button"
                                id="inputGroupFileAddon04">Kiểm tra</button>
                        </div>
                        <div id="no-result" class="d-none text-t-disabled text-[14px] font-[400] mt-[12px]">
                            Số tài khoản không hợp lệ
                        </div>
                        <div id="verified" class="d-none text-t-disabled text-[14px] font-[400] mt-[12px]">
                            Tài khoản đã xác minh
                        </div>
                        <div id="err-bank" class="d-none text-t-disabled text-[14px] font-[400] mt-[12px]">
                            Số tài khoản không hợp lệ
                        </div>
                    </div>
                    <div class="crypto-portfolio__box--main__content">
                        <div class="crypto-portfolio__box--main__content--card">
                            <div class="crypto-portfolio__box--main__content--card__image">
                                <img src="{{ asset('assets/images/kyc.svg') }}" alt="Verify your identity" />
                            </div>
                            <div class="crypto-portfolio__box--main__content--card__caption">
                                <p class="theme--text-light">
                                    Việc xác minh tài khoản nhằm đảm bảo an toàn và quyền lợi của bạn, để tránh bị người
                                    khác lợi dụng khi giao dịch trên hệ thống.
                                </p>
                            </div>
                        </div>
                        <div class="crypto-portfolio__box--main__content--card">
                            <div class="crypto-portfolio__box--main__content--card__image">
                                <img src="{{ asset('assets/images/user.svg') }}" alt="Verify your identity" />
                            </div>
                            <div class="crypto-portfolio__box--main__content--card__caption">
                                <p class="theme--text-light">
                                    Vì vậy bạn vui lòng hãy thực hiện việc xác minh trước khi giao dịch. Chúng tôi đánh giá
                                    cao việc bạn cùng chúng tôi bảo vệ tối đa quyền lợi của cả hai bên.
                                </p>
                            </div>
                        </div>
                        <div class="crypto-portfolio__box--main__content--card">
                            <div class="crypto-portfolio__box--main__content--card__image">
                                <img src="{{ asset('assets/images/spot.svg') }}" alt="Verify your identity" />
                            </div>
                            <div class="crypto-portfolio__box--main__content--card__caption">
                                <p class="theme--text-light">
                                    Toàn bộ thông tin của bạn sẽ được bảo mật tuyệt đối theo đúng quy định pháp luật.

                                </p>
                            </div>
                        </div>
                        <div id="verify-action">

                            <button class="btn btn-outline-secondary btn-verify d-none mt-4" data-bs-toggle="modal"
                                data-bs-target="#chooseVerify" id="verify-button">Xác minh</button>
                            <a class="btn btn-outline-secondary btn-verify d-none mt-4" id="payment-button"
                                href="{{ route('transaction') }}">Tiếp tục
                                giao
                                dịch</a>
                        </div>
                    </div>
                </div>
                <div class="bellow-verify">
                    <div class="crypto-portfolio__box--image d-none" id="bank-result">
                        <div class="pc:max-w-[936px] w-full">
                            <div class="mt-4">
                                <div class="bn-flex items-center pc:items-start mb-2">
                                    <div class="bn-flex relative"><img alt="usr avatar"
                                            src="{{ asset('assets/images/default-avatar.png') }}"
                                            class="object-cover cursor-pointer flex items-center pc:items-start  w-[56px] h-[56px] pc:w-[64px] pc:h-[64px] rounded-[10px]">
                                        <div
                                            class="bn-flex mobile:hidden w-[56px] h-[56px] pc:w-[64px] pc:h-[64px] rounded-[10px] absolute top-0 flex items-center justify-center cursor-pointer hover:bg-opacity-80 hover:bg-[#181A20] group">
                                        </div>
                                    </div>
                                    <div class="bn-flex flex-col pc:pl-6 pl-4">
                                        <div
                                            class="text-iconNormal pc:mb-3 mb-2  line-clamp-1 mx-w-[171px] overflow-hidden truncate whitespace-normal font-semibold leading-[24px] break-all">
                                            Thông tin tài khoản (<span class="verify-status"></span>)
                                        </div>

                                    </div>
                                </div>
                                <div class="bn-flex info-user flex-wrap pc:flex-row flex-col hidden pc:flex mt-4">
                                    <div
                                        class="bn-flex pc:flex-col pc:mr-[40px] pc:justify-normal pc:min-h-[44px] pb-4 mr-0 flex-row justify-between text-sm leading-5">
                                        <div class="bn-flex fz-12 text-iconNormal pc:mb-1 mb-0">Số tài khoản: </div>
                                        <div class="bn-flex">
                                            <div class="bn-flex items-center">
                                                <div class="fz-12 text-iconNormal" id="account-number">531755792</div>
                                                <div class="css-1f9551p"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="none"
                                                        class="text-iconNormal ml-0 flex cursor-pointer css-woosrk">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                            fill="currentColor">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="bn-flex pc:flex-col pc:mr-[40px] pc:justify-normal pc:min-h-[44px] pb-4 mr-0 flex-row justify-between text-sm leading-5">
                                        <div class="bn-flex text-iconNormal pc:mb-1 mb-0 fz-12">Tên tài khoản: </div>
                                        <div class="bn-flex">
                                            <div class="bn-flex items-center">
                                                <div class="fz-12 text-iconNormal" id="account-name">TLT</div>
                                                <div class="css-1f9551p"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="none"
                                                        class="text-iconNormal ml-0 flex cursor-pointer css-woosrk">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                            fill="currentColor">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="bn-flex pc:flex-col pc:mr-[40px] pc:justify-normal pc:min-h-[44px] pb-4 mr-0 flex-row justify-between text-sm leading-5">
                                        <div class="bn-flex text-iconNormal pc:mb-1 mb-0 fz-12">Ngân hàng: </div>
                                        <div class="bn-flex">
                                            <div class="bn-flex items-center">
                                                <div class="fz-12 text-iconNormal" id="bank-name">ACB</div>
                                                <div class="css-1f9551p"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="none"
                                                        class="text-iconNormal ml-0 flex cursor-pointer css-woosrk">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                            fill="currentColor">
                                                        </path>
                                                    </svg></div>
                                            </div>
                                        </div>
                                    </div>
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
                                                <div data-bn-type="text" class=" css-1ld3mhe label-history theme--text">
                                                    Xác minh tài
                                                    khoản để có mức phí giao dịch tốt nhất: </div>
                                            </div>
                                        </div>

                                    </span><span id="top_crypto_table-1-BTC_USDT" class="css-sujoqu" href="">

                                        <div class="css-fiavot">
                                            <div class="css-10nf7hq">
                                                <div data-bn-type="text" class=" css-1ld3mhe theme--text">Mua không cần
                                                    xác minh</div>
                                            </div>
                                        </div>
                                        <div class="css-ej4c9n">
                                            <div data-bn-type="text" style="direction:ltr" class="start">Phí giao dịch:
                                                3%</div>
                                        </div>
                                    </span>
                                    <span id="top_crypto_table-2-USDT" class="css-sujoqu" href="">

                                        <div class="css-fiavot">
                                            <div class="css-10nf7hq">
                                                <div data-bn-type="text" class="theme--text">Xác minh (KYC) bằng <br> stk
                                                    ngân
                                                    hàng giao dịch</div>
                                            </div>
                                        </div>
                                        <div class="css-ej4c9n">
                                            <div data-bn-type="text" style="direction:ltr" class="start">Phí giao dịch:
                                                miễn phí</div>
                                        </div>
                                    {{-- </span><span id="top_crypto_table-3-BNB_USDT" class="css-sujoqu"
                                        href="https://www.binance.com/en/price/bnb">

                                        <div class="css-fiavot">
                                            <div class="css-10nf7hq">
                                                <div data-bn-type="text" class=" css-1ld3mhe theme--text">Xác minh (KYC)
                                                    bằng CCCD
                                                </div>
                                            </div>
                                        </div>
                                        <div class="css-ej4c9n">
                                            <div data-bn-type="text" style="direction:ltr" class="start">Phí giao dịch:
                                                miễn phí</div>
                                        </div>
                                    </span> --}}

                                </div>
                            </div>
                        </div>
                        <div class="css-75g3nm dark-mode-background mt-2">
                            <div class="css-1qs8gjy">
                                <div class="css-16vu25q">
                                    <span id="top_crypto_table-2-USDT" class="css-sujoqu">

                                        <div class="css-fiavot">
                                            <div class="css-10nf7hq">
                                                <div data-bn-type="text" class=" css-1ld3mhe label-history theme--text">
                                                    Lịch sử giao dịch khách hàng: </div>
                                            </div>
                                        </div>

                                    </span>
                                    <div id="history-fake">
                                        @php
                                            $verifyItem = session()->get('verifyItem');
                                            if ($verifyItem) {
                                                $verifyTransactions = session()->get('verifyTransactions' . $verifyItem->id);
                                            }
                                        @endphp
                                        @if (isset($verifyTransactions))
                                            @foreach ($verifyTransactions as $key => $transaction)
                                                @php
                                                if($key == 5){
                                                    break;
                                                }
                                                @endphp
                                                <span id="top_crypto_table-1-BTC_USDT" class="css-sujoqu" href="">
                                                    <div class="css-fiavot">
                                                        <div>
                                                            <div data-bn-type="text" class="coinRow-coinPrice">
                                                                {{ $verifyItem->bank_name }} » mua
                                                                {{ $transaction->crypto_amount }}
                                                                {{ $transaction->state }}</div>
                                                            <div data-bn-type="text" class="time-history">
                                                                {{ \Carbon\Carbon::parse($transaction->updated_at)->format('H:i d/m/Y') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="css-ej4c9n">
                                                        <div data-bn-type="text" style="direction:ltr" class="start"> 5
                                                            ⭐</div>
                                                    </div>
                                                </span>
                                            @endforeach
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
    @include('frontend.includes.chooseVerify')
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var radios = document.querySelectorAll('input[name="fav_language"]');
            var selectedRoute = document.querySelector('input[name="fav_language"]:checked').value;

            radios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    selectedRoute = this.value;
                    // console.log(selectedRoute)
                });
            });

            document.getElementById('continue-button').addEventListener('click', function() {
                selectedRoute = document.querySelector('input[name="fav_language"]:checked').value;
                if (selectedRoute) {
                    window.location.href = selectedRoute;
                } else {
                    alert('Vui lòng chọn một tùy chọn');
                }
            });
        });

        // Xử lí lưu bank_name và bank_number ở local stogare
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy tham chiếu tới các phần tử trong DOM
            var bankNameSelect = document.querySelector('select[name="bank_name"]');
            var bankNumberInput = document.querySelector('input[name="bank_number"]');
            var submitButton = document.querySelector('.submit-bank');

            // Xử lý sự kiện click của nút "Kiểm tra"
            submitButton.addEventListener('click', function() {
                // Lấy giá trị bank_name và bank_number
                var bankName = bankNameSelect.value;
                var bankNumber = bankNumberInput.value;

                // Lưu giá trị vào localStorage
                localStorage.setItem('bank_name', bankName);
                localStorage.setItem('bank_number', bankNumber);
            });
        });
    </script>
@endsection
