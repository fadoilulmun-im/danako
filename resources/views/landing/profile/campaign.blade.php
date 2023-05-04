@extends('landing.layouts.profile')

@section('title', 'Campaign')

@section('content')
<div class="p-5 bg-white rounded shadow mb-5">
    <!-- Rounded tabs -->
    <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
      <li class="nav-item flex-sm-fill">
        <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">Semua</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="profile-tab" data-toggle="tab" href="#aktiv" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Aktif</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="contact-tab" data-toggle="tab" href="#tolak" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Di Tolak</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="contact-tab" data-toggle="tab" href="#proses" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Proses verifikasi</a>
      </li>
    </ul>

    <div id="myTabContent" class="tab-content">
        <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
            <div class="container-fluid" style="max-height: 1500px; overflow-y: scroll;" id="list-campaign">
           
              <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
                  
            </div>
        </div>

    <div id="aktiv" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
        <div class="container-fluid" style="max-height: 1500px; overflow-y: scroll;" id="list-aktiv">      
          <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>       
        </div>
      </div>


      <div id="tolak" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
        <div class="container-fluid" style="max-height: 1500px; overflow-y: scroll;" id="list-tolak">      
          <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>       
        </div>
      </div>

      <div id="proses" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
        <div class="container-fluid" style="max-height: 1500px; overflow-y: scroll;" id="list-proses">      
          <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>       
        </div>
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

    $(document).ready(()=>{
      $.ajax({
        url: "{{ route('api.master.campaigns.pagination') }}?token="+localStorage.getItem('_token') ,
        type: "GET",
        dataType: "json",
        success: function (response) {
          const data = response.data.data;
          $('#list-campaign').html('');
          data.forEach((item, index) => {
            $('#list-campaign').append(`
              <div class="row pt-2 pb-2" onclick="pemilik(${item.id})")>
                <div class="col-md-4">
                  <img src="{{ asset('') }}${item.img_path ? 'uploads' + item.img_path : 'danako/img/category/1.png'}" class="img-thumbnail border-0 pt-5" alt="image" style="max-height: 200px">
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-9 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">${item.title.slice(0, 30)}...</h6></div>
                    <div class="col-3 text-end pt-2"><span class="badge bg-success">${item.verification_status}</span></div>
                  </div>
                  <p class="card-text pt-2 pb-2">${item.description.slice(0,150)}...</p>
                  <div class="progress">
                    <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="row">
                    <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                    <div class="col-6 text-end pt-2">46 hari lagi</div>
                  </div>
                </div>
              </div>
            `);
          });
        },
        error: function (data) {
          console.log(data);
        }
      });
    });

    $(document).ready(()=>{
      $.ajax({
        url: "{{ route('api.master.campaigns.pagination') }}?token="+localStorage.getItem('_token') + "&verification_status=verified" ,
        // headers: {
        //   'Authorization': "Bearer " + localStorage.getItem('_token'),
        // },
        type: "GET",
        dataType: "json",
        success: function (response) {
          const data = response.data.data;
          $('#list-aktiv').html('');
          data.forEach((item, index) => {
            $('#list-aktiv').append(`
              <div class="row pt-2 pb-2" onclick="detail(${item.id})")>
                <div class="col-md-4">
                  <img src="{{ asset('') }}${item.img_path ? 'uploads' + item.img_path : 'danako/img/category/1.png'}" class="img-thumbnail border-0 pt-5" alt="image" style="max-height: 200px">
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-9 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">${item.title.slice(0, 30)}...</h6></div>
                    <div class="col-3 text-end pt-2"><span class="badge bg-success">${item.verification_status}</span></div>
                  </div>
                  <p class="card-text pt-2 pb-2">${item.description.slice(0,150)}...</p>
                  <div class="progress">
                    <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="row">
                    <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                    <div class="col-6 text-end pt-2">46 hari lagi</div>
                  </div>
                </div>
              </div>
            `);
          });
        },
        error: function (data) {
          console.log(data);
        }
      });
    });

    $(document).ready(()=>{
      $.ajax({
        url: "{{ route('api.master.campaigns.pagination') }}?token="+localStorage.getItem('_token') + "&verification_status=rejected" ,
        type: "GET",
        dataType: "json",
        success: function (response) {
          const data = response.data.data;
          $('#list-tolak').html('');
          data.forEach((item, index) => {
            $('#list-tolak').append(`
              <div class="row pt-2 pb-2" onclick="detail(${item.id})")>
                <div class="col-md-4">
                  <img src="{{ asset('') }}${item.img_path ? 'uploads' + item.img_path : 'danako/img/category/1.png'}" class="img-thumbnail border-0 pt-5" alt="image" style="max-height: 200px">
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-9 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">${item.title.slice(0, 30)}...</h6></div>
                    <div class="col-3 text-end pt-2"><span class="badge bg-success">${item.verification_status}</span></div>
                  </div>
                  <p class="card-text pt-2 pb-2">${item.description.slice(0,150)}...</p>
                  <div class="progress">
                    <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="row">
                    <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                    <div class="col-6 text-end pt-2">46 hari lagi</div>
                  </div>
                </div>
              </div>
            `);
          });
        },
        error: function (data) {
          console.log(data);
        }
      });
    });

    $(document).ready(()=>{
      $.ajax({
        url: "{{ route('api.master.campaigns.pagination') }}?token="+localStorage.getItem('_token') + "&verification_status=processing" ,
        // headers: {
        //   'Authorization': "Bearer " + localStorage.getItem('_token'),
        // },
        type: "GET",
        dataType: "json",
        success: function (response) {
          const data = response.data.data;
          $('#list-proses').html('');
          data.forEach((item, index) => {
            $('#list-proses').append(`
              <div class="row pt-2 pb-2" onclick="detail(${item.id})")>
                <div class="col-md-4">
                  <img src="{{ asset('') }}${item.img_path ? 'uploads' + item.img_path : 'danako/img/category/1.png'}" class="img-thumbnail border-0 pt-5" alt="image" style="max-height: 200px">
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-9 text-start text-success pt-2"><h6 class="card-title pb-1 pt-1">${item.title.slice(0, 30)}...</h6></div>
                    <div class="col-3 text-end pt-2"><span class="badge bg-success">${item.verification_status}</span></div>
                  </div>
                  <p class="card-text pt-2 pb-2">${item.description.slice(0,150)}...</p>
                  <div class="progress">
                    <div class="progress-bar bg-danako" role="progressbar" style="width: 60%; border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="row">
                    <div class="col-6 text-start text-success pt-2">Rp 34.567.890</div>
                    <div class="col-6 text-end pt-2">46 hari lagi</div>
                  </div>
                </div>
              </div>
            `);
          });
        },
        error: function (data) {
          console.log(data);
        }
      });
    });

  </script>
@endpush


