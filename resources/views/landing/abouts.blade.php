@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')

<section class="h-utama">
    <div class="container-fluid">
        <div class="banner">
            <div class="row ">
                <div class="col-md-6">
                    <p class="text-dark">Tak perlu sejuta untuk berdampak, mulai dari seribu</p>
                    <h1 class="pb-3 color-primary">Satukan kebaikan<br><span class="text-dark">Salurkan kebermanfaatan.</span> </h1>
                    <button type="button" class="btn btn-primary btn-lg bg-danako-primary border-0 border-5">Donasi sekarang</button>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('') }}danako/img/campaignunggulan.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- About Section Start -->
 <section class="about-section pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-text">
                    <div class="section-title">
                        <h2>How We Started</h2>
                    </div>

                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>

                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="{{ asset('') }}danako/img/campaignunggulan.png" alt="about image">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<section class="why-choose-two my-4 mx-4 pt-3">
    <div class="container">
        <div class="section-title text-center">
            <h2>Why You Choose Us Among Other Job Site?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="choose-card">
                    <i class="flaticon-resume"></i>
                    <h3>Advertise Job</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore   </p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="choose-card">
                    <i class="flaticon-recruitment"></i>
                    <h3>Recruiter Profiles</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore   </p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 offset-sm-3 offset-lg-0">
                <div class="choose-card">
                    <i class="flaticon-employee"></i>
                    <h3>Find Your Dream Job</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore   </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="grow-business pn-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="grow-text">
                    <div class="section-title">
                        <h2>Grow Your Business Faster With Premium Advertising</h2>
                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.
                    </p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Consectetur adipiscing elit.
                    </p>

                    <div class="theme-btn">
                        <a href="#" class="default-btn">Checkout More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="grow-img">
                    <img src="{{ asset('') }}danako/img/campaignunggulan.png" alt="about image">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="counter-section mt-3 mb-3 pt-3 pb-3">
    <div class="container">
        <div class="row counter-area pt-2">
            <div class="col-lg-3 col-6">
                <div class="counter-text">
                    <i class="flaticon-resume"></i>
                    <h2><span>1225</span></h2>
                    <p>Job Posted</p>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="counter-text">
                    <i class="flaticon-recruitment"></i>
                    <h2><span>145</span></h2>
                    <p>Job Filed</p>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="counter-text">
                    <i class="flaticon-portfolio"></i>
                    <h2><span>170</span></h2>
                    <p>Company</p>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="counter-text">
                    <i class="flaticon-employee"></i>
                    <h2><span>125</span></h2>
                    <p>Members</p>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


@push('after-script')
  <script>
    const questionContainers = document.querySelectorAll('.question-container');
const answers = document.querySelectorAll('.answer');
let activeAnswer = answers[0];

// Adds the visible class to the first answer and rotate class to the first toggle button
questionContainers[0].querySelector('.toggle-btn p').classList.add('rotate');
activeAnswer.classList.add('visible');

questionContainers.forEach((container, index) => {
  container.addEventListener('click', () => {
    const answer = answers[index];
    const toggleBtn = container.querySelector('.toggle-btn p');

    if (activeAnswer !== null && activeAnswer !== answer) {
      const activeToggleBtn = activeAnswer.previousElementSibling.querySelector('.toggle-btn p');
      activeToggleBtn.classList.remove('rotate');
      activeAnswer.classList.remove('visible');
    }

    toggleBtn.classList.toggle('rotate');

    if (answer.classList.contains('visible')) {
      answer.classList.remove('visible');
      activeAnswer = null;
    } else {
      answers.forEach(a => {
        a.classList.remove('visible');
      });
      answer.classList.add('visible');
      activeAnswer = answer;
    }
  });
});

  </script>
@endpush


