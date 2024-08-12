<style>
    a {
        text-decoration: none;
        color: inherit;
    }

    .help__content--card {
        cursor: pointer;
    }
</style>
<section class="help max-wrapper dark-mode-background std-top-space">
    <div class="max-wrapper__content p-4">
        <div class="help__title">
            <h1 class="std-title theme--text">Cần giúp đỡ?
            </h1>
        </div>
        <div class="help__content">
            <a target="_blank" href="https://t.me/autopay247">
                <div class="help__content--card">
                    <img src="{{ asset('assets/images/cs.svg')}}" alt="24/7 Chat Support" />
                    <div class="help__content--card__content">
                        <h1 class="theme--text">24/7 Chat Support</h1>
                        <div class="theme--text-light">AUTOPAY247.com đem đến dịch vụ hỗ trợ chat trực tuyến 24/24, mọi
                            thắc mắc giao dịch đều được hỗ trợ nhanh nhất.
                        </div>
                        <p>Tìm hiểu thêm
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{ route('faq') }}">
            <div class="help__content--card">
                    <img src="{{ asset('assets/images/community.svg')}}" alt="FAQs" />
                    <div class="help__content--card__content">
                        <h1 class="theme--text">FAQs</h1>
                        <div class="theme--text-light">Xem Câu hỏi thường gặp để biết hướng dẫn chi tiết về các tính
                            năng cụ
                            thể.</div>
                        <p>Tìm hiểu thêm
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{ route('instruct') }}">
                <div class="help__content--card">
                    <img src="{{ asset('assets/images/blog.svg')}}" alt="Hướng dẫn mua bán" />
                    <div class="help__content--card__content">
                        <h1 class="theme--text">Hướng dẫn mua bán</h1>
                        <div class="theme--text-light">Hướng dẫn một cách chi tiết để bạn có trải nghiệm tốt nhất.</div>
                        <p>Tìm hiểu thêm
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <!-- <div id="pre-chat-container" class="chat-container visible"><svg viewBox="0 0 24 24" class="chat-icon"
                style="width: 32px; height: 32px;">
                <path
                    d="M21.002 17V12C21.002 11.6893 20.9862 11.3824 20.9555 11.0798C20.9528 11.0532 20.95 11.0266 20.947 11C20.4496 6.50005 16.6345 3 12.002 3C7.03139 3 3.00195 7.02944 3.00195 12V17H8.00195V11H5.5784C6.05941 7.88491 8.75217 5.5 12.002 5.5C15.2517 5.5 17.9445 7.88491 18.4255 11H16.002V17H16.9009C16.0053 17.8777 14.8748 18.5166 13.6124 18.8139C13.2482 18.3202 12.6625 18 12.002 18C10.8974 18 10.002 18.8954 10.002 20C10.002 21.1046 10.8974 22 12.002 22C12.8165 22 13.5173 21.5131 13.8292 20.8144C16.18 20.3296 18.1958 18.9281 19.4864 17H21.002Z"
                    fill="#181A20"></path>
            </svg>
            <div class="chat-text">Support</div>
        </div> -->
    </div>
    <!--Start of Tawk.to Script-->
    <!-- <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/65aa46870ff6374032c249e4/1hkgi70s1';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();

    </script> -->
    <script>
        window.__lc = window.__lc || {};
        window.__lc.license = 17063865;;
        (function (n, t, c) {
            function i(n) {
                return e._h ? e._h.apply(null, n) : e._q.push(n)
            }
            var e = {
                _q: [],
                _h: null,
                _v: "2.0",
                on: function () {
                    i(["on", c.call(arguments)])
                },
                once: function () {
                    i(["once", c.call(arguments)])
                },
                off: function () {
                    i(["off", c.call(arguments)])
                },
                get: function () {
                    if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                    return i(["get", c.call(arguments)])
                },
                call: function () {
                    i(["call", c.call(arguments)])
                },
                init: function () {
                    var n = t.createElement("script");
                    n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js",
                        t.head.appendChild(n)
                }
            };
            !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
        }(window, document, [].slice))
    </script>
    <!-- <noscript><a href="https://www.livechat.com/chat-with/17063865/" rel="nofollow">Chat with us</a>, powered by <a
            href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript> -->
    <!--End of Tawk.to Script-->
</section>