@extends('frontend.layouts.main')
@section('content')
<section class="trusted-exchange dark-mode-background max-wrapper std-top-space">
    <div class="max-wrapper__content">
        <div class="trusted-exchange__title">
            <div>
                <h1 class="std-title theme--text">BẢO HIỂM GIAO DỊCH 20000$</h1>
                <p class="std-subtitle theme--text-light">AUTOPAY247.com là hệ thống đóng bảo hiểm giao dịch lớn nhất
                    trên diễn đàn MMO4ME tại Việt Nam.</p>
                <p class="std-subtitle theme--text-light">Mọi giao dịch trao đổi trên site hoàn toàn được đảm bảo an
                    toàn và được bảo hiểm 100%.</br> Mọi vấn đề thắc mắc về bảo hiểm xin các bạn liên hệ Live chat
                    hoặc:</br><strong> Email hỗ trợ: support@autopay247.com </strong></p>
            </div>
        </div>
        <div class="trusted-exchange__content">
            <div>
                <div class="trusted-exchange__content--card">
                    <img src="{{ asset('assets/images/secure-asset.svg') }}" alt="unlock">
                    <div class="trusted-exchange__content--card__caps">
                        <h2 class="theme--text">CHAT ONLINE 24/24</h2>
                        <p class="theme--text-light">Để thuận tiện trong giao dịch, để mọi giao dịch được thực hiện
                            nhanh nhất. AUTOPAY247.com đem đến dịch vụ hỗ trợ chat trực tuyến 24/24, mọi thắc mắc giao
                            dịch đều được hỗ trợ nhanh nhất.
                        </p>
                    </div>
                </div>
                <div class="trusted-exchange__content--card">
                    <img src="{{ asset('assets/images/access-control.svg') }}" alt="unlock">
                    <div class="trusted-exchange__content--card__caps">
                        <h2 class="theme--text">SỬ DỤNG ĐƠN GIẢN</h2>
                        <p class="theme--text-light">Hiểu được tâm lý khách hàng, AUTOPAY247.com đã tối ưu toàn bộ hệ
                            thống để khách hàng giao dịch đơn giản nhất, thuận tiện nhất, nhanh chóng nhất. Hoặc các bạn
                            có thể email qua địa chỉ:</br><strong> Nhờ a Tâm điền mail hỗ trợ </strong></p>
                    </div>
                </div>
                <div class="trusted-exchange__content--card">
                    <img src="{{ asset('assets/images/unlock.svg') }}" alt="unlock">
                    <div class="trusted-exchange__content--card__caps">
                        <h2 class="theme--text">Mã hóa dữ liệu nâng cao </h2>
                        <p class="theme--text-light">Dữ liệu giao dịch của bạn được bảo mật thông qua mã hóa đầu cuối,
                            đảm bảo rằng chỉ bạn mới có quyền truy cập vào thông tin cá nhân của mình.</p>
                    </div>
                </div>
            </div>
            <div class="trusted-exchange__content--image">
                <img src="{{ asset('assets/images/trusted-section.webp') }}" alt="Trusted Crypto Exchange">
            </div>
        </div>
        </br>
        <p class="std-subtitle theme--text-light">AUTOPAY247.com xin chân thành cảm ơn các bạn đã luôn ủng hộ thời gian
            qua! </br>AUTOPAY247.com mong muốn sẽ là dịch vụ tốt nhất, được phục vụ các bạn là niềm vinh hạnh của chúng
            tôi!</p>
        <p class="std-subtitle"><strong>AUTOPAY247.com thân!</strong></p>
        <!-- <div class="btn">Start Now</div> -->
    </div>
</section>
@endsection