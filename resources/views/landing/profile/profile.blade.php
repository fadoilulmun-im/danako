@extends('landing.layouts.profile')

@push('after-style')
  <link href="{{ asset('assets') }}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('title', 'Profile')


@section('content')
  <div id="alert"></div>
  <div class="col-md-19">
    <div class="account-details">
      <h3 class="pb-5">Basic Information</h3>
  
      <div class="contact">
        <div class="col-md-12 col-md-offset-3">
          <div class="form-area">
            <form>
              <div class="group form-group">      
                <input type="file" class="form-control" id="foto" name="foto">
                <label for="foto" style="pointer-events: auto">
                  Foto Profile
                  <div id="img-foto"></div>
                </label>
              </div>

              <div class="group form-group">      
                <input type="text" class="form-control" id="username" name="username" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Username</label>
              </div>
                
              <div class="group form-group">      
                <input type="mail" class="form-control" id="email" name="email" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Email</label>
              </div>

              <div class="group form-group">      
                <input type="text" class="form-control" id="name" name="name" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Name</label>
              </div>

              <div class="group form-group">      
                <input type="number" class="form-control" id="nik" name="nik" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>NIK</label>
              </div>

              <h6>Tanggal Lahir</h6>   
              <div class="group form-group">   
                <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                <span class="highlight"></span>
                <span class="bar"></span>
              </div>

              <div class="group">
                <select class="form-control" id="gender" name="gender">
                  <option value="" disabled selected>Jenis Kelamin</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
                <label for="select">Pilih Jenis Kelamin</label>
                <div class="bar"></div>
              </div>

              <div class="group form-group">      
                <input type="text" class="form-control" id="address" name="address" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Alamat</label>
              </div>

              <div class="group">
                <select class="form-control select2" id="province" name="province">
                </select>
                {{-- <label for="select">Pilih Provinsi</label> --}}
                <div class="bar"></div>
              </div>

              <div class="group">
                <select class="form-control select2" id="regency" name="regency">
                </select>
                {{-- <label for="select">Pilih Kabupaten/Kota</label> --}}
                <div class="bar"></div>
              </div>

              <div class="group">
                <select class="form-control" id="subdistrict" name="subdistrict">
                </select>
                {{-- <label for="select">Pilih Kecamatan</label> --}}
                <div class="bar"></div>
              </div>

              <div class="group">
                <select class="form-control" id="village" name="village" required>
                </select>
                {{-- <label for="select">Pilih Kelurahan</label> --}}
                <div class="bar"></div>
              </div>

              <div class="group form-group">      
                <input type="number" class="form-control" id="phone_number" name="phone_number" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Nomor Handphone</label>
              </div>
              
              <div class="group form-group">      
                <input type="file" class="form-control" id="ktp" name="ktp">
                <label for="ktp" style="pointer-events: auto">
                  Foto KTP
                  <div id="img-ktp"></div>
                </label>
              </div>

              <button type="submit" id="submit" name="submit" class="btn btn-primary col-md-12">Simpan</button>              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@push('after-script')
