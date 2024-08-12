@extends('frontend.layouts.main')
@section('content')
    <main class="main-content css-vurnku">
        <section class="trusted-exchange dark-mode-background max-wrapper std-top-space">
            <div class="max-wrapper__content">
                <div class="trusted-exchange__title">
                    <div>
                        <h1 class="std-title theme--text title-info-instruct">Lệnh Bán Đã Được Gửi Đi Thành Công!</h1>
                        <p class="std-subtitle theme--text-light title-info-instruct">Vui lòng chờ xét Duyệt!  
                        </p>
                        <a class="std-subtitle theme--text-light title-info-instruct" href="{{ route('transaction') }}">Trở về</a>
                    </div>
    
                </div>
            </div>
        </section>
    </main>
@endsection

