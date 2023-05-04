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
                        <h2>Apa itu Danako?</h2>
                    </div>

                    <p>Kitabisa.com adalah platform crowdfunding yang didirikan pada tahun 2013 di Indonesia. Platform ini memungkinkan individu, kelompok, maupun organisasi untuk menggalang dana secara online untuk berbagai keperluan seperti pendidikan, kesehatan, bencana alam, sosial, dan lain sebagainya.</p>
                    <p>Kitabisa.com memberikan kemudahan bagi pengguna untuk membuat kampanye penggalangan dana dengan memilih jenis kampanye yang sesuai dengan kebutuhan dan mengatur target dana yang dibutuhkan. Selain itu, platform ini juga menyediakan fitur-fitur lain seperti dukungan sosial media, laporan perkembangan kampanye, dan pencairan dana secara aman dan mudah.</p>
                    
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
            <h2>Pertanyaan Terkait Apa Sih Danako Itu ?</h2>
            <p></p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="choose-card">
                    <i class="flaticon-resume"></i>
                    <h3>Apakah aman untuk melakukan donasi melalui Danako?</h3>
                    <p>Ya, Danako memiliki sistem keamanan yang ketat untuk melindungi data pribadi dan informasi keuangan pengguna. Selain itu, Danako juga bekerja sama dengan lembaga keuangan terpercaya dan memiliki sertifikasi keamanan yang memenuhi standar internasional. </p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="choose-card">
                    <i class="flaticon-recruitment"></i>
                    <h3>Apakah donasi yang diberikan melalui Danako bisa dikembalikan?</h3>
                    <p>Tidak, donasi yang telah diberikan melalui Danako tidak dapat dikembalikan kecuali terjadi kesalahan atau kecurangan dari pihak penerima dana. </p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 offset-sm-3 offset-lg-0">
                <div class="choose-card">
                    <i class="flaticon-employee"></i>
                    <h3>Apakah ada biaya atau potongan tertentu yang dikenakan oleh Danako?</h3>
                    <p>Ya, Danako akan memotong sejumlah biaya administrasi dan biaya transaksi dari total donasi yang diberikan. Namun, besarnya potongan ini akan tergantung pada jenis kampanye dan metode pembayaran yang dipilih.</p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="about-section pt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-text">
                    <div class="section-title">
                        <h2>Sejarah itu Danako?</h2>
                    </div>

                    <p>Sejak didirikan,danako.my.id telah sukses menggalang dana untuk berbagai keperluan mulai dari membantu korban bencana alam hingga membantu pemulihan kesehatan pasien yang membutuhkan biaya pengobatan yang mahal. Platform ini telah diakui oleh berbagai pihak dan meraih beberapa penghargaan termasuk penghargaan "Social Entrepreneur of the Year" dari Ernst & Young pada tahun 2016</p>
                    <p>Selain itu,danako.my.id juga telah bekerja sama dengan berbagai institusi, perusahaan, dan komunitas dalam menggalang dana untuk berbagai keperluan. Hal ini menunjukkan bahwa platform crowdfunding ini memiliki peran yang penting dalam membantu masyarakat Indonesia dalam mengatasi berbagai tantangan sosial dan ekonomi.</p>
                    
                    <div class="theme-btn">
                        <a href="" class="default-btn bg-primary">Donasi Sekarang</a>
                    </div>
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


