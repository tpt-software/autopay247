<div class="choose-bank-sell">
    <label for="30304681704965607424" class="css-y6mvi3">Chọn loại Ngân hàng
    và nhập STK của bạn:
    </label>
    <div class="input-group mb-3 css-18c7jg verify-check">
        <select id="name-bank-sell" name="bank_name" class="name-bank name-bank-sell bank_id select2">
            @foreach ($banks as $bank)
            <option value="{{ $bank['bin'] }}" data-name="{{ $bank['shortName'] }}">
                {{ $bank['shortName'] }}
            </option>
            @endforeach
        </select>
        <input type="text" class="form-control bank_number-sell" placeholder="Nhập số tài khoản ngân hàng của bạn..."
            name="bank_number">
        <button class="btn btn-outline-secondary submit-bank" type="button" id="verify-bank-number-sell">Kiểm
        tra</button>
    </div>
    @error('bank_number')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div id="no-result-sell" class="d-none text-t-disabled text-[14px] font-[400] mt-[12px]">
        Số tài khoản không hợp lệ
    </div>
    <div id="verified-sell" class="d-none text-t-disabled text-[14px] font-[400] mt-[12px]">
        Tài khoản hợp lệ
    </div>
    <div id="err-bank-sell" class="d-none text-t-disabled text-[14px] font-[400] mt-[12px]">
        Số tài khoản không hợp lệ
    </div>
</div>
<div class="choose-bank-sell choose-bank-sell-info" style="display:none">
    <label for="30304681704965607424" class="css-y6mvi3">Thông tin
    Ngân hàng của bạn:
    </label>
    <div class="input-group mb-3 css-18c7jg">
        <span class="enter-bank">
        <span class="account-number"></span>
        <span class="account-name"></span>
        <span class="bank-full-name"></span>
        </span>
    </div>
</div>