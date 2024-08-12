/* Mobile banner cancel */

// let mobileBanner = document.querySelector(".mobile-banner")
// let mobileBannerCancelBtn = document.querySelector(".mobile-banner__sub--cancel")

// mobileBannerCancelBtn.addEventListener("click", () => {
//     mobileBanner.style.display = "none"
// })

/* Banner cancel */

// let banner = document.querySelector(".banner")
// let bannerCancelBtn = document.querySelector(".banner__content--btn__cancel")

// bannerCancelBtn.addEventListener("click",()=>{
//     banner.style.display = "none"
// })

// Persist App Theme

function persistAppTheme(apptheme) {
    if (localStorage.getItem('theme')) {
        if (localStorage.getItem('theme') === 'dark') {
            darkMode()
        } else {
            lightMode()
        }
    } else {
        const OS_darkTheme = window.matchMedia("(prefers-color-scheme: dark)");
        if (OS_darkTheme.matches) {
            localStorage.setItem('theme', 'dark')
            darkMode()
        } else {
            localStorage.setItem('theme', 'light')
            lightMode()
        }
    }
}

persistAppTheme()

/* Theme Data */

const desktopThemeBtn = document.querySelector(".navigation__sub--settings__theme")

const mobileThemeBtnBox = document.querySelector(".mobile-navigation__settings--item__theme")
const mobileThemeBtn = document.querySelector(".mobile-navigation__settings--item__theme-btn div")


let themeBtnCurrentState = mobileThemeBtnBox.getAttribute('aria-mobile-theme-btn') == 'true' ? true : false

mobileThemeBtnBox.addEventListener("click", () => {
    if (localStorage.getItem('theme') === 'dark') {
        localStorage.setItem('theme', 'light')
        lightMode()
        mobileThemeBtnBox.setAttribute('aria-mobile-theme-btn', 'false')
        themeBtnCurrentState = false;
        // SVG Light Mode
        mobileThemeBtn.innerHTML = `<svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="css-41qi6t" width="24"  height="24" ><defs><symbol viewBox="0 0 24 24" id="mode-light"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2H13.5V5H10.5V2ZM16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8C14.2091 8 16 9.79086 16 12ZM5.98948 3.86891L3.86816 5.99023L5.98948 8.11155L8.1108 5.99023L5.98948 3.86891ZM2 13.5V10.5H5V13.5H2ZM3.86794 18.0095L5.98926 20.1309L8.11058 18.0095L5.98926 15.8882L3.86794 18.0095ZM13.5 19V22H10.5V19H13.5ZM18.01 15.8884L15.8887 18.0098L18.01 20.1311L20.1313 18.0098L18.01 15.8884ZM19 10.5H22V13.5H19V10.5ZM15.8894 5.99001L18.0107 8.11133L20.1321 5.99001L18.0107 3.86869L15.8894 5.99001Z" fill="currentColor"></path></symbol></defs><use xlink:href="#mode-light" fill="#707A8A"></use></svg>`

    } else {
        localStorage.setItem('theme', 'dark')
        darkMode()
        mobileThemeBtnBox.setAttribute('aria-mobile-theme-btn', 'true')
        themeBtnCurrentState = true;
        // SVG Dark Mode
        mobileThemeBtn.innerHTML = `<svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="css-1biqlx6" width="24"  height="24" ><defs><symbol viewBox="0 0 24 24" id="mode-dark"><path d="M20.9677 12.7676C19.84 13.5449 18.4732 13.9999 17 13.9999C13.134 13.9999 10 10.8659 10 6.99994C10 5.52678 10.4551 4.15991 11.2323 3.03223C6.62108 3.42175 3 7.28797 3 11.9999C3 16.9705 7.02944 20.9999 12 20.9999C16.712 20.9999 20.5782 17.3789 20.9677 12.7676Z" fill="currentColor"></path></symbol></defs><use xlink:href="#mode-dark" fill="#707A8A"></use></svg>`
    }
})


/* Dark-Light Theme */

desktopThemeBtn.addEventListener("click", () => {
    if (desktopThemeBtn.textContent === "dark_mode") {
        localStorage.setItem('theme', 'dark')
        darkMode()
    } else {
        localStorage.setItem('theme', 'light')
        lightMode()
    }
})

