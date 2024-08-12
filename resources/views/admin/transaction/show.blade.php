@extends('admin.main')
@section('content')
    <header class="header">
        <div class="max-wrapper">
            <div class="max-wrapper__content">
                <div class="container-xl wide-lg">
                    <div class="nk-content-body">
                        <div class="kyc-app wide-sm m-auto">
                            <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                <div class="nk-block-head-content text-center">
                                    <h2 class="nk-block-title fw-normal">Xác nhận chuyển khoản của khách hàng </h2>
                                    <div class="nk-block-des">
                                        <p>Để tuân thủ quy định, mỗi người tham gia sẽ phải trải qua quá trình xác minh danh
                                            tính
                                            (KYC/AML) để ngăn chặn các nguyên nhân gian lận.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="card card-bordered padding-content">
                                    <div class="nk-kycfm">
                                        <ul class="list-group">
                                            <li class="list-group-item active">Thông Tin Mua Coin</strong></li>
                                            <li class="list-group-item"><strong>Tên tài khoản :
                                            {{ $transaction->verify->account_name ?? '' }}</strong></li>
                                            <li class="list-group-item"><strong>Số tài khoản :
                                            {{ $transaction->verify->account_number ?? '' }}</strong></li>
                                            <li class="list-group-item"><strong>Ngân hàng :
                                            {{ $transaction->verify->bank_name ?? '' }}</strong></li>
                                           
                                            <li class="list-group-item"><strong>Coin mua : {{$transaction->state}}</strong></li>
                                            <li class="list-group-item"><strong>Số lượng mua : {{$transaction->crypto_amount}}</strong></li>
                                            <li class="list-group-item"><strong>Số tiền chuyển :{{ number_format($transaction->amount ?? 0, 0, ',', '.') }} ₫</strong></li>
                                            <li class="list-group-item"><strong>Mạng lưới : {{$transaction->network}}</strong></li>
                                            <li class="list-group-item"><strong>Địa chỉ ví coin : {{$transaction->address_wallet}}</strong></li>
                                            <li class="list-group-item"><strong>Tình trạng : <span
                                                class="text-{{ $transaction->status ? 'success' : 'warning' }}">{{ $transaction->status ? 'Đã xác minh' : 'Chưa xác minh' }}</span></strong></li>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
