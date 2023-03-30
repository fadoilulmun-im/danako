<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V18</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('users') }}/images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="{{ asset('users') }}/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('users') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('users') }}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('users') }}/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('users') }}/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('users') }}/vendor/animsition/css/animsition.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('users') }}/vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('users') }}/vendor/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('users') }}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('users') }}/css/main.css">

    <meta name="robots" content="noindex, follow">
    <script nonce="43441971-bcc1-4e58-8481-d19929f44f3d">
        (function(w, d) {
            ! function(di, dj, dk, dl) {
                di[dk] = di[dk] || {};
                di[dk].executed = [];
                di.zaraz = {
                    deferred: [],
                    listeners: []
                };
                di.zaraz.q = [];
                di.zaraz._f = function(dm) {
                    return function() {
                        var dn = Array.prototype.slice.call(arguments);
                        di.zaraz.q.push({
                            m: dm,
                            a: dn
                        })
                    }
                };
                for (const dp of ["track", "set", "debug"]) di.zaraz[dp] = di.zaraz._f(dp);
                di.zaraz.init = () => {
                    var dq = dj.getElementsByTagName(dl)[0],
                        dr = dj.createElement(dl),
                        ds = dj.getElementsByTagName("title")[0];
                    ds && (di[dk].t = dj.getElementsByTagName("title")[0].text);
                    di[dk].x = Math.random();
                    di[dk].w = di.screen.width;
                    di[dk].h = di.screen.height;
                    di[dk].j = di.innerHeight;
                    di[dk].e = di.innerWidth;
                    di[dk].l = di.location.href;
                    di[dk].r = dj.referrer;
                    di[dk].k = di.screen.colorDepth;
                    di[dk].n = dj.characterSet;
                    di[dk].o = (new Date).getTimezoneOffset();
                    if (di.dataLayer)
                        for (const dw of Object.entries(Object.entries(dataLayer).reduce(((dx, dy) => ({
                                ...dx[1],
                                ...dy[1]
                            }))))) zaraz.set(dw[0], dw[1], {
                            scope: "page"
                        });
                    di[dk].q = [];
                    for (; di.zaraz.q.length;) {
                        const dz = di.zaraz.q.shift();
                        di[dk].q.push(dz)
                    }
                    dr.defer = !0;
                    for (const dA of [localStorage, sessionStorage]) Object.keys(dA || {}).filter((dC => dC
                        .startsWith("_zaraz_"))).forEach((dB => {
                        try {
                            di[dk]["z_" + dB.slice(7)] = JSON.parse(dA.getItem(dB))
                        } catch {
                            di[dk]["z_" + dB.slice(7)] = dA.getItem(dB)
                        }
                    }));
                    dr.referrerPolicy = "origin";
                    dr.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(di[dk])));
                    dq.parentNode.insertBefore(dr, dq)
                };
                ["complete", "interactive"].includes(dj.readyState) ? zaraz.init() : di.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-more" style="background-image: url('users/images/bg-01.png');"></div>
                <form class="login100-form validate-form">
                    <img src="{{ asset('users') }}/images/logo.svg" class="login100-form-title p-b-43" alt="DANAKO">
                    <span class="login100-form-title p-b-43">
                        Masuk
                    </span>
                    <p>Masuk Untuk Mulai Berbuat Kebaikan</p>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>
                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div>
                            <a href="{{ asset('users') }}/#" class="txt1">
                                lupa kata sandi ?
                            </a>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            Belum Punya Akun? Gabung Sekarang
                        </span>
                        <br><br>
                        <span class="txt3">
                            Atau lanjutkan dengan
                        </span>
                    </div>
                    <div class="login100-form-social flex-c-m">
                        <a href="{{ asset('users') }}/#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </a>
                        <a href="{{ asset('users') }}/#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="vendor/animsition/js/animsition.min.js"></script>

    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>

    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>

    <script src="vendor/countdowntime/countdowntime.js"></script>

    <script src="js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vb26e4fa9e5134444860be286fd8771851679335129114"
        integrity="sha512-M3hN/6cva/SjwrOtyXeUa5IuCT0sedyfT+jK/OV+s+D0RnzrTfwjwJHhd+wYfMm9HJSrZ1IKksOdddLuN6KOzw=="
        data-cf-beacon='{"rayId":"7af0d289ce7ea137","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.3.0","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>
