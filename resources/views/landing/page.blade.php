<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/5fde2fdc76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('') }}users/landing/style-landing.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <!-- Navbar -->
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-logo">
                <img src="{{ asset('') }}users/landing/logo.svg" alt="logo">
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>

        <div class="nav-links">
            <a href="#">Prosedur</a>
            <a href="#">FAQs</a>
            <a href="#">Tentang Kami</a>
            <a href="{{route('login')}}"><i class="fa fa-sign-in"></i>Masuk</a>
        </div>
    </div>


    <!-- Banner -->
    <div class="banner">
        <h1>
            <span class="highlight">Lorem ipsum</span> dolor sit amet consectetur <span
                class="highlight">adipisicing</span> elit.
        </h1>
        <p>Learn more about our products and services</p>
        <div class="banner-buttons">
            <button class="banner-button">Donasi Sekarang</button>
            <button class="banner-button">Ajukan Campaign</button>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="why-choose-us">
        <h2>Kenapa pilih <span class="logo"><img src="{{ asset('') }}users/landing/danako.svg" alt="logo">?</span></h2>
        <div class="card-container">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">Cepat<span class="card-icon"><i class="fas fa-rocket"></i></span></div>
                    <div class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus bibendum,
                        ipsum eu gravida tempus, ipsum lorem ullamcorper ligula, vel dignissim ante nibh vel odio.
                        Praesent maximus aliquet justo.</div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="card-title">Tepat<span class="card-icon"><i class="fas fa-check"></i></span></div>
                    <div class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus bibendum,
                        ipsum eu gravida tempus, ipsum lorem ullamcorper ligula, vel dignissim ante nibh vel odio.
                        Praesent maximus aliquet justo.</div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="card-title">Berdampak<span class="card-icon"><i class="fas fa-bullseye"></i></span>
                    </div>
                    <div class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus bibendum,
                        ipsum eu gravida tempus, ipsum lorem ullamcorper ligula, vel dignissim ante nibh vel odio.
                        Praesent maximus aliquet justo.</div>
                </div>
            </div>
        </div>
    </div>




    <!-- Flagship Program -->
    <div class="campaign">
        <h1>Mereka yang<span class="highlight"> segera </span> butuh bantuanmu</h1>
    </div>
    <div class="campaign-card-container">
        <div class="campaign-card">
            <div class="campaign-image">
                <img src="{{ asset('') }}users/landing/campaign-image.jpg" alt="Campaign Image">
            </div>
            <div class="campaign-info">
                <p class="campaign-datetime">10 April 2023, 10:00 AM</p>
                <h2 class="campaign-title">Campaign Title</h2>
                <p class="campaign-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra
                    luctus mauris a bibendum.</p>
                <div class="campaign-progress">
                    <div class="progress-bar" style="width: 60%;">
                        <div class="progress-fill"></div>
                    </div>
                    <div class="campaign-details">
                        <p class="campaign-collected"><span>Rp 3.500.000</span></p>
                        <p class="campaign-deadline"><span>15 hari lagi</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="campaign-card">
            <div class="campaign-image">
                <img src="{{ asset('') }}users/landing/campaign-image.jpg" alt="Campaign Image">
            </div>
            <div class="campaign-info">
                <p class="campaign-datetime">10 April 2023, 10:00 AM</p>
                <h2 class="campaign-title">Campaign Title</h2>
                <p class="campaign-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra
                    luctus mauris a bibendum.</p>
                <div class="campaign-progress">
                    <div class="progress-bar" style="width: 60%;">
                        <div class="progress-fill"></div>
                    </div>
                    <div class="campaign-details">
                        <p class="campaign-collected"><span>Rp 3.500.000</span></p>
                        <p class="campaign-deadline"><span>15 hari lagi</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="campaign-card">
            <div class="campaign-image">
                <img src="{{ asset('') }}users/landing/campaign-image.jpg" alt="Campaign Image">
            </div>
            <div class="campaign-info">
                <p class="campaign-datetime">10 April 2023, 10:00 AM</p>
                <h2 class="campaign-title">Campaign Title</h2>
                <p class="campaign-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra
                    luctus mauris a bibendum.</p>
                <div class="campaign-progress">
                    <div class="progress-bar" style="width: 60%;">
                        <div class="progress-fill"></div>
                    </div>
                    <div class="campaign-details">
                        <p class="campaign-collected"><span>Rp 3.500.000</span></p>
                        <p class="campaign-deadline"><span>15 hari lagi</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="campaign-card">
            <div class="campaign-image">
                <img src="{{ asset('') }}users/landing/campaign-image.jpg" alt="Campaign Image">
            </div>
            <div class="campaign-info">
                <p class="campaign-datetime">10 April 2023, 10:00 AM</p>
                <h2 class="campaign-title">Campaign Title</h2>
                <p class="campaign-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra
                    luctus mauris a bibendum.</p>
                <div class="campaign-progress">
                    <div class="progress-bar" style="width: 60%;">
                        <div class="progress-fill"></div>
                    </div>
                    <div class="campaign-details">
                        <p class="campaign-collected"><span>Rp 3.500.000</span></p>
                        <p class="campaign-deadline"><span>15 hari lagi</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Testimony -->
    <div class="testimony">
        <h2>What Our Customers Say</h2>
        <p>Our customers love our products and services. Here are some of the things they have to say:</p>
        <ul>
            <li>"This is the best company I've ever worked with!"</li>
            <li>"Their products are top-notch and their customer service is excellent."</li>
            <li>"I would highly recommend this company to anyone looking for quality products and services."</li>
        </ul>
    </div>

    <!-- Affiliated Company -->
    <div class="affiliated-company">
        <h2>Our Affiliated Companies</h2>
        <p>We work with a number of affiliated companies to provide you with the best possible products and services.
            Here are some of our partners:</p>
        <ul>
            <li>Company A</li>
            <li>Company B</li>
            <li>Company C</li>
        </ul>
    </div>

    <!-- Footer -->
    <div class="footer">
        <h2>Contact Us</h2>
        <p>If you have any questions or comments, please feel free to contact us at <a
                href="mailto:info@mycompany.com">info@mycompany.com</a>.</p>
    </div>

</body>

</html>
