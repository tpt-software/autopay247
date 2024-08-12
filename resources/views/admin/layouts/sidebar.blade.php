<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div>
        <a href="{{ route('admin.static.index') }}" >

            <img src="{{ asset('assets/admin/img/autobanking-white00.jpg')}}" alt="logo" class="header-logo" style="width: 260px">


        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1" id="admin-side-menu">

        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('admin.static.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Tổng quan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">DS Nhân viên</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.verify.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">DS Xác minh</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.transaction.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">DS Mua</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.order.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">DS Bán</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.coin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">DS Đồng tiền</div>
            </a>
        </li>
        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Thông tin </div>
            </a>

            <ul class="menu-sub">

                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Without menu">KYC</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Without menu">Mua</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Without menu">Bán</div>
                    </a>
                </li>


            </ul>
        </li>



    </ul>

</aside>