<script src="{{ asset('assets') }}/libs/select2/js/select2.min.js"></script>
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
      $('#province').select2({
        placeholder: 'Pilih Provinsi',
        allowClear: true,
        ajax: {
          url: "{{ route('api.province.list') }}",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            var query = {
              search: params.term,
            }

            // Query parameters will be ?search=[term]
            return query;
          },
          processResults: (response)=>{
            return {
              results: $.map(response.data, function (item) {
                return {
                  text: item.name,
                  id: item.id
                }
              })
            };
          },
          cache: true
        }
      });
      $('#regency').select2({
        placeholder: 'Pilih Kota / Kabupaten',
        allowClear: true,
        ajax: {
          url: "{{ route('api.regency.list') }}",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            var query = {
              search: params.term,
              province_id: $('#province').val(),
            }
            return query;
          },
          processResults: (response)=>{
            return {
              results: $.map(response.data, function (item) {
                return {
                  text: item.name,
                  id: item.id
                }
              })
            };
          },
          cache: true
        }
      });
      $('#subdistrict').select2({
        placeholder: 'Pilih Kecamatan',
        ajax: {
          url: "{{ route('api.subdistrict.list') }}",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            var query = {
              search: params.term,
              regency_id: $('#regency').val(),
              limit: 20,
            }
            return query;
          },
          processResults: (response)=>{
            return {
              results: $.map(response.data, function (item) {
                return {
                  text: item.name,
                  id: item.id
                }
              })
            };
          },
          cache: true
        }
      });
      $('#village').select2({
        placeholder: 'Pilih Kelurahan',
        allowClear: true,
        ajax: {
          url: "{{ route('api.village.list') }}",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            var query = {
              search: params.term,
              subdistrict_id: $('#subdistrict').val(),
              limit: 20,
            }
            return query;
          },
          processResults: (response)=>{
            return {
              results: $.map(response.data, function (item) {
                return {
                  text: item.name,
                  id: item.id
                }
              })
            };
          },
          cache: true
        }
      });

      $('form').submit((e)=>{
        e.preventDefault();
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Authorization': "Bearer " + localStorage.getItem('_token'),
          },
          url: "{{ route('api.user.update') }}",
          method: "POST",
          data: new FormData(e.target),
          processData: false,
          contentType: false,
          beforeSend: ()=>{
            const btnSubmit = $('#submit');
            btnSubmit.prop('disabled', true);
            btnSubmit.html('<i class="fa fa-spin fa-spinner"></i>');
          },
          success: (response)=>{
            const data = response.data;
            $('#name-now').text(data.name);
            $('#username-now').text(data.username);
            $('#img-profile-now').attr('src', data.photo_profile);

            Swal.fire({
              title: 'Berhasil!',
              text: 'Data berhasil disimpan',
              icon: 'success',
              confirmButtonText: 'Ok'
            })
          },
          error: (response)=>{
            const res = response.responseJSON;
            Swal.fire({
              title: 'Gagal!',
              text: res.meta.message,
              icon: 'error',
              confirmButtonText: 'Ok'
            })
          },
          complete: ()=>{
            const btnSubmit = $('#submit');
            btnSubmit.prop('disabled', false);
            btnSubmit.html('Simpan');
          },
        });
      });

      $.ajax({
        url: "{{ route('api.user.detail') }}",
        method: "GET",
        headers: {
          'Authorization': "Bearer " + localStorage.getItem('_token'),
        },
        success: (response)=>{
          const data = response.data;

          if(!data.detail || data.detail.status == 'unverified'){
            $('#alert').html(`
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                Silahkan lengkapi profil untuk mulai membuat campaign
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            `)
          }else if(data.detail.status == 'processing'){
            $('#alert').html(`
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </svg>
                Akun anda sedang dalam proses verifikasi oleh admin
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            `)
          }else if(data.detail.status == 'rejected'){
            $('#alert').html(`
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Akun anda tidak lolos verifikasi dengan alasan: <b>${data.detail.reject_note}</b> silahkan perbaiki data anda dan kirim ulang
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            `)
          }

          $('#foto').hide();
          $('#img-foto').html(`
            <img src="{{ asset('uploads') }}${data.photo_profile.path}" alt="foto" class="img-fluid" style="max-width: 200px; max-height: 200px;">
          `).css('cursor', 'pointer');
          $('label[for="foto"]').css('position', 'inherit');

          $('#username').val(data.username);
          $('#name').val(data.name);
          $('#email').val(data.email);
          $('#nik').val(data.detail.nik);
          $('#birth_date').val(data.detail.birth_date);
          $('#gender').val(data.detail.gender).change();
          $('#address').val(data.detail.address);
          $('#phone_number').val(data.detail.phone_number);
          if(data.detail?.village ?? null){
            $('#village').append(new Option(data.detail.village.name, data.detail.village.id, false, true));
            $('#subdistrict').append(new Option(data.detail.village.subdistrict.name, data.detail.village.subdistrict.id, false, true));
            $('#regency').append(new Option(data.detail.village.subdistrict.regency.name, data.detail.village.subdistrict.regency.id, false, true));
            $('#province').append(new Option(data.detail.village.subdistrict.regency.province.name, data.detail.village.subdistrict.regency.province.id, false, true));
          }
          $('#ktp').hide();
          $('#img-ktp').html(`
            <img src="{{ asset('uploads') }}${data.detail.documents[0].path}" alt="KTP" class="img-fluid" style="max-width: 200px; max-height: 200px;">
          `).css('cursor', 'pointer');
          $('label[for="ktp"]').css('position', 'inherit');
        },
        error: (response)=>{
          const res = response.responseJSON;
          Swal.fire({
            title: 'Gagal!',
            text: res.meta.message,
            icon: 'error',
            confirmButtonText: 'Ok'
          })
        },
      });

      $('#ktp').change(function () {
        $('#img-ktp img').attr('src', URL.createObjectURL(this.files[0]));
      });
      $('#foto').change(function () {
        $('#img-foto img').attr('src', URL.createObjectURL(this.files[0]));
      });
    })
  </script>
@endpush


