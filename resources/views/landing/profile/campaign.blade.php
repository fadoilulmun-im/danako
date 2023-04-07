@extends('landing.layouts.profile')

@section('title')
    Campaign
@endsection



@section('content')
<div class="p-5 bg-white rounded shadow mb-5">
    <!-- Rounded tabs -->
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
            <div class="container-fluid" style="height: 1500px; overflow-y: scroll;">
           
                <div class="row pt-2 pb-2">
                    <div class="col-md-4">
                      <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 pt-5" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">Gemba Cianjur</h6></div>
                        <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Aktiv</button></div>
                      </div>
                      <p class="card-text pt-2 pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                      <div class="progress">
                        <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                        <div class="col-6 text-end pt-2">46 hari lagi</div>
                      </div>
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-md-4">
                      <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 pt-5" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">Gemba Cianjur</h6></div>
                        <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Aktiv</button></div>
                      </div>
                      <p class="card-text pt-2 pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                      <div class="progress">
                        <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                        <div class="col-6 text-end pt-2">46 hari lagi</div>
                      </div>
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-md-4">
                      <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 pt-5" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">Gemba Cianjur</h6></div>
                        <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Aktiv</button></div>
                      </div>
                      <p class="card-text pt-2 pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                      <div class="progress">
                        <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                        <div class="col-6 text-end pt-2">46 hari lagi</div>
                      </div>
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-md-4">
                      <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 pt-5" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">Gemba Cianjur</h6></div>
                        <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Aktiv</button></div>
                      </div>
                      <p class="card-text pt-2 pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                      <div class="progress">
                        <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                        <div class="col-6 text-end pt-2">46 hari lagi</div>
                      </div>
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-md-4">
                      <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 pt-5" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">Gemba Cianjur</h6></div>
                        <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Aktiv</button></div>
                      </div>
                      <p class="card-text pt-2 pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                      <div class="progress">
                        <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                        <div class="col-6 text-end pt-2">46 hari lagi</div>
                      </div>
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-md-4">
                      <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 pt-5" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">Gemba Cianjur</h6></div>
                        <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Aktiv</button></div>
                      </div>
                      <p class="card-text pt-2 pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                      <div class="progress">
                        <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                        <div class="col-6 text-end pt-2">46 hari lagi</div>
                      </div>
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-md-4">
                      <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 pt-5" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">Gemba Cianjur</h6></div>
                        <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Aktiv</button></div>
                      </div>
                      <p class="card-text pt-2 pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                      <div class="progress">
                        <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                        <div class="col-6 text-end pt-2">46 hari lagi</div>
                      </div>
                    </div>
                </div>
                <div class="row pt-2 pb-2">
                    <div class="col-md-4">
                      <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 pt-5" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">Gemba Cianjur</h6></div>
                        <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Aktiv</button></div>
                      </div>
                      <p class="card-text pt-2 pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
                      <div class="progress">
                        <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row">
                        <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                        <div class="col-6 text-end pt-2">46 hari lagi</div>
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

@endsection


@push('after-script')
<script>
    // Menangkap semua elemen tab
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


