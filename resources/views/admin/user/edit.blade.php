@extends('admin.main')
@section('content')
    <div class="container-fluid">
        <div class="page-section">
            <div class="d-flex justify-content-between">
                <h4 class="fw-bold py-3 mb-4">Cập Nhật thông tin</h4>
            </div>

            <form method="post" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin cá nhân</legend>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên</label>
                                    <input name="name" type="text" value="{{ $user->name ?? old('name') }}"
                                        id="example-text-input" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input name="phone" type="phone" value="{{ $user->phone ?? old('phone') }}"
                                        id="example-text-input" class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-mail</label>
                                    <input name="email" type="email" value="{{ $user->email ?? old('email') }}"
                                        id="example-text-input" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body border-top">
                        <legend>Thông tin CMND/CCCD</legend>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="cccd">Số CCCD</label>
                                    <input name="cccd" type="text" id="cccd"
                                        value="{{ $user->cccd ?? old('cccd') }}"
                                        class="form-control @error('cccd') is-invalid @enderror">
                                    @error('cccd')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="cccd">Vai trò</label>
                                    <select name="role" class="form-select">
                                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Quản trị viên
                                        </option>
                                        <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Nhân viên</option>
                                    </select>
                                    @error('cccd')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-actions">
                            <a class="btn btn-secondary float-right" href="{{ route('admin.user.index') }}">Hủy</a>
                            <input type="submit" class="btn btn-info waves-effect waves-light add_product"
                                value="Cập nhật">

                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.before_cccd').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#before_cccd').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('.after_cccd').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#after_cccd').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('.face_cccd').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#face_cccd').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('.additional_information').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#additional_information').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('.signature').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#signature').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
