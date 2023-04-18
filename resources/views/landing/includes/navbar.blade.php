<section>
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('danako/img/logo.png') }}" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <form class="d-flex">
              <input class="form-control" type="search" placeholder="Search" class="search">   
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Prosedur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">FAQs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang Kami</a>
          </li>
          <li class="nav-item dropdown" id="user-login">
            
          </li>
        </ul>
      </div>
    </div>
  </nav>
</section>