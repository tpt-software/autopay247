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
                                    <h2 class="nk-block-title fw-normal">Xác minh danh tính của khách hàng </h2>
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
                                        @if ($IdImage != null)
                                            <div class="nk-kycfm-head">
                                                <div class="nk-kycfm-count"></div>
                                                <div class="nk-kycfm-title">
                                                    <h5 class="title fz-13">Thông tin cá nhân</h5>
                                                    <p class="sub-title fz-12">Hãy đối chiếu những hình ảnh dưới đây!</p>
                                                </div>
                                            </div>
                                            <input type="hidden" name="_token"
                                                value="37snBf8tscPeSs0bDluXayJmXt2PkjV0l7Rs9I78" autocomplete="off">
                                            <div class="nk-kycfm-content">
                                                <div class="nk-kycfm-upload pt-5">
                                                    <div class="row align-items-center">
                                                        <div class="col-sm-4 d-none d-sm-block">
                                                            <p class="sub-title fz-12">1.Ảnh mặt trước: </p>
                                                            <div class="mx-md-4 set-image"><img
                                                                    @if ($IdImage->id_front) src="{{ asset('storage/' . $IdImage->id_front) }}"
                                                                @else
                                                                    src="http://127.0.0.1:8000/assets/images/id-back.svg" @endif
                                                                    alt="ID Front"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-kycfm-upload pt-5">
                                                    <div class="row align-items-center">
                                                        <div class="col-sm-4 d-none d-sm-block">
                                                            <p class="sub-title fz-12">2.Ảnh mặt sau: </p>
                                                            <div class="mx-md-4 set-image"><img
                                                                    @if ($IdImage->id_back) src="{{ asset('storage/' . $IdImage->id_back) }}"
                                                                @else
                                                                    src="http://127.0.0.1:8000/assets/images/id-back.svg" @endif
                                                                    alt="ID Back">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-kycfm-upload pt-5">
                                                    <div class="row align-items-center">
                                                        <div class="col-sm-4 d-none d-sm-block">
                                                            <p class="sub-title fz-12">3.Ảnh chân dung: </p>
                                                            <div class="mx-md-4 set-image div-face"><img class="img-face"
                                                                    @if ($IdImage->id_user) src="{{ asset('storage/' . $IdImage->id_user) }}"
                                                                    @else
                                                                        src="http://127.0.0.1:8000/assets/images/id-back.svg" @endif
                                                                    alt="ID Back">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <form action="{{ route('admin.verify.activeStatus', $IdImage->id) }}"
                                                method="post">
                                                @csrf
                                                <div class="nk-kycfm-footer pt-5">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="status">
                                                        <option selected>--Chọn Trạng Thái--</option>
                                                        <option value="0">Thông tin không hợp lệ</option>
                                                        <option value="1">Xác minh</option>
                                                    </select>
                                                    {{-- <input type="hidden" name="id_IdImage" value="{{ $IdImage->id }}"> --}}
                                                    <div class="button-all">
                                                        <div class="nk-kycfm-action pt-2"><button type="submit"
                                                                class="btn btn-lg btn-primary">Tiến hành</button></div>
                                                        <div class="nk-kycfm-action pt-2"><a
                                                                style=" margin-left: 10px;
                                                                                                    background: red !important ;
                                                                                                    border-color: red !important;"
                                                                href="{{ route('admin.verify.index') }}"
                                                                class="btn btn-lg btn-primary">Trở về</a></div>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <p class="sub-title fz-12">Chưa tải ảnh lên!</p>
                                            <div class="nk-kycfm-action pt-2"><a
                                                    style=" margin-left: 10px;
                                                background: red !important ;
                                                border-color: red !important;"
                                                    href="{{ route('admin.verify.index') }}"
                                                    class="btn btn-lg btn-primary">Trở về</a></div>
                                        @endif
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
