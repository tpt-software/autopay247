@extends('admin.main')
@section('content')
<div class="card">
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
    <div class="loan-index d-flex row">
        <div class="title-loan col-md-2">
            <h5 class="card-header">Người dùng</h5>
        </div>
        <div class="col-md-8">
            <form action="" class="row">
                <div class="input-group input-group-merge col-md-4 search-loan">
                    <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                    <input type="text" class="form-control" value="{{ request()->key_word }}" name="key_word"
                        placeholder="Tìm kiếm theo tên số điện thoại" aria-label="Search..."
                        aria-describedby="basic-addon-search31">
                </div>
                <div class="btn-search col-md-3">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
        <div class="btn-search col-md-2">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Thêm người</a>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>CCCD</th>
                    <th>Vai trò</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($users as $index => $user)
                <tr class="item-">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email ?: '-' }}</td>
                    <td>{{ $user->phone ?: '-' }}</td>
                    <td>{{ $user->cccd ?: '-' }}</td>
                    <td>{!! $user->roleName !!}</td>
                    <td class="d-flex" style="gap: 10px">
                        <a class="" href="{{ route('admin.user.edit', $user->id) }}">
                            <i class="bx bx-edit-alt"></i>
                        </a>
                        <a data-user-name="{{ $user->name }}" class="destroy-action"
                            href="{{ route('admin.user.destroy', $user->id) }}">
                            <i class="bi bi-trash text-danger"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script>
(() => {
    $('.destroy-action').on('click', function(e) {
        e.preventDefault();

        const url = $(this).attr('href');
        const user_name = $(this).attr('data-user-name');
        const ok = confirm('Xóa ' + user_name);
        if (!ok) {
            return;
        }
        $.ajax({
            url: url,
            method: 'delete',
            data: {
                _token: @json(csrf_token())
            },
            dataType: 'json',
            success: function(data) {
                // console.log(data)
                if (data.success) {
                    $('.alert-success').html(data.success);
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }
            }
        })
    })
})()
</script>
@endsection