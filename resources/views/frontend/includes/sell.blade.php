<div id="sell"
    class="mt-[-20px] px-[16px] md:px-[28px] pt-[24px] pb-0 md:pb-[16px] bg-bg1 dark-mode-background">
    <form action="{{ route('transfer.sell') }}" method="post">
        @csrf
        <input type="hidden" name="user_uuid" value="{{ session()->get('verifyItem')?->uuid }}">
        
        <div
            class="w-full amount-sell-get bg-bg3 md:bg-bg1 rounded-[12px] p-[10px] border border-solid border-line hover:border-primaryHover">
            <div class="bn-flex text-t-primary text-[14px] font-[400] leading-[20px] justify-between items-center">
                Bán
            </div>
            <div class="bn-flex flex-1 mt-[4px] items-center">
                <div class="bn-flex flex-1">
                    <input data-cy="input-crypto-amount-sell " placeholder="0" id="input-fiat-amount-sell" 
                        name="crypto_amount_sell"
                        type="number"
                        min="3"
                        max="10000"
                        step="1"
                        required
                        autocomplete="off"
                        class="w-full h-[32px] text-[20px] md:text-[24px] outline-none leading-[28px] md:leading-[32px] font-[500] text-t-primary bg-bg3 md:bg-bg1 placeholder:text-iconNormal focus:outline-none active:outline-none "
                        value="">
                </div>
                <div class="bn-flex bg-bg3 md:bg-bg1 justify-center items-center cursor-pointer w-[97px]">
                    <div class="ml-[8px] text-t-primary text-[16px] font-[500]" data-cy="select-crypto-sell">
                        <select class="js-example-basic-single-sell" id="crypto-select-sell"
                             name="state_sell">
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
        @error('crypto_amount_sell')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="text-success" id="noti-infor-sell" style="display:none;"></div>

        <div
            class="w-full bg-bg3 md:bg-bg1 amount-sell-vnd rounded-[12px] p-[10px] border border-solid border-line hover:border-primaryHover custom-mt">
            <div class="bn-flex text-t-primary text-[14px] font-[400] leading-[20px] justify-between items-center">
                Nhận
            </div>
            <div class="bn-flex flex-1 mt-[4px] items-center">
                <div class="bn-flex flex-1">
                    <input id="amount-sell" data-action="format-money" data-display-target="#display-sell"
                        placeholder="0" name="amount_sell"
                        readonly
                        class=" w-full h-[32px] text-[20px] md:text-[24px] outline-none leading-[28px] md:leading-[32px] font-[500] text-t-primary bg-bg3 md:bg-bg1 placeholder:text-iconNormal focus:outline-none active:outline-none"
                        value="{{ old('amount_sell') }}">
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
                id="error-message-sell"></div>
        </div>
        <div id="error-amount_sell">
            @error('amount_sell')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <strong id="display-sell" class="display-money text-success"></strong>
        <div class="mt-[12px]"></div>
        @include('frontend.includes.choose-bank-sell')

        <div class="text-danger fs-4" id="noti-price-sell" style="display:none;"></div>
        <div class="css-ivebmu row">
            <div data-bn-type="text" class="css-1z06va3 col-12">
                <div class="css-geecdi d-flex">
                    <span class="css-12cl38p theme--text">Giá
                        ước tính</span>
                    <div class="css-k6nsss">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="css-1ljlsho">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 21a9 9 0 100-18 9 9 0 000 18zM10.75 8.5V6h2.5v2.5h-2.5zm0 9.5v-7h2.5v7h-2.5z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                </div>
                <div data-bn-type="text" class="css-6hm6tl theme--text" id="estimated-price-sell">
                </div>
                <input type="hidden" class="form-control" name="estimated_price_input_sell"
                    id="estimated-price-input-sell" value="">
            </div>
        </div>
        <div class="main-container__bottom">
            <div class="w-full " style=" font-size: 16px; color: red;">Vui lòng kiểm tra tài khoản trước khi bán</div>
            <div class="bn-tooltips-wrap w-full ">
                <div class="bn-tooltips-ele">
                    <button disabled type="submit" id="submit-bank-sell"  class="bn-button bn-button__primary data-size-huge w-full mt-[68px] md:mt-[16px] submit-bank-sell theme--text">
                        Bán
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
