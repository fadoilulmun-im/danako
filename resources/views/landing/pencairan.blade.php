@extends('landing.layouts.app')

@section('title', 'Pencairan')

@push('after-style')

<style>
    h5.pt-1.pb-1 {
      position: relative;
    }
  
    h5.pt-1.pb-1::after {
      content: "";
      position: absolute;
      right: -10px;
      top: 50%;
      transform: translateY(-50%);
      width: 30%;
      height: 2px;
      background-color: blue;
    }
  </style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-8">
       
        <div class="p-4 bg-white rounded mb-5">
            <!-- Rounded tabs -->
            <h1 class="color-primary mb-2">Pencairan Dana </h1>
            <button type="button" class="btn btn-outline-success btn-lg mb-5">Ajukan Pencarian Dana</button>
            <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
              <li class="nav-item flex-sm-fill">
                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">Home</a>
              </li>
              <li class="nav-item flex-sm-fill">
                <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Profile</a>
              </li>
              <li class="nav-item flex-sm-fill">
                <a id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Contact</a>
              </li>
              <li class="nav-item flex-sm-fill">
                <a id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Contact</a>
              </li>
              <li class="nav-item flex-sm-fill">
                <a id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Contact</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                    <div class="container-fluid" >
    
                        <div class="row pt-3 pb-3 shadow">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-6 text-start pt-2"><h4 class="card-title pb-1 pt-1">Pencairan Dana<span class="py-3 px-3 text-success">Rp.15000000</span></h4></div>
                                <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Aktiv</button></div>
                              </div>
                              <h6 class="card-text">Lorem ipsum dolor sit amet, consectetur adipis</h6>
                              <h6 class="card-text ">Lorem ipsum dolor sit amet, consectetur adipis</h6>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipis </p>
                              <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 " alt="...">
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 " alt="...">
                                </div>
                              </div>
                            
                            </div>
                        </div>
    
                        <div class="row pt-3 pb-3 shadow">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-6 text-start pt-2"><h4 class="card-title pb-1 pt-1">Pencairan Dana<span class="py-3 px-3 text-success">Rp.15000000</span></h4></div>
                                <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Aktiv</button></div>
                              </div>
                              <h6 class="card-text">Lorem ipsum dolor sit amet, consectetur adipis</h6>
                              <h6 class="card-text ">Lorem ipsum dolor sit amet, consectetur adipis</h6>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipis </p>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <div>
                                          An example warning alert with an icon
                                        </div>
                                      </div>
                                </div>
                              </div>
                            
                            </div>
                        </div>
     
                    </div>
                </div>
              <div id="profile" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                <p class="text-muted">Profile Tab Content</p>
              </div>
    
    
              <div id="contact" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                <p class="text-muted">Contact Tab Content</p>
              </div>
    
    
            </div>
            <!-- End rounded tabs -->
          </div>         
    </div>
    <div class="col-md-4 ">
        <div class="p-4 bg-white rounded mb-5">
            <div class="row">
                <div class="col-sm-12 container shadow">
                    <h5 class="pt-4 pb-4">Informasi Pengunaan Data</h5>

                    <div class="bg-info border border-primary mb-3 rounded-3" >
                        <div class="card-body text-white">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="card-title">Sudah Di Cairkan</h6>
                                    <p class="card-text">Rp.273618931</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-title">Belum Di Cairkan</p>
                                    <p class="card-text">Rp.273618931</p>
                                </div>
                                <div class="col-md-12 px-5 py-1 bg-light text-dark rounded-3">
                                    Data Di Perbarui setiap 15 menit harap Terakir 23 - Maret - 2022
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="pt-1 pb-1">Total Transaksi sampai saat  ini</h5>
                    <div class="row">
                        <div class="col">
                          <p>Jumlah Saat Ini</p>
                          <p>Jumlah Saat Ini</p>
                          <p>Jumlah Saat Ini</p>
                        </div>
                        <div class="col text-right">
                            <p>Rp 30000</p>
                          <p>Rp 30000</p>
                          <p>Rp 30000</p>
                        </div>
                    </div>
                    <h5 class="pt-1 pb-1">Rincian dana terkumpul</h5>
                    <div class="row">
                        <div class="col">
                          <p>Jumlah Saat Ini</p>
                          <p>Jumlah Saat Ini</p>
                          <p>Jumlah Saat Ini</p>
                        </div>
                        <div class="col text-right">
                            <p>Rp 30000</p>
                          <p>Rp 30000</p>
                          <p>Rp 30000</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                          <p>Dana Dapat Di Cairkan</p>
                          
                        </div>
                        <div class="col text-right">
                            <p>Rp 30000</p>
                        </div>
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                      
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                       
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@push('after-script')
<script>
        var tabs = document.querySelectorAll('#myTab a')
  
  // Menambahkan event click ke setiap elemen tab
  tabs.forEach(function(tab) {
    tab.addEventListener('click', function(e) {
      e.preventDefault()

      // Menangkap target tab yang diklik
      var target = this.getAttribute('href')

      // Menghapus kelas 'active' dari semua elemen tab
      tabs.forEach(function(tab) {
        tab.classList.remove('active')
      })

      // Menambahkan kelas 'active' ke tab yang diklik
      this.classList.add('active')

      // Menghapus kelas 'show' dan 'active' dari semua elemen konten tab
      var tabContents = document.querySelectorAll('.tab-pane')
      tabContents.forEach(function(content) {
        content.classList.remove('show', 'active')
      })

      // Menambahkan kelas 'show' dan 'active' ke konten tab yang sesuai dengan tab yang diklik
      document.querySelector(target).classList.add('show', 'active')
    })
  })
</script>
@endpush


