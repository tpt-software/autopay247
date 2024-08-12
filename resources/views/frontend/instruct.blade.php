@extends('frontend.layouts.main')
@section('content')
<section class="trusted-exchange dark-mode-background max-wrapper std-top-space">
    <div class="max-wrapper__content">
        <div class="trusted-exchange__title">
            <div>
                <h1 class="std-title theme--text title-info-instruct">HƯỚNG DẪN MUA BÁN USDT, BTC, BNB</h1>
                <p class="std-subtitle theme--text-light title-info-instruct">AUTOPAY247.com là hệ thống đóng bảo hiểm
                    giao dịch lớn nhất
                    trên diễn đàn MMO4ME tại Việt Nam.

                </p>
            </div>

        </div>
        <div class="trusted-exchange__title">
            <div>
                <div class="trusted-exchange__content--card">
                    <div class="trusted-exchange__content--card__caps">
                        <h2 class="theme--text">BƯỚC 1: CHỌN MUA HOẶC BÁN HOẶC TRAO ĐỔI ĐỂ THỰC HIỆN GIAO DỊCH</h2>
                        <p class="theme--text-light"></p>
                        <div>
                            <img class="m-5 p-5" src="{{ asset('/assets/images/instruct/select method.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <hr class='mb-5'>
                <div class="trusted-exchange__content--card">
                    <div class="trusted-exchange__content--card__caps">
                        <h2 class="theme--text">BƯỚC 2: KIỂM TRA TÀI KHOẢN</h2>
                        <p class="theme--text-light"></p>
                        <div>
                            <img class="m-5 p-5" src="{{ asset('/assets/images/instruct/verify account 2.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <hr class='mb-5'>
                <div class="trusted-exchange__content--card">
                    <div class="trusted-exchange__content--card__caps">
                        <h2 class="theme--text">BƯỚC 3: CHỌN PHƯƠNG THỨC XÁC MINH</h2>
                        <p class="theme--text-light"></p>
                        <div>
                            <img class="m-5 p-5" src="{{ asset('/assets/images/instruct/verify account 3.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <hr class='mb-5'>
                <div class="trusted-exchange__content--card">
                    <div class="trusted-exchange__content--card__caps">
                        <h2 class="theme--text">BƯỚC 4: ĐIỀN ĐẦY ĐỦ THÔNG TIN</h2>
                        <p class="theme--text-light">Lưu ý : Tài khoản chưa xác minh không thể bán được</p>
                        <div class='d-flex justify-content-center align-items-center'>
                            <div class='rows d-flex justify-content-center align-items-center'>
                                <div class="col-6">
                                    <img class="m-5 p-5" src="{{ asset('/assets/images/instruct/buy.png') }}" alt="">
                                </div>
                                <div class="col-6">
                                    <img class="m-5 p-5" src="{{ asset('/assets/images/instruct/sell.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class='mb-5'>
                <div class="trusted-exchange__content--card">
                    <div class="trusted-exchange__content--card__caps">
                        <h2 class="theme--text">CHÚ THÍCH: CÁC THÔNG TIN VÀ LỰA CHỌN CẦN LƯU Ý KHI THỰC HIỆN
                        </h2>
                        <div class="d-flex">
                            <div class="m-5">
                                <p class="theme--text-light">(1) Thông tin chi tiết số tiền VND bạn thanh toán
                                    hoặc bạn
                                    nhận
                                    được:</p>
                                <img src="{{ asset('/assets/images/instruct/info transaction.png') }}" alt="">
                            </div>
                            <div class="m-5">
                                <p class="theme--text-light">(2) Lựa chọn đồng tiền muốn mua</p>
                                <img src="{{ asset('/assets/images/instruct/select coin.png') }}" alt="">
                            </div>
                            <div class="m-5">
                                <p class="theme--text-light">(3) Mức phí giao dịch được áp dụng</p>
                                <img src="{{ asset('/assets/images/instruct/infor account.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class='mb-5'>
                <div class="trusted-exchange__content--card">
                    <div class="trusted-exchange__content--card__caps">
                        <h2 class="theme--text">BƯỚC 5 : THỰC HIỆN GIAO DỊCH</h2>
                        <p class="theme--text-light"></p>
                        <div class='d-flex justify-content-center align-items-center'>
                            <img class="m-5 p-5" src="{{ asset('/assets/images/instruct/start transaction.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <hr class='mb-5'>
                <div class="trusted-exchange__content--card">
                    <div class="trusted-exchange__content--card__caps">
                        <h2 class="theme--text">BƯỚC 6 : KIỂM TRA THÔNG TIN GIAO DỊCH</h2>
                        <p class="theme--text-light">Trong vòng 15 phút nếu không thao tác sẽ <strong>Hủy Lệnh</strong>
                        </p>
                        <p class="theme--text-light">Sau khi chuyển khoản, nhấn <strong>Xác nhận( Đã chuyển
                                )</strong>
                            để tạo giao dịch</p>
                        <div class='d-flex justify-content-center align-items-center'>
                            <img class="m-5 p-5" src="{{ asset('/assets/images/instruct/verify info.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <hr class='mb-5'>
                <div class="trusted-exchange__content--card">
                    <div class="trusted-exchange__content--card__caps">
                        <h2 class="theme--text">GIAO DỊCH THÀNH CÔNG (Sau khi bạn chuyển tiền hệ thống tự động
                            hoàn
                            thành 10s)</h2>
                        <div class='rows d-flex justify-content-center align-items-center'>
                            <div class="col-6">
                                <img class="m-5 p-5" src="{{ asset('/assets/images/instruct/verify info 2.png') }}" alt="">
                            </div>
                            <div class="col-6">
                                <img class="m-5 p-5" src="{{ asset('/assets/images/instruct/Success.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection