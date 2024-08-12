<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords"
        content="Blockchain Crypto Exchange, Cryptocurrency Exchange, Bitcoin Trading, Ethereum price trend, BNB, CZ, BTC price, ETH wallet registration, LTC price, Binance, Poloniex, Bittrex - Replicated by Kiisi Felix Destiny">
    <title>AUTOPAY247 - Mua Bán USDT, BNB, BTC</title>
    <meta name="description"
        content="Hệ thống Trung Gian Trao Đổi Mua Bán USDT, BNB, BTC Bitcoin hoàn toàn tự động 24/7. NHANH - RẺ - UY TÍN.">
    <meta name="robots" content="index, follow">
    <meta property="og:url" content="https://autopay247.com/">
    <link rel="canonical" href="https://autopay247.com/">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/logo-autobanking.png">
    <link rel="apple-touch-icon" type="image/x-icon" href="./assets/images/logo-autobanking.png">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo-autobanking.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/taildwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/transfer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css') }}">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.min.css
" rel="stylesheet">
    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js
    "></script>
    <!-- <script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool'></script> -->
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="app_url" content="{{ route('index') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chat.css') }}">
</head>
@php
    $className = Route::currentRouteName();
@endphp

<body class="page-{{ $className }}">
    <!-- Mobile Banner -->



    <!-- Banner -->
    @include('frontend.layouts.header')

    <!-- Mobile Navigation Backdrop -->

    <div class="mobile-navigation-backdrop"></div>

    <!-- Mobile Navigation -->

    <aside class="mobile-navigation">
        <div class="mobile-navigation__cancel">
            <span class="material-icons">close</span>
        </div>

        <div class="mobile-navigation__main">


            <div class="mobile-navigation__main--item">
                <a href="/" class="mobile-navigation__main--item__title">
                    <div class="mobile-navigation__main--item__title--leading theme--text">

                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" class="css-6px2js" width="24" height="24">
                            <defs>
                                <symbol viewBox="0 0 24 24" id="crypto-f">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3ZM14.1642 18.5H12.5052V16.9617H11.4948V18.5H9.83585V16.9617H8.32773V7.03828H9.83585V5.5H11.4948V7.03828H12.5052V5.5H14.1642V7.08353C15.4611 7.29466 16.2152 8.2297 16.2152 9.58701C16.2152 10.9594 15.5969 11.5476 14.2848 11.7135V11.8039C15.6572 11.8794 16.5922 12.5731 16.5922 14.1265C16.5922 15.6497 15.5516 16.8863 14.1642 16.9617V18.5ZM13.0632 8.86311H10.4843V11.1102H13.0632C13.6363 11.1102 13.9832 10.8086 13.9832 10.2355V9.73782C13.9832 9.16473 13.6363 8.86311 13.0632 8.86311ZM13.4252 12.8596H10.4843V15.1369H13.4252C13.9983 15.1369 14.3602 14.8202 14.3602 14.2471V13.7494C14.3602 13.1763 13.9983 12.8596 13.4252 12.8596Z"
                                        fill="currentColor"></path>
                                </symbol>
                            </defs>
                            <use xlink:href="#crypto-f" fill="#848E9C"></use>
                        </svg>
                        Trang chủ
                    </div>
                </a>
            </div>
            <div class="mobile-navigation__main--item">
                <a href="{{ route('verify') }}" class="mobile-navigation__main--item__title">
                    <div class="mobile-navigation__main--item__title--leading theme--text">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" class="css-6px2js" width="24" height="24">
                            <defs>
                                <symbol viewBox="0 0 24 24" id="futures-f">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.5 3H20V16C20 18.2091 18.2091 20 16 20H7.5C5.567 20 4 18.433 4 16.5V9H8.5V3ZM11 14.5056V17.0056L17.5 17.0056V14.5056H11ZM8.5 11.5H6.5V16.5C6.5 17.0523 6.94772 17.5 7.5 17.5C8.05228 17.5 8.5 17.0523 8.5 16.5V11.5ZM12.5001 6.00562H17.5001V11.0056L15.8846 9.3901L13.2691 12.0056L11.5013 10.2379L14.1168 7.62233L12.5001 6.00562Z"
                                        fill="currentColor"></path>
                                </symbol>
                            </defs>
                            <use xlink:href="#futures-f" fill="#848E9C"></use>
                        </svg>
                        Xác minh
                    </div>
                </a>
            </div>
            <div class="mobile-navigation__main--item">
                <a href="{{ route('insurance') }}">
                    <div class="mobile-navigation__main--item__title">
                        <div class="mobile-navigation__main--item__title--leading theme--text">
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" class="css-6px2js" width="24" height="24">
                                <defs>
                                    <symbol viewBox="0 0 24 24" id="piggy-bank-f">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.0135 1C9.30088 1 7.10183 3.19905 7.10183 5.91171C7.10183 6.83267 7.3553 7.69443 7.79628 8.43103C5.55306 9.4109 3.95023 11.5837 3.7896 14.1476H2V15.9337H3.91462C4.26878 17.6501 5.27957 19.1265 6.67276 20.0888L5.02451 21.7371L6.28746 23L8.3573 20.9302C9.023 21.1518 9.73515 21.2719 10.4753 21.2719H15.7789L17.3705 22.8635L18.6334 21.6006L17.2935 20.2606L21.6429 15.9112L21.6429 13.2243H19.7091C19.5089 12.122 19.0149 11.1221 18.311 10.3087L20.7459 7.87386H16.5177C16.7798 7.27288 16.9252 6.60927 16.9252 5.91171C16.9252 3.19905 14.7262 1 12.0135 1ZM8.88791 5.91171C8.88791 4.18547 10.2873 2.78608 12.0135 2.78608C13.7398 2.78608 15.1392 4.18547 15.1392 5.91171C15.1392 7.63795 13.7398 9.03734 12.0135 9.03734C10.2873 9.03734 8.88791 7.63795 8.88791 5.91171ZM10.674 5.91171L12.0135 4.57215L13.3531 5.91171L12.0135 7.25127L10.674 5.91171ZM9.7484 13.2344H14.2787V11.4484H9.7484V13.2344Z"
                                            fill="currentColor"></path>
                                    </symbol>
                                </defs>
                                <use xlink:href="#piggy-bank-f" fill="#848E9C"></use>
                            </svg>
                            Bảo hiểm
                        </div>
                    </div>
                </a>
            </div>
            <div class="mobile-navigation__main--item">
                <a href="{{ route('instruct') }}">
                    <div class="mobile-navigation__main--item__title">
                        <div class="mobile-navigation__main--item__title--leading theme--text">
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" class="css-6px2js" width="24" height="24">
                                <defs>
                                    <symbol viewBox="0 0 24 24" id="chart-donut-f">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17.4123 19.1912C15.906 20.3267 14.0316 20.9998 12 20.9998C7.02944 20.9998 3 16.9704 3 11.9998C3 7.45343 6.37108 3.69438 10.75 3.08594V8.19612C9.15149 8.72112 7.99725 10.2257 7.99725 11.9998C7.99725 14.2105 9.78934 16.0026 12 16.0026C12.6466 16.0026 13.2574 15.8493 13.7981 15.577L17.4123 19.1912ZM19.1817 17.425C20.323 15.9165 21 14.0372 21 11.9998C21 7.45343 17.6289 3.69438 13.25 3.08594V8.19612C14.8485 8.72112 16.0028 10.2257 16.0028 11.9998C16.0028 12.6524 15.8466 13.2686 15.5695 13.8129L19.1817 17.425Z"
                                            fill="currentColor"></path>
                                    </symbol>
                                </defs>
                                <use xlink:href="#chart-donut-f" fill="#848E9C"></use>
                            </svg>
                            Hướng dẫn
                        </div>
                    </div>
                </a>
            </div>
            <div class="mobile-navigation__main--item">
                <a target="_blank" href="https://t.me/autopay247">
                    <div class="mobile-navigation__main--item__title">
                        <div class="mobile-navigation__main--item__title--leading theme--text">
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" class="css-6px2js" width="24" height="25">
                                <defs>
                                    <symbol viewBox="0 0 24 25" id="feed-f">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.99976 3.5H21.0001V19.5H10.9998L6.99976 23.5V19.5H2.99976V3.5ZM8.2224 8.16968C12.365 8.16968 15.7233 11.528 15.7233 15.6706L17.7233 15.6706C17.7233 10.4234 13.4696 6.16968 8.2224 6.16968V8.16968ZM11.7224 15.6706C11.7224 13.7376 10.1554 12.1706 8.2224 12.1706V10.1706C11.26 10.1706 13.7224 12.6331 13.7224 15.6706L11.7224 15.6706ZM8.22229 17.1708C9.05072 17.1708 9.72229 16.4993 9.72229 15.6708C9.72229 14.8424 9.05072 14.1708 8.22229 14.1708C7.39386 14.1708 6.72229 14.8424 6.72229 15.6708C6.72229 16.4993 7.39386 17.1708 8.22229 17.1708Z"
                                            fill="currentColor"></path>
                                    </symbol>
                                </defs>
                                <use xlink:href="#feed-f" fill="#848E9C"></use>
                            </svg>
                            Liên hệ
                        </div>
                    </div>
                </a>
            </div>


        </div>

        </div>

        <div class="mobile-navigation__settings">
            <div class="mobile-navigation__settings--item mobile-navigation__settings--item__theme"
                aria-mobile-theme-btn="false">
                <div class="mobile-navigation__settings--item__leading theme--text">

                    <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" class="css-mykl4n" width="24" height="24">
                        <defs>
                            <symbol viewBox="0 0 24 24" id="logo">
                                <path
                                    d="M5.41406 12L2.71875 14.6953L0 12L2.71875 9.28125L5.41406 12ZM12 5.41406L16.6406 10.0547L19.3594 7.33594L12 0L4.64062 7.35938L7.35938 10.0781L12 5.41406ZM21.2812 9.28125L18.5859 12L21.3047 14.7188L24.0234 12L21.2812 9.28125ZM12 18.5859L7.35938 13.9219L4.64062 16.6406L12 24L19.3594 16.6406L16.6406 13.9219L12 18.5859ZM12 14.6953L14.7188 11.9766L12 9.28125L9.28125 12L12 14.6953Z"
                                    fill="currentColor"></path>
                            </symbol>
                        </defs>
                        <use xlink:href="#logo" fill="#707A8A"></use>
                    </svg>
                    Chủ đề
                </div>
                <div class="mobile-navigation__settings--item__trailing">
                    <button class="mobile-navigation__settings--item__theme-btn">
                        <div>
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" class="css-41qi6t" width="24" height="24">
                                <defs>
                                    <symbol viewBox="0 0 24 24" id="mode-light">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.5 2H13.5V5H10.5V2ZM16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8C14.2091 8 16 9.79086 16 12ZM5.98948 3.86891L3.86816 5.99023L5.98948 8.11155L8.1108 5.99023L5.98948 3.86891ZM2 13.5V10.5H5V13.5H2ZM3.86794 18.0095L5.98926 20.1309L8.11058 18.0095L5.98926 15.8882L3.86794 18.0095ZM13.5 19V22H10.5V19H13.5ZM18.01 15.8884L15.8887 18.0098L18.01 20.1311L20.1313 18.0098L18.01 15.8884ZM19 10.5H22V13.5H19V10.5ZM15.8894 5.99001L18.0107 8.11133L20.1321 5.99001L18.0107 3.86869L15.8894 5.99001Z"
                                            fill="currentColor"></path>
                                    </symbol>
                                </defs>
                                <use xlink:href="#mode-light" fill="#707A8A"></use>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>

        </div>
    </aside>

    <!-- Redeem Gift -->

    <section class="redeem-gift">
        <div class="redeem-gift__content">
            <div class="redeem-gift__content--main">
                <img src="{{ asset('assets/images/svgexport-66.svg') }}" alt="gift" />
                <p class="theme--text">
                    Cảnh báo LỪA ĐẢO: Chúng tôi chỉ hỗ trợ giao dịch trên website!

                </p>
            </div>
        </div>
    </section>

    <!-- Header -->

    <header class="header">
        <div class="max-wrapper">
            <div class="max-wrapper__content">
                @yield('content')

            </div>
        </div>
    </header>

    @include('frontend.layouts.footer')
    @include('frontend.layouts.chat')
    <div class="max-wrapper copyright dark-mode-background">
        <div class="max-wrapper__content copyright__text">AUTOPAY247 &copy; 2017-2024</div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://kit.fontawesome.com/16ea0da941.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/scripts/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/scripts/bundle.js') }}"></script>
<script src="{{ asset('assets/scripts/scripts.js') }}"></script>
<script src="{{ asset('assets/scripts/common.js') }}"></script>
<script src="{{ asset('assets/scripts/demo-settings.js') }}"></script>
<!-- <script src="{{ asset('assets/scripts/inputmask.min.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script src="{{ asset('assets/scripts/input-mask.js') }}"></script>
<script src="{{ asset('assets/scripts/custom.js') }}"></script>


@yield('script')
@stack('script')

</html>