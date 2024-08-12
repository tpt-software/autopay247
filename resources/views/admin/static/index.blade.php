@extends('admin.main')
@section('content')

<div class="row">
    <!-- @foreach ($dataStatic as $key => $item)
    
    @endforeach -->
    <div class="col-lg-6 col-md-12 col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <span class="fw-medium d-block mb-1">Tổng user KYC</span>
                <h3 class="card-title mb-2">{{ number_format($kyc_users) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <span class="fw-medium d-block mb-1">Tổng user Không KYC</span>
                <h3 class="card-title mb-2">{{ number_format($noKyc_users) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Tổng doanh thu bán: {{ number_format($stats['total_sell']) }} <span
                class="text-muted">VND</span></h5>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                        @foreach($dataStatic['sell_data'] as $coin_name => $value)
                        <li class="d-flex mb-4 pb-1">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                <h6 class="mb-0">{{ $coin_name }}</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">({{ number_format($value['crypto_amount']) }}) - {{ number_format($value['amount']) }}</h6> <span
                                        class="text-muted">VND</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12 col-12 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Tổng doanh thu mua: {{ number_format($buyStats['total_buy']) }} <span
                class="text-muted">VND</span></h5>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    @foreach($dataStatic['buy_data'] as $coin_name => $value)
                        <li class="d-flex mb-4 pb-1">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">{{ $coin_name }}</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">({{ number_format($value['total_payment']) }}) - {{ number_format($value['want_to_buy']) }}</h6> <span
                                        class="text-muted">VND</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- <div class="col-lg-6 col-md-12 col-12 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Tổng lợi nhuận bán</h5>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">BTC</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">$12,628</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">USDT</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">$12,628</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4">
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">BNB</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">$12,628</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Tổng lợi nhuận mua</h5>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">BTC</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">$12,628</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">USDT</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">$12,628</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4">
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">BNB</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">$12,628</h6> <span class="text-muted">USD</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
</div>

@endsection