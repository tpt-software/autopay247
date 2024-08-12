<div id="buy"
    class="mt-[-20px] rounded-[16px] px-[16px] md:px-[28px] pt-[24px] pb-0 md:pb-[16px] bg-bg1 dark-mode-background">
    <form action="{{ route('transfer.buy', $uuid) }}" method="post">
        @csrf
        <input type="hidden" name="user_uuid" value="{{ session()->get('verifyItem')?->uuid }}">

        <div
            class="w-full bg-bg3 md:bg-bg1 amount-buy-get rounded-[12px] p-[10px] border border-solid border-line hover:border-primaryHover">
            <div class="bn-flex text-t-primary text-[14px] font-[400] leading-[20px] justify-between items-center">
                Mua
            </div>
            <div class="bn-flex flex-1 mt-[4px] items-center">
                <div class="bn-flex flex-1"><input 
                        type="number" 
                        data-cy="input-crypto-amount" placeholder="0"
                        id="input-fiat-amount" name="crypto_amount" 
                        min="10" max="10000"
                        step="1"
                        required
                        autocomplete="off"
                        class="w-full h-[32px] text-[20px] md:text-[24px] outline-none leading-[28px] md:leading-[32px] font-[500] text-t-primary bg-bg3 md:bg-bg1 placeholder:text-iconNormal focus:outline-none active:outline-none maskMoney"
                        value=""></div>
                <div class="bn-flex bg-bg3 md:bg-bg1 justify-center items-center cursor-pointer w-[97px]">
                    <div class="ml-[8px] text-t-primary text-[16px] font-[500]" data-cy="select-crypto">
                        <select class="js-example-basic-single" id="crypto-select" 
                            name="state">
                            <option value="USDT" data-image="{{ asset('assets/images/usdt.png') }}">
                                USDT
                            </option>
                            <option value="BTC" data-image="{{ asset('assets/images/btc.png') }}">
                                BTC
                            </option>
                            <option value="BNB" data-image="{{ asset('assets/images/bnb.png') }}">
                                BNB
                            </option>
                        </select>
                    </div>
                    <svg class="bn-svg text-[20px] ml-[8px] text-t-third" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.5 8.49v2.25L12 15.51l-4.5-4.77V8.49h9z" fill="currentColor"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div id="error-amount_buy">
            @error('crypto_amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div
            class="w-full bg-bg3 amount-buy-vnd md:bg-bg1 rounded-[12px] p-[10px] border border-solid border-line hover:border-primaryHover custom-mt">
            <div class="bn-flex text-t-primary text-[14px] font-[400] leading-[20px] justify-between items-center">
                Số tiền cần thanh toán
            </div>
            <div class="bn-flex flex-1 mt-[4px] items-center">
                <div class="bn-flex flex-1">
                    <input type="text" id="amount-buy" data-action="format-money" data-display-target="#display-buy"
                        placeholder="0" name="amount_buy"
                        class=" @error('amount_buy') is-invalid @enderror w-full h-[32px] text-[20px] md:text-[24px] outline-none leading-[28px] md:leading-[32px] font-[500] text-t-primary bg-bg3 md:bg-bg1 placeholder:text-iconNormal focus:outline-none active:outline-none"
                        value="{{ old('amount_buy') }}" readonly>
                </div>
                <div class="bn-flex bg-bg3 md:bg-bg1 justify-center items-center cursor-pointer w-[115px]">
                    <div class="bn-flex bg-bg3 md:bg-bg1 justify-center items-center cursor-pointer w-[97px]">
                        <img src="{{ asset('assets/images/vnd.png') }}" class="css-103q12f w-[20px]">
                        <div class="ml-[8px] text-t-primary text-[16px] font-[500]" data-cy="select-fiat">VND
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-[4px] text-error text-[12px] md:text-[14px] font-[400] leading-[16px] md:leading-[20px]"
                id="error-message"></div>
        </div>

        <div class="text-success" id="noti-infor-buy"></div>
        @error('amount_buy')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @include('frontend.includes.choose-bank-buy')

        <div class="text-danger" id="noti-price-buy"></div>
        <div class="choose-network">
            <label for="30304681704965607424" class="css-y6mvi3">Chọn mạng
                lưới
                (<span class="note-network">Vui lòng đảm bảo nền tảng nhận của
                    bạn
                    hỗ trợ token này và mạng bạn đang rút.
                    Nếu bạn không chắc, hãy kiểm tra trước với nền tảng
                    nhận.</span>)
            </label>
            <div class="input-group mb-3 css-18c7jg">
                <select class="form-select network" id="network-select" name="network_select">
                    @foreach($cryptoNetworks as $type => $networks)
                    <optgroup data-type="{{ $type }}" label="{{ $type }}" {{ $type != 'USDT' ? 'disabled' : '' }}>
                        @foreach($networks as $network)
                            @php
                            $name = $network['name'];
                            $value = $network['value'];
                            $processingTime = $network['processingTime'];
                            $transactionFee = $network['transactionFee'];
                            @endphp
                            <option data-fee="{{ $transactionFee }}" data-type="{{ $type }}" value="{{ $value }}">@php echo "$name - Thời gian xử lý giao dịch ≈ $processingTime, Fee ≈ $transactionFee $type" @endphp</option>
                        @endforeach 
                    </optgroup>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="enter-address">
            <label for="30304681704965607424" class="css-y6mvi3 theme--text">Nhập Địa chỉ</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control enter-bank-buy @error('address_wallet') is-invalid @enderror"
                    name="address_wallet" placeholder="Nhập Địa chỉ..." required>
            </div>
            @error('address_wallet')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="css-ivebmu row">
            <div data-bn-type="text" class="css-1z06va3 col-12">
                <div class="css-geecdi d-flex">
                    <span class="css-12cl38p theme--text">Giá ước tính</span>
                    <div class="css-k6nsss">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="css-1ljlsho">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                </div>
                <div data-bn-type="text" class="css-6hm6tl theme--text" id="estimated-price"></div>
                <input type="hidden" class="form-control" name="estimated_price_input" id="estimated-price-input"
                    value="">
            </div>
        </div>
        <div class="main-container__bottom ">
            <div class="bn-tooltips-wrap w-full ">
                <div class="bn-tooltips-ele">
                    <button id="submit-bank-buy"  type="submit"
                        class="bn-button bn-button__primary data-size-huge w-full md:mt-[16px] submit-bank">
                        Mua
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
