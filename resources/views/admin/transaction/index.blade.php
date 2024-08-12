@extends('admin.main')
@section('content')
    <div class="card">
        <div class="loan-index d-flex row">
            <div class="title-loan col-md-3">
                <h5 class="card-header">DS Mua</h5>
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
        <div class="table-responsive text-nowrap"
            style="
        max-height: max-content;
        height: 700px;
        overflow-y: scroll;
    ">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>STT</th>
                        <th>Mã lệnh</th>
                        <th>Thông tin tài khoản</th>
                        <!-- <th>Tổng Coin</th> -->
                        <th>Thành tiền</th>
                        <!-- <th>Đã thanh toán</th> -->
                        <th>Trạng thái</th>
                        <!-- <th>Hành động</th> -->
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                    $statuses = \App\Models\Transaction::getStatues();
                    @endphp
                    @foreach ($transactions as $key => $transaction)
                        <tr class="item-">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $transaction->uuid }} <br> {{ date('d/m/Y H:i:s', strtotime($transaction->created_at) ) }}</td>
                            <td>{{ $transaction->verify?->account_name }} 
                                <br> {{ $transaction->verify?->account_number }}
                                <br> {{ $transaction->verify?->bank_name }}
                                <br> {{ $transaction->address_wallet }}
                                <br>Mạng lưới: {{ $transaction->network }}
                            </td>
                            <td>
                                {{ $transaction->crypto_amount }} {{ $transaction->state }}
                                <br>{{ number_format($transaction->amount, 0, ',', '.') }}đ
                                <br>Đã thanh toán: {{ number_format($transaction->bank_amount, 0, ',', '.') }}đ
                            </td>
                            <td>
                                {{ $statuses[$transaction->status] }}
                            </td>
                            <!--td style="width: 200px;">
                                <select name="status" id="status" class="form-control" data-transaction-id="{{ $transaction->id }}">
                                    @foreach( $statuses as $statuse_key => $statuse_val )
                                    <option @selected($statuse_key == $transaction->status) value="{{ $statuse_key }}">{{ $statuse_val }}</option>
                                    @endforeach
                                </select>
                            </td-->
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    {!! $transactions->links() !!}
                </tfoot>
            </table>
        </div>
    </div>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11111111">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto title">Thành công</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body message">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const toastLiveExample = document.getElementById('liveToast')
        const showToast = function(title, message) {
            $(toastLiveExample).find('.title').text(title);
            $(toastLiveExample).find('.message').text(message);
            const toast = new bootstrap.Toast(toastLiveExample);
            toast.show();
        }
        $('#status').on('change',function(){
            let value   = $(this).val();
            let id      = $(this).data('transaction-id');

			if( value != 1 ){
				let href = @json(route('admin.transaction.update_status', ':id'));
				$.ajax({
					method: 'post',
					url: href.replace(':id', id),
					data: {
						_token: @json(csrf_token()),
						status: value
					},
					success: function(response) {
						const title = response.success ? 'Thành công' : 'Có lỗi xảy ra';
						if( value != 1 ){
							showToast(title, response.message);
						}
					}
				})
			}
            

            // Hoàn thành và gửi coin
            if( value == 1 ){
                let href = @json(route('admin.transaction.accept_send_coin', ':id'));
                $.ajax({
                    method: 'post',
                    url: href.replace(':id', id),
                    data: {
                        _token: @json(csrf_token()),
                        accept: value
                    },
                    success: function(response) {
                        const title = response.success ? 'Thành công' : 'Có lỗi xảy ra';
                        showToast(title, response.message);
                    }
                })
            }
        })
    </script>
@endsection
