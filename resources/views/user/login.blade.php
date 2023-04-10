<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <script src="https://kit.fontawesome.com/5fde2fdc76.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap">
  <link rel="stylesheet" href="{{asset('')}}users/login/style.css">

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
    <div class="left-section">
        <div class="card">
            <img src="{{asset('')}}users/login/logo.svg" alt="DANAKO">
            <h2>Masuk</h2>
            <p>Masuk untuk mulai berbuat kebaikan</p>
            <form action="#" method="post" id="login">
                <div class="form-group">
                    <label for="email" title="Email address">
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        <input type="email" id="email" name="email" placeholder="Email" required
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </label>
                </div>
                <div class="form-group">
                    <label for="password" title="Password">
                        <span class="icon"><i class="fas fa-lock"></i></span>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <i class="far fa-eye" id="togglePassword" style="margin-left: -19px; cursor: pointer;"></i>
                    </label>
                </div>
                <a href="#" class="hyperlnk">Lupa kata sandi?</a>
                <button type="submit" class="login-btn">Masuk</button>
                <a href="#" class="hyperlnk">Belum punya akun? <b>Gabung Sekarang</b></a>
            </form>
            <p>atau lanjutkan dengan</p>
            <div class="circle-buttons">
                <a href="#" class="google"><i class="fab fa-google"></i></a>
                <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </div>

    <div class="right-section shade background-image">

    </div>

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
