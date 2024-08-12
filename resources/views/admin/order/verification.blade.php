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
                                            <li class="list-group-item active">Thông Tin Đơn Bán</strong></li>
                                            <li class="list-group-item"><strong>Tên tài khoản :
                                                    {{ $order->verify->account_name }}</strong></li>
                                            <li class="list-group-item"><strong>Số tài khoản :
                                                    {{ $order->verify->account_number }}</strong></li>
                                            <li class="list-group-item"><strong>Ngân hàng :
                                                    {{ $order->verify->bank_name }}</strong></li>
                                            <li class="list-group-item"><strong>Hình thức GD : @if ($order->type == 2)
                                                        Bán
                                                    @elseif ($order->type == 1)
                                                        Mua
                                                    @endif
                                                </strong></li>
                                            <li class="list-group-item"><strong>Coin Bán : {{$order->state_sell}}</strong></li>
                                            <li class="list-group-item"><strong>Số Lượng Bán : {{$order->total_payment}}</strong></li>
                                            <li class="list-group-item"><strong>Số Tiền Nhận :{{ number_format($order->want_to_buy ?? 0, 0, ',', '.') }} ₫</strong></li>
                                            <li class="list-group-item"><strong>Tình trạng : {{ \App\Models\Order::getStatue($order->status) }}</strong></li>
                                        </ul>
                                        <form action="{{ route('admin.order.active', $order->id) }}" method="post">
                                            @csrf
                                            <div class="nk-kycfm-footer pt-5">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="status">
													@foreach( \App\Models\Order::getStatues() as $status => $status_label )
                                                    <option @selected($status == $order->status) value="{{ $status }}">{{ $status_label }}</option>
                                                    @endforeach
                                                </select>
                                                
                                                <div class="button-all">
                                                    <div class="nk-kycfm-action pt-2"><button type="submit"
                                                            class="btn btn-lg btn-primary">Tiến hành</button></div>
                                                    <div class="nk-kycfm-action pt-2"><a
                                                            style=" margin-left: 10px;
                                                                                                    background: red !important ;
                                                                                                    border-color: red !important;"
                                                            href="{{ route('admin.order.index') }}"
                                                            class="btn btn-lg btn-primary">Trở về</a></div>
                                                </div>
                                            </div>
                                        </form>
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
