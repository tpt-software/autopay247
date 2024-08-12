@extends('admin.main')
@section('content')
<div class="container-fluid">
    <div class="page-section">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4">Cập Nhật Thông Tin</h4>
        </div>
        <form method="post" action="{{ route('admin.coin.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên loại tiền</label>
                                <input type="text" class="form-control" placeholder="Nhập tên tiền mã hóa"
                                    name="coin_name" value="{{ old('coin_name') }}">
                                @error('coin_name')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mạng lưới</label>
                                <input type="text" class="form-control" placeholder="Nhập tên mạng lưới"
                                    name="network_name" value="{{ old('network_name') }}">
                                @error('network_name')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address"
                                    value="{{ old('address') }}">
                                @error('address')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh QR</label>
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <div class="form-actions">
                        <a class="btn btn-secondary float-right" href="{{ route('admin.coin.index') }}">Hủy</a>
                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Khởi tạo">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection