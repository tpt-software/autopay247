@extends('admin.main')
@section('content')
<div class="card">
    <div class="loan-index d-flex row">
        <div class="title-loan col-md-3">
            <h5 class="card-header">DS thanh toán</h5>
        </div>
        <div class="col-md-9">
            <form action="" class="row">
                <div class="input-group input-group-merge col-md-4 search-loan">
                    <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                    <input type="text" class="form-control" value="{{ request()->key_word }}" name="key_word"
                        placeholder="Tìm kiếm theo stk" aria-label="Search..." aria-describedby="basic-addon-search31">
                </div>
                <div class="btn-search col-md-2">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã lệnh</th>
                    <th>Thông tin tài khoản</th>
                    <!-- <th>Coin Bán</th> -->
                    <th>Số Lượng Coin Bán</th>
                    <th>Số Tiền Nhận</th>
                    <th>Tình trạng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($orders as $key => $order)
                <tr class="item-">
                    <td>{{  $key + 1 }}</td>
                    <td>{{ $order->uuid }} <br> {{ date('d/m/Y H:i:s', strtotime($order->created_at) ) }}</td>
                    <td>{{ $order->verify->account_name ?? '' }} <br>{{ $order->verify->account_number ?? '' }} <br>
                        {{ $order->verify->bank_name ?? '' }} </td>
                    <!-- <td>{{ $order->state_sell }}</td> -->
                    <td>
                        {{ $order->total_payment }} 
                        {{ $order->state_sell }}
                    </td>
                    <td>{{ number_format($order->want_to_buy ?? 0, 0, ',', '.') }} ₫</td>
                    <td>
					{{ \App\Models\Order::getStatue($order->status) }}</td>
                    <td>
                        <a class="" href="{{ route('admin.order.verification', $order->id) }}"><i
                                class="bx bx-check"></i> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                {!! $orders->links() !!}
            </tfoot>
        </table>
    </div>
</div>
@endsection
@section('script')
@endsection