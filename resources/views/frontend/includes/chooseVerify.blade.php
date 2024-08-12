<div class="modal fade" id="chooseVerify" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog dialog-choose-verify">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="staticBackdropLabel">{{ __('verify.choose_verify') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-body-choose-verify">
                <input type="radio" checked id="bank-verify" name="fav_language" value="">
                <label class="bank-verify" for="bank-verify">Xác minh bằng STK ngân hàng (Miễn phí)</label><br>

                {{-- <input type="radio" id="id-verify" name="fav_language" value="{{ route('verify-cccd') }}">
                <label class="bank-verify" for="id-verify">Xác minh bằng CCCD/CMND (Miễn phí)</label><br> --}}

                <input type="radio" id="no-verify" name="fav_language" value="{{ route('transaction') }}">
                <label class="bank-verify" for="no-verify">Không xác minh (Phí 3%)</label><br>
            </div>
            <div class="modal-footer">
                <button type="button" id="continue-button" class="btn btn-outline-secondary btn-verify">Tiếp
                    tục</button>
            </div>

        </div>
    </div>
</div>