function darkMode() {
    let index_url = $('meta[name="app_url"]').attr('content');
    document.querySelector("body").classList.add("dark-mode--theme")
    document.querySelector(".header-logo").src = index_url + '/assets/images/autobanking-dark00.jpg?t=1';
    // desktopThemeBtn
    document.querySelector(".navigation__sub--settings__theme").textContent = "light_mode"
    // mobileThemeBtnBox
    document.querySelector(".mobile-navigation__settings--item__theme").setAttribute('aria-mobile-theme-btn', 'true')
    // mobileThemeBtn
    // SVG Dark Mode
    document.querySelector(".mobile-navigation__settings--item__theme-btn div").innerHTML = `<svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="css-1biqlx6" width="24"  height="24" ><defs><symbol viewBox="0 0 24 24" id="mode-dark"><path d="M20.9677 12.7676C19.84 13.5449 18.4732 13.9999 17 13.9999C13.134 13.9999 10 10.8659 10 6.99994C10 5.52678 10.4551 4.15991 11.2323 3.03223C6.62108 3.42175 3 7.28797 3 11.9999C3 16.9705 7.02944 20.9999 12 20.9999C16.712 20.9999 20.5782 17.3789 20.9677 12.7676Z" fill="currentColor"></path></symbol></defs><use xlink:href="#mode-dark" fill="#707A8A"></use></svg>`;
}


function lightMode() {
    let index_url = $('meta[name="app_url"]').attr('content');
    document.querySelector("body").classList.remove("dark-mode--theme")
    document.querySelector(".header-logo").src = index_url + '/assets/images/autobanking-white00.jpg?t=1'
    // desktopThemeBtn
    document.querySelector(".navigation__sub--settings__theme").textContent = "dark_mode"
    // mobileThemeBtnBox
    document.querySelector(".mobile-navigation__settings--item__theme").setAttribute('aria-mobile-theme-btn', 'false')
    // mobileThemeBtn
    // SVG Light Mode
    document.querySelector(".mobile-navigation__settings--item__theme-btn div").innerHTML = `<svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="css-41qi6t" width="24"  height="24" ><defs><symbol viewBox="0 0 24 24" id="mode-light"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 2H13.5V5H10.5V2ZM16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8C14.2091 8 16 9.79086 16 12ZM5.98948 3.86891L3.86816 5.99023L5.98948 8.11155L8.1108 5.99023L5.98948 3.86891ZM2 13.5V10.5H5V13.5H2ZM3.86794 18.0095L5.98926 20.1309L8.11058 18.0095L5.98926 15.8882L3.86794 18.0095ZM13.5 19V22H10.5V19H13.5ZM18.01 15.8884L15.8887 18.0098L18.01 20.1311L20.1313 18.0098L18.01 15.8884ZM19 10.5H22V13.5H19V10.5ZM15.8894 5.99001L18.0107 8.11133L20.1321 5.99001L18.0107 3.86869L15.8894 5.99001Z" fill="currentColor"></path></symbol></defs><use xlink:href="#mode-light" fill="#707A8A"></use></svg>`;
}


// Rendering Copy write year




/* Menu bar and Mobile Menu Toggle Display */

let hamburgerMenu = document.querySelector(".navigation__sub--menu");
let mobileNavigation = document.querySelector(".mobile-navigation")
let mobileNavigationCancel = document.querySelector(".mobile-navigation__cancel span")
let mobileNavigationBackdrop = document.querySelector(".mobile-navigation-backdrop")


hamburgerMenu.addEventListener("click", () => {
    mobileNavigation.classList.add("show")
    mobileNavigationBackdrop.classList.add("show")

    document.querySelector("body").style.overflowY = "hidden"
})
mobileNavigationCancel.addEventListener("click", () => {
    mobileNavigation.classList.remove("show")
    mobileNavigationBackdrop.classList.remove("show")

    document.querySelector("body").style.overflowY = "auto"
})

/* Mobile Navigation Dropback */

mobileNavigationBackdrop.addEventListener('click', () => {
    mobileNavigation.classList.remove("show")
    mobileNavigationBackdrop.classList.remove("show")

    document.querySelector("body").style.overflowY = "auto"
})


