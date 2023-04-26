<script src="{{ asset('') }}assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('danako/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
  const days = (date_1, date_2) =>{
    let difference = date_1.getTime() - date_2.getTime();
    let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));
    return TotalDays;
  }

  const detail = (id) => {
    let url = "{{ route('campaigns.detail', ':id') }}";
    url = url.replace(':id', id);
    window.location.href = url;
  }

  const logout = () => {
    $.ajax({
      url: "{{ route('api.user.logout') }}",
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}",
        'Authorization': 'Bearer '+localStorage.getItem('_token'),
      },
      success: (response) => {
        localStorage.clear();
        window.location.href = "{{ route('home') }}";
      },
      error: (response) => {
        let res = response.responseJSON;
        let code = res.meta.code;
        Swal.fire({
            title: 'ERROR',
            text: res.meta.message,
            icon: 'error',
        })
      }
    })
  }
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>

<script>
  $(document).ready(()=>{
    if(localStorage.getItem('_token')){
      $('#user-login').html(`
        <button class="btn btn-success bg-danako-primary border-0 rounded-circle dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user"></i> <!-- menggunakan ikon akun dari Font Awesome -->
        </button>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
          <li><a class="dropdown-item" href="{{ route('ziswaf') }}">Ziswaf</a></li>
          <li><a class="dropdown-item" href="{{ route('all-campaign') }}">All Campaign</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="{{ route('ajukan-campaign') }}">Buat Campaign</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><button id="logout-btn" class="dropdown-item" onclick="logout()">Logout</button></li>
        </ul>
      `)
    }else{
      $('#user-login').html(`
        <a href="{{ route('login') }}" class="btn btn-success bg-danako-primary rounded border-0">
          <i class="fa fa-sign-in"></i>
          Login
        </a>
      `)
    }
  })
</script>
