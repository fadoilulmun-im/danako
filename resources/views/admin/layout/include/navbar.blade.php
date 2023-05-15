<div class="navbar-custom">
  <ul class="list-unstyled topnav-menu float-end mb-0">
      

      <li class="dropdown d-inline-block d-lg-none">
          <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <i class="fe-search noti-icon"></i>
          </a>
          <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
              <form class="p-3">
                  <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
              </form>
          </div>
      </li>

      <li class="dropdown notification-list topbar-dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <i class="fe-bell noti-icon"></i>
              <span class="badge bg-danger rounded-circle noti-icon-badge">{{ $userCount ?? '0' }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-lg">

              <!-- item-->
              <div class="dropdown-item noti-title">
                  <h5 class="m-0">
                      <span class="float-end">
                          <a href="" class="text-dark">
                              <small>Clear All</small>
                          </a>
                      </span>Notification Penggung Baru
                  </h5>
              </div>

              <div class="noti-scroll" data-simplebar>

                @foreach ($usersCreated as $user)
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item active">
                      <div class="notify-icon">
                          <img src="{{asset('assets/images/users/user-1.jpg')}}" class="img-fluid rounded-circle" alt="" /> </div>
                      <p class="notify-details">Cristina Pride</p>
                      <p class="text-muted mb-0 user-msg">
                          <small>Hi, How are you? What about our next meeting</small>
                      </p>
                  </a>
                @endforeach

              </div>

              <!-- All-->
              <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                  View all
                  <i class="fe-arrow-right"></i>
              </a>

          </div>
      </li>

      <li class="dropdown notification-list topbar-dropdown">
          <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <img src="" id="user-img-nav" alt="user-image" class="rounded-circle">
              <span class="pro-user-name ms-1">
                  {{-- Nowak <i class="mdi mdi-chevron-down"></i>  --}}
              </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
              <!-- item-->
              <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome !</h6>
              </div>

              <!-- item-->
              <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                  <i class="fe-user"></i>
                  <span>My Account</span>
              </a>

              <div class="dropdown-divider"></div>

              <!-- item-->
              <a href="#" onclick="logout()" class="dropdown-item notify-item">
                  <i class="fe-log-out"></i>
                  <span>Logout</span>
              </a>

          </div>
      </li>

      <li class="dropdown notification-list">
          <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
              <i class="fe-settings noti-icon"></i>
          </a>
      </li>

  </ul>

  <!-- LOGO -->
  <div class="logo-box">
      <a href="index.html" class="logo logo-light text-center">
          <span class="logo-sm">
              <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
          </span>
          <span class="logo-lg">
              <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="16">
          </span>
      </a>
      <a href="index.html" class="logo logo-dark text-center">
          <span class="logo-sm">
              <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
          </span>
          <span class="logo-lg">
              <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="16">
          </span>
      </a>
  </div>

  <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
      <li>
          <button class="button-menu-mobile disable-btn waves-effect">
              <i class="fe-menu"></i>
          </button>
      </li>

      <li>
          <h4 class="page-title-main">Dashboard</h4>
      </li>

  </ul>

  <div class="clearfix"></div> 

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.pro-user-name').html((localStorage.getItem('_user_username') ?? 'default') + ' <i class="mdi mdi-chevron-down"></i>');
        $('#user-img-nav').attr('src', localStorage.getItem('_user_photo_profile'));
    });
</script>