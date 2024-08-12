@extends('admin.main')
@section('content')

<div class="card_footer d-flex justify-content-end m-2">
    <!-- <a href="{{ route('admin.coin.create') }}" class="btn btn-primary">Tạo Mới</a> -->
</div>
<div class="row mb-5">
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
    <style>
    @media (min-width: 992px) {
        .desktop-width-90 {
            width: 90%;
        }
    }
    </style>
    @foreach($items as $item)
    <div class="col-md-6 col-lg-4 mb-3">
        <div class="card h-100 desktop-width-90">
            <img class="card-img-top" src="{{ asset('storage/'.$item->image) }}" alt="QR image" />
            <div class="card-body">
                <h5 class="card-title">Coin : {{ $item->coin_name }}</h5>
                <h5 class="card-title">Mạng lưới : {{ $item->network_name }}</h5>
                <h5 class="card-title">Địa chỉ : {{ $item->address }}</h5>
                <p class="card-text">
                </p>
            </div>
            <div class="card_footer d-flex justify-content-end">
                <!-- <form action="{{ route('admin.coin.destroy',$item->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger m-2"
                        onclick="return confirm('Are you sure?')">Xóa</button>
                </form> -->
                <a href="{{ route('admin.coin.edit',$item->id) }}" class="btn btn-outline-primary m-2">Cập Nhập</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection