@extends('admin.main')
@section('content')
<div class="card">
    <div class="loan-index d-flex row">
        <div class="title-loan col-md-3">
            <h6 class="card-header">DS Mua Bán
                {{ $paginatedHistory->isEmpty() ? '' : $paginatedHistory->first()->verify->account_name }}</h6>

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
                    <th>Thành tiền</th>
                    <th>Hình thức</th>
                    <th>Thời gian</th>
                    <th>Địa chỉ</th>
                    <th>Tình trạng</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($paginatedHistory as $item)
                    <tr class="item-">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($item->type == 'mua')
                                {{ $item->crypto_amount }} {{ $item->state }}
                                <br> {{ number_format($item->amount, 0, ',', '.') }}đ
                                <br>Đã thanh toán: {{ number_format($item->bank_amount, 0, ',', '.') }}đ
                            @else
                                {{ $item->total_payment }} {{ $item->state_sell }}
                                <br> {{ number_format($item->amount, 0, ',', '.') }}đ
                                <br>Đã thanh toán: {{ number_format($item->bank_amount, 0, ',', '.') }}đ
                            @endif
                        </td>
                        <td>{{ $item->type == 'mua' ? 'Mua' : 'Bán' }}</td>
                        <td>{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                        <td>
                            @if($item->type == 'mua')
                                {{ Str::substr($item->address_wallet, 0, 25) }}<br>{{ Str::substr($item->address_wallet, 25) }}
                            @else
                                {{ Str::substr($item->wallet_address, 0, 25) }}<br>{{ Str::substr($item->wallet_address, 25) }}
                            @endif
                        </td>
                        <td>
                            @if ($item->status == 0)
                                Chờ xác nhận
                            @elseif($item->status == 1)
                                Đã hoàn thành
                            @else
                                Tài khoản chuyển khoản không khớp
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                {!! $paginatedHistory->links() !!}
            </tfoot>
        </table>
    </div>
</div>
@endsection