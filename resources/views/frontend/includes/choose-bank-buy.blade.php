<div class="choose-bank-buy" style="display:none;">
    <label for="30304681704965607424" class="css-y6mvi3">Chọn loại Ngân hàng
    và nhập STK của bạn:
    </label>
    <div class="input-group mb-3 css-18c7jg verify-check">
        <select id="name-bank-buy" name="bank_name" class="name-bank name-bank-buy bank_id select2">
            @foreach ($banks as $bank)
            <option value="{{ $bank['bin'] }}" data-name="{{ $bank['shortName'] }}">
                {{ $bank['shortName'] }}
            </option>
            @endforeach
        </select>
        <input type="text" class="form-control bank_number" placeholder="Nhập số tài khoản ngân hàng của bạn..."
            name="bank_number" id="bank_number">
        <button class="btn btn-outline-secondary submit-bank" type="button" id="inputGroupFileAddon04">Kiểm
        tra</button>
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
@if($verified)
<div class="choose-bank">
    <label for="30304681704965607424" class="css-y6mvi3">Thông tin
    Ngân hàng của bạn:
    </label>
    <div class="input-group mb-3 css-18c7jg">
        <span class="enter-bank">
        <span class="account-number theme--text">{{ @$verified->account_number }}</span>
        <span class="account-name theme--text">{{ @$verified->account_name }}</span>
        <span class="bank-full-name theme--text">{{ @$verified->bank_name }}</span>
        </span>
    </div>
</div>
@endif
