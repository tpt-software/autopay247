@extends('admin.main')
@section('content')
    <div class="card">
        <div class="loan-index d-flex row">
            <div class="title-loan col-md-3">
                <h5 class="card-header">DS xác minh</h5>
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
        <div class="table-responsive text-nowrap" style="min-height:500px;">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>STT</th>
                        <th>Mã Lệnh</th>
                         <th>Thông tin tài khoản</th>
                        <!-- <th>Loại xác minh</th> -->
                        <th>Mã OTP</th>
                        <th>Tình trạng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach ($verifies as $key => $verify)
                        <tr class="item-">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $verify->uuid }} <br> {{ date('d/m/Y H:i:s', strtotime($verify->created_at) ) }}</td>
                            <td>
                                {{ $verify->account_name }} <br>
                                {{ $verify->account_number }} <br>
                                {{ $verify->bank_name }}
                            </td>
                            <!-- <td>
                                @if ($verify->type == 0)
                                    Không KYC
                                @elseif($verify->type == 1)
                                    Kyc với bank
                                @else
                                    Kyc với cccd
                                @endif
                            </td> -->
                            <td>{{ $verify->verify_number }}</td>
                            <td><span class="text-{{ $verify->status == 1 ? 'success' : 'warning' }}">{{ $verify->status == 1 ? 'Đã xác minh' : ($verify->status == 2 ? 'Đã thanh toán' : 'Chưa thanh toán'); }}</span>
                            </td>
                            <td class="d-flex align-items-center" style="gap: 10px; padding-top: 41px;">
                                <!-- <a class="" href="{{ route('admin.verify.show', $verify->id) }}"><i
                                        class="bx bx-check"></i> </a> -->
                                    <a class="" href="{{ route('admin.verify.transaction', $verify->id) }}"
                                        title="Lịch sử mua">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                <form action="{{ route('admin.verify.message', $verify->id) }}" method="post">
                                    @csrf
                                    <div class="dropdown show">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" data-display-id="{{ $verify->id }}">
                                            {{  $verify->message_type == \App\Models\Verify::MESSAGE_TYPE_PENDING ? 'Chờ xác nhận' : '' }}
                                            {{  $verify->message_type == \App\Models\Verify::MESSAGE_TYPE_VALID ? 'Đã xác nhận' : '' }}
                                            {{  $verify->message_type == \App\Models\Verify::MESSAGE_TYPE_INVALID ? 'Tài khoản ck không khớp' : '' }}
                                            {{  $verify->message_type == \App\Models\Verify::MESSAGE_TYPE_SENT_CODE ? 'Gửi mã CODE' : '' }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#" data-verify-id="{{ $verify->id }}"
                                                data-action="message_type" data-value="0">Chờ xác nhận</a>
                                            <a class="dropdown-item" href="#" data-verify-id="{{ $verify->id }}"
                                                data-action="message_type" data-value="1">Phê duyệt</a>
                                            <a class="dropdown-item" href="#" data-verify-id="{{ $verify->id }}"
                                                data-action="message_type" data-value="2">Tài khoản ck không khớp</a>
                                            <a class="dropdown-item" href="#" data-verify-id="{{ $verify->id }}"
                                                data-action="message_type" data-value="3">Gửi mã CODE</a>
                                        </div>
                                    </div>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    {!! $verifies->links() !!}
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('[data-action="message_type"]').on('click', function() {
            const id = this.getAttribute('data-verify-id');
            const value = this.getAttribute('data-value');
            const message = this.textContent;
            let href = @json(route('admin.verify.message', ':id'));
            $.ajax({
                method: 'post',
                url: href.replace(':id', id),
                data: {
                    _token: @json(csrf_token()),
                    message_type: value
                },
                success: function(response) {
                    if (response.success) {
                        $('[data-display-id="' + id + '"]').text(message)
                        alert('Thành công')
                    }
                }
            })
        })
    </script>
@endsection
