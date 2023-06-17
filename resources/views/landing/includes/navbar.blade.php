<section>
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container">
      <div class="d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('danako/img/logo.png') }}" />
        </a>
        <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#myModal">
          <i id="question-icon" class="fas fa-question-circle ml-2"></i>
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          {{-- <li class="nav-item">
            <form class="d-flex" action="{{ url('all-campaigns') }}">
              <input class="form-control" type="search" placeholder="Search" class="search" name="search">   
            </form>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="{{ url('prosedur') }}">Prosedur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('faq') }}">FAQs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('tentang-kami') }}">Tentang Kami</a>
          </li>
          <li class="nav-item dropdown" id="user-login">
            
          </li>
        </ul>
      </div>
    </div>
  </nav>
</section>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengenalan Danako </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>DanaKO adalah platform crowdfunding karya mahasiswa yang berada dalam program studi Manajemen Sistem Informasi, angkatan MSIB batch 4, di Lingkungan Mahasiswa Islam. Platform ini memungkinkan individu, kelompok, maupun organisasi untuk menggalang dana secara online untuk berbagai keperluan seperti pendidikan, kesehatan, bencana alam, sosial, dan lain sebagainya.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>