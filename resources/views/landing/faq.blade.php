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

<h2 class="text-center text-black pt-3">FAQS</h2>
  <!-- Faq Section Start -->
  <section class="faq-section pt-2 pb-5">
    <div class="faq-container">
      <div class="faq">
        <div class="question-container">
          <h2 class="text-white">Apa itu Danako?</h2>
          <div class="toggle-btn">
            <p>+</p>
          </div>
        </div>
        <div class="answer">
          <p>Danako adalah platform crowdfunding atau penggalangan dana online yang memfasilitasi individu atau kelompok untuk menggalang dana untuk berbagai keperluan sosial seperti kemanusiaan, pendidikan, lingkungan, kesehatan, dan lain sebagainya.</p>
        </div>
      </div>
      
      <div class="faq">
        <div class="question-container">
          <h2 class="text-white">Bagaimana cara menggunakan Danako?</h2>
          <div class="toggle-btn">
            <p>+</p>
          </div>
        </div>
        <div class="answer">
          <p>Untuk menggunakan Danako, pertama-tama Anda harus membuat akun di situs web atau aplikasi Danako. Setelah itu, Anda bisa memilih kampanye yang ingin didukung atau membuat kampanye sendiri. Kemudian, Anda bisa melakukan donasi melalui berbagai metode pembayaran yang tersedia.</p>
        </div>
      </div>
      
      <div class="faq">
        <div class="question-container">
          <h2 class="text-white">Apakah aman untuk melakukan donasi melalui Danako?</h2>
          <div class="toggle-btn">
            <p>+</p>
          </div>
        </div>
        <div class="answer">
          <p>Ya, Danako memiliki sistem keamanan yang ketat untuk melindungi data pribadi dan informasi keuangan pengguna. Selain itu, Danako juga bekerja sama dengan lembaga keuangan terpercaya dan memiliki sertifikasi keamanan yang memenuhi standar internasional.</p>
        </div>
      </div>
       <div class="faq">
        <div class="question-container">
          <h2 class="text-white">Apakah donasi yang diberikan melalui Danako bisa dikembalikan?</h2>
          <div class="toggle-btn">
            <p>+</p>
          </div>
        </div>
        <div class="answer">
          <p>Tidak, donasi yang telah diberikan melalui Danako tidak dapat dikembalikan kecuali terjadi kesalahan atau kecurangan dari pihak penerima dana.</p>
        </div>
      </div>

      <div class="faq">
        <div class="question-container">
          <h2 class="text-white">Apakah ada biaya atau potongan tertentu yang dikenakan oleh Danako?</h2>
          <div class="toggle-btn">
            <p>+</p>
          </div>
        </div>
        <div class="answer">
          <p>Ya, Danako akan memotong sejumlah biaya administrasi dan biaya transaksi dari total donasi yang diberikan. Namun, besarnya potongan ini akan tergantung pada jenis kampanye dan metode pembayaran yang dipilih.</p>
        </div>
      </div>

      <div class="faq">
        <div class="question-container">
          <h2 class="text-white">Apakah Danako hanya beroperasi di Indonesia?</h2>
          <div class="toggle-btn">
            <p>+</p>
          </div>
        </div>
        <div class="answer">
          <p>Danako Beroporasi hanya di indonesia.</p>
        </div>
      </div>

    </div>
    
</section>
<!-- Faq Section End -->



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