/* Mobile Navigation Accordion */

const mobileNavigationTitle = document.querySelectorAll(".mobile-navigation__main--item__title")
mobileNavigationTitle.forEach(title => {
    if (title.nextElementSibling) {
        let titleContent = title.nextElementSibling
        let arrow = title.children.item(1)
        title.onclick = () => {
            if (!titleContent.classList.contains("effect")) {
                titleContent.classList.add("effect")
                titleContent.style.height = 'auto';
                arrow.style.transform = 'rotate(-180deg)';

                let titleContentHeight = titleContent.clientHeight + 'px'
                titleContent.style.height = '0px';
                setTimeout(() => {
                    titleContent.style.height = titleContentHeight
                }, 0)
            } else {
                arrow.style.transform = 'rotate(0deg)';
                titleContent.style.height = '0px';
                titleContent.addEventListener("transitionend", () => {
                    titleContent.classList.remove("effect")
                }, { once: true })
            }
        }
    }
})


/* Footer Accordion */

const footerTitle = document.querySelectorAll(".footer__links--title")
footerTitle.forEach(title => {

    let footerLinks = title.nextElementSibling
    const pointer = title.children.item(0)

    title.onclick = () => {
        if (!footerLinks.classList.contains("effect")) {
            pointer.textContent = "remove"
            footerLinks.classList.add("effect")
            footerLinks.style.height = "auto"

            let footerLinksHeight = footerLinks.clientHeight + 'px'
            footerLinks.style.height = '0px'
            setTimeout(() => {
                footerLinks.style.height = footerLinksHeight
            }, 0)


        } else {
            pointer.textContent = "add"
            footerLinks.style.height = '0px'
            footerLinks.addEventListener("transitionend", () => {
                footerLinks.classList.remove("effect")
            }, { once: true })

        }
    }
})

$(document).ready(function () {
    // Ko cho phép mua bán
    // $('#submit-bank-sell').prop('disable',true);
    $('#submit-bank-buy').prop('disable',true);
    // select2
    $('.name-bank-buy').select2();
    $('.name-bank-sell').select2();
    // // get bank information
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });
    const noResult = $('#no-result');
    const noResultSell = $('#no-result-sell');
    const bankResult = $('#bank-result');
    const bankResultSell = $('#bank-result-sell');
    const bankNameLabel = $('#bank-name');
    const accountNameLabel = $('#account-name');
    const accountNumberLabel = $('#account-number');
    const qrResult = $('#qr-result');
    const app_url = $('meta[name="app_url"]').attr('content');
    // At verify page
    $('#inputGroupFileAddon04, #verify-bank-number-buy').on('click', function (event) {
        event.preventDefault();
        const _this = $(this);
        const apiCheckBankNumberUrl = `${app_url}/verify-bank-number`;
        let bankName = $('select[name="bank_name"]').val();
        let bankFullName = $('select[name="bank_name"]').find(':selected').data('name');
        let bankNumber = $('input[name="bank_number"]').val();

        $('#no-result, #verified, #err-bank').addClass('d-none');
        $('#no-result-sell, #verified-sell, #err-bank-sell').addClass('d-none');
        if (_this.attr('id') == 'verify-bank-number-sell') {
            bankName = $('.name-bank-sell').val();
            bankFullName = $('.name-bank-sell').find(':selected').data('name');
            bankNumber = $('.bank_number-sell').val();
        }
        

        // console.log(bankNumber);
        // console.log(bankName);
        if (!bankNumber || !bankName) {
            return;
        }
        $('.verify-status').text('');
        $('#verified').addClass('d-none');
        $('#verified-sell').addClass('d-none');
        $.ajax({
            method: 'POST',
            url: apiCheckBankNumberUrl,
            data: {
                bank: bankName,
                account: bankNumber,
                bankFullName
            },
            beforeSend: function () {
                _this.append('<i class="fa fa-spinner fa-spin"></i>')
            },
            success: function (response) {
                console.log(response);
                localStorage.setItem('user', JSON.stringify(response.data));
                localStorage.setItem("bank_name", bankName);

                $('.history-fake').html('');
                if (response.hasOwnProperty('verified')) {
                    if ( response.hasOwnProperty('transaction_histories') ) {
                        $('.history-fake').html(response.transaction_histories);
                    }
                    if ( response.hasOwnProperty('data') ) {
                        if ( response.data.hasOwnProperty('transaction_histories') ) {
                            $('.history-fake').html(response.data.transaction_histories);
                        }
                    }
                }

                if (response.hasOwnProperty('verified')) {
                    localStorage.setItem('verified_' + bankNumber, 1);

                    // Scroll to payment-button
                    $('html, body').animate({
                        scrollTop: $('#payment-button').offset().top
                    }, 1000);


                    $('#verify-button').addClass('d-none');
                    $('#payment-button').removeClass('d-none');
                    bankResult.removeClass('d-none');
                    bankResultSell.removeClass('d-none');
                    $('.verify-status').text('Tài khoản đã xác minh');
                    $('.verify-note').addClass('d-none');
                    $('#verified').removeClass('d-none');
                    // $('#verified-sell').removeClass('d-none');
                    // Kiểm tra nếu đang ở tab sell
                    if( $('.item-buy-sell').hasClass('active') ){
                        $('#submit-bank-sell').prop('disabled',false);
                        $('#sell .choose-bank').removeClass('d-none');
                        $('#sell .choose-bank-sell').removeClass('d-none');

                    }

                    localStorage.setItem("my_bank", bankNumber);
                    localStorage.setItem("bank_id", bankName);
                    localStorage.setItem("bank_name", bankName);
                    localStorage.setItem("accountName", response.data.account_name);
                    localStorage.setItem("bankFullName", bankFullName);

                    accountNameLabel.text(response.data.account_name);
                    accountNumberLabel.text(bankNumber);
                    bankNameLabel.text(bankFullName);

                    // Hiển thị thông tin
                    displayPriceOptions(_this.attr('id'));

                    // Nếu là bán thì cho phép bán, chưa hiểu user là gì
                    if (localStorage.getItem("user")) {
                        if (_this.attr('id') == 'verify-bank-number-sell') {
                            $('#submit-bank-sell').prop('disabled', false);
                        } else {
                            $('#submit-bank-buy').prop('disabled', false);
                        }
                    }

                    return;
                }
                $('.verify-note').removeClass('d-none');
                $('#verified').addClass('d-none');
                $('#payment-button').addClass('d-none');
                $('.verify-status').text('Chưa xác minh')
                if (response.code == "00") {
                    bankNameLabel.text(bankFullName);
                    accountNameLabel.text(response.data.accountName);
                    accountNumberLabel.text(bankNumber);
                    $('#bank-verify').val(`${app_url}/handle-verify/${response.uuid}`)
                    bankResult.removeClass('d-none');
                    bankResultSell.removeClass('d-none');
                    noResult.addClass('d-none');
                    noResultSell.addClass('d-none');
                    $('#verify-button').removeClass('d-none');

                    localStorage.setItem('verified_' + bankNumber, 0);
                    localStorage.setItem("my_bank", bankNumber);
                    localStorage.setItem("accountName", response.data.accountName);
                    localStorage.setItem("bankFullName", bankFullName);

                    // Hiển thị thông tin
                    displayPriceOptions(_this.attr('id'));

                } else if (response.code == '42') {
                    bankResult.addClass('d-none');
                    bankResultSell.addClass('d-none');
                    noResult.removeClass('d-none');
                    noResultSell.removeClass('d-none');
                    $('#verify-button').removeClass('d-none');
                    $('#payment-button').addClass('d-none');
                }

                
                if (response.hasOwnProperty('verified') ) {
                    if( response.verified == 2 ){
                        $('#payment-button').addClass('d-none');
                        $('#verify-button').removeClass('d-none');
                    }
                }
            },
            complete: function () {
                _this.find('i').remove()
            }
        })
    })


    // $('#buy').on('click', function (event) {
    //     event.preventDefault();
    //     const _this = $(this);
    //     const apiUrl = `${app_url}/get-qr-code`;
    //     const bankName = $('select[name="bank_name"]').val();
    //     const bankNumber = $('input[name="bank_number"]').val();
    //     if (!bankNumber || !bankName) {
    //         return;
    //     }
    //     $.ajax({
    //         method: 'POST',
    //         url: apiUrl,
    //         data: {
    //             bank: bankName,
    //             account: bankNumber,
    //         },
    //         beforeSend: function () {
    //             _this.append('<i class="fa fa-spinner fa-spin"></i>')
    //         },
    //         success: function (response) {
    //             console.log(response)
    //             if (response.code == "00") {
    //                 qrResult.attr('src', response.data.qrDataURL);
    //                 qrResult.removeClass('d-none');
    //             } else if (response.code == '42') {
    //                 qrResult.addClass('d-none');
    //                 noResult.removeClass('d-none');
    //             }
    //         },
    //         complete: function () {
    //             _this.find('i').remove()
    //         }
    //     })
    // })

});

function displayPriceOptions(id_btn = '') {
    let account_number = localStorage.getItem("my_bank");
    let verified = localStorage.getItem('verified_' + account_number);
    $.ajax({
        type: 'GET',
        url: "/prices",
        success: function (response) {
            let verificationSellStatus = 'Tài khoản chưa xác minh';
            let verificationStatus =
                `Tài khoản của bạn chưa KYC phí giao dịch là 10%</br>
                <a href="{{route('verify')}}" style="color:#dc3545!important; text-decoration: none;">Nhấn vào để KYC bằng bank với phí giao dịch là 5%</a></br>
                <a href="{{ route('verify-cccd') }}" style="color:#dc3545!important; text-decoration: none;">Nhấn vào để KYC bằng cccd với phí giao dịch là 0%<a>`;

            let fee = 0;
            response.bank.forEach(function (bank) {
                // Nếu đã verified thì ghi đè lại giá trị
                if (bank.status == 1) {
                    verified = 1;
                    verificationSellStatus = 'Tài khoản đã xác minh';
                }

                if (bank.account_number === account_number && verified == 1) {
                    // Nếu account_number trùng khớp, lấy loại type của ngân hàng
                    const bankType = bank.type;
                    // Kiểm tra và cập nhật trạng thái xác minh tương ứng
                    if (bankType === 1) {
                        fee = 0.95;
                        verificationStatus =
                            `Tài khoản của bạn đã được KYC bằng bank phí giao dịch là 5%</br>
                                <a href="{{ route('verify-cccd') }}" style="color:#dc3545!important; text-decoration: none;">Nhấn vào để KYC bằng cccd với phí giao dịch là 0%<a>`;
                    } else if (bankType === 2) {
                        fee = 1;
                        verificationStatus =
                            "Tài khoản của bạn đã được KYC bằng cccd phí giao dịch là 0%";
                    } else {
                        fee = 0.9;
                        verificationStatus =
                            `Tài khoản của bạn chưa KYC phí giao dịch là 10%</br>
                                <a href="{{route('verify')}}" style="color:#dc3545!important; text-decoration: none;">Nhấn vào để KYC bằng bank với phí giao dịch là 5%</a></br>
                                <a href="{{ route('verify-cccd') }}" style="color:#dc3545!important; text-decoration: none;">Nhấn vào để KYC bằng cccd với phí giao dịch là 0%<a>`;
                    }
                    // Thoát khỏi vòng lặp khi tìm thấy khớp
                    return;
                }

                if (verified == 1) {
                    if (id_btn == 'verify-bank-number-sell') {
                        $('#submit-bank-sell').prop('disabled', false);
                    } else {
                        $('#submit-bank-buy').prop('disabled', false);
                    }
                }
            });
            // console.log(id_btn);
            // hiển thị nút submit bán / mua khi có verify
            // if (localStorage.getItem("user")) {
            //     $('#submit-bank-buy').prop('disabled', false);
            //     $('.main-container__bottom').removeClass('d-none');
            //     if (id_btn == 'verify-bank-number-sell') {
            //         document.getElementById("noti-price-sell").innerHTML = verificationSellStatus;
            //     } else {
            //         document.getElementById("noti-price-buy").innerHTML = verificationStatus;
            //     }
            // }
        }
    });
}
