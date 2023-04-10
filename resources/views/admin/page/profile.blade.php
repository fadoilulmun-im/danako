@extends('admin.layout.master')

@section('third-party-css')
  <link href="{{asset('')}}assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row mt-2">
      <div class="col-12">
        <div class="card mx-auto" style="max-width: 350px">
          <span class="spinner spinner-border avatar-lg my-5 mx-auto" role="status" aria-hidden="true"></span>
        </div>
      </div>
    </div>
@endsection

@section('third-party-js')
  <script src="{{asset('')}}assets/libs/dropify/js/dropify.min.js"></script>
@endsection

@section('init-js')
  <script>
    document.addEventListener('DOMContentLoaded', function(){
      ajax({
        url: "{{ route('api.admin.me') }}",
        beforeSend: function(){},
        success: function(res){
          let data = res.data;
          $('.card').html(`
            <div class="text-center card-body">
              <div class="dropdown float-end">
                  <a href="#" class="dropdown-toggle arrow-none card-drop"  data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="mdi mdi-dots-vertical"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                      <!-- item-->
                      <a role="button" data-bs-toggle="modal" href="#editModal" class="dropdown-item">Edit</a>
                      <a role="button" data-bs-toggle="modal" href="#fotoModal" class="dropdown-item">Ubah Foto Profil</a>
                      <!-- item-->
                      <a role="button" data-bs-toggle="modal" href="#passwordModal" class="dropdown-item">Ubah Password</a>
                  </div>
              </div>
              <div>
                  <img src="${data.photo_profile}" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                  <div class="text-start">
                    <table class="w-100">
                      <tbody>
                        <tr class="text-muted font-13">
                          <td class="p-1"><strong>Full Name</strong></td>
                          <td class="p-1">: <span id="name">${data.name ?? '-'}</span></td>
                        </tr>
                        <tr class="text-muted font-13">
                          <td class="p-1"><strong>Username</strong></td>
                          <td class="p-1">: <span id="username">${data.username ?? '-'}</span></td>
                        </tr>
                        <tr class="text-muted font-13">
                          <td class="p-1"><strong>Email</strong></td>
                          <td class="p-1">: <span id="email">${data.email ?? '-'}</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          `);

          $('#edit-name').val(data.name);
          $('#edit-username').val(data.username);
          $('#edit-email').val(data.email);
        }
      });

      $('#form-edit').submit(function(e){
        e.preventDefault();
        $(this).find('input').removeClass('is-invalid');
        let btn = $(this).find("button[type=submit]" );

        ajax({
          url: "{{ route('api.admin.update') }}",
          method: 'POST',
          data: new FormData(e.target),
          processData: false,
          contentType: false,
          beforeSend: function(){
            btn.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);
          },
          success: function(response){
            if(response.meta.status == 'OK'){
              Swal.fire({
                title: 'Success',
                text: response.meta.message,
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK'
              });

              $('#name').text(response.data.name);
              $('#username').text(response.data.username);
              $('#email').text(response.data.email);

              $('#editModal').modal('hide');
            }
          },
          error: function (response) {
            let res = response.responseJSON;
            let code = res.meta.code;
            switch (code) {
              case 401:
                Swal.fire({
                  title: 'Anda Belum Login',
                  text: "Silahkan login terlebih dahulu untuk melakukan aksi ini",
                  icon: 'error',
                  showCancelButton: false,
                  confirmButtonText: 'LOGIN',
                  showLoaderOnConfirm: true,
                  allowOutsideClick: () => !Swal.isLoading(),
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "{{ route('admin.login') }}";
                  }
                })
                break;
              case 403:
                Swal.fire({
                  title: 'Hak akses',
                  text: "Anda tidak memiliki hak akses untuk melakukan aksi ini",
                  icon: 'error',
                })
              case 422:
                Swal.fire({
                  title: 'ERROR',
                  text: res.meta.message,
                  icon: 'error',
                })
                let errors = res.data;
                $.each(errors, function(key, value){
                  $('#edit-'+key).addClass('is-invalid');
                  $('#edit-'+key).next().text(value);
                });
                break;
              default:
                Swal.fire({
                  title: 'ERROR',
                  text: res.meta.message,
                  icon: 'error',
                })
                break;
            }
          },
          complete: function(){
            btn.html('Save');
          }
        })
      });

      $('#form-password').submit(function(e){
        $(this).find('input').removeClass('is-invalid');
        e.preventDefault();
        let btn = $(this).find("button[type=submit]" );

        ajax({
          url: "{{ route('api.admin.changePassword') }}",
          method: 'POST',
          data: new FormData(e.target),
          processData: false,
          contentType: false,
          beforeSend: function(){
            btn.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);
          },
          success: function(response){
            if(response.meta.status == 'OK'){
              Swal.fire({
                title: 'Success',
                text: response.meta.message,
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK'
              });

              $('#passwordModal').modal('hide');
            }
          },
          error: function (response) {
            let res = response.responseJSON;
            let code = res.meta.code;
            switch (code) {
              case 401:
                Swal.fire({
                  title: 'Anda Belum Login',
                  text: "Silahkan login terlebih dahulu untuk melakukan aksi ini",
                  icon: 'error',
                  showCancelButton: false,
                  confirmButtonText: 'LOGIN',
                  showLoaderOnConfirm: true,
                  allowOutsideClick: () => !Swal.isLoading(),
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "{{ route('admin.login') }}";
                  }
                })
                break;
              case 403:
                Swal.fire({
                  title: 'Hak akses',
                  text: "Anda tidak memiliki hak akses untuk melakukan aksi ini",
                  icon: 'error',
                })
              case 422:
                Swal.fire({
                  title: 'ERROR',
                  text: res.meta.message,
                  icon: 'error',
                })
                let errors = res.data;
                $.each(errors, function(key, value){
                  $(`input[name="${key}"]`).addClass('is-invalid');
                  $(`input[name="${key}"]`).next().text(value);
                });
                break;
              default:
                Swal.fire({
                  title: 'ERROR',
                  text: res.meta.message,
                  icon: 'error',
                })
                break;
            }
          },
          complete: function(){
            btn.html('Save');
          }
        })
      });

      $('.dropify').dropify();

      $('#form-foto').submit(function(e){
        e.preventDefault();
        $(this).find('input').removeClass('is-invalid');
        let btn = $(this).find("button[type=submit]" );
        let url = "{{ route('api.admin.uploadImage') }}";

        ajax({
          url: url,
          method: 'POST',
          data: new FormData(e.target),
          processData: false,
          contentType: false,
          beforeSend: function(){
            btn.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);
          },
          success: function(response){
            if(response.meta.status == 'OK'){
              Swal.fire({
                title: 'Success',
                text: response.meta.message,
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK'
              });

              $('img[alt="profile-image"]').attr('src', response.data.link);
              localStorage.setItem('_user_photo_profile', response.data.link);
              $('#user-img-nav').attr('src', localStorage.getItem('_user_photo_profile'));

              $('#fotoModal').modal('hide');
            }
          },
          error: function (response) {
            let res = response.responseJSON;
            let code = res.meta.code;
            handleError(code, res);
          },
          complete: function(){
            btn.html('Save');
          }
        })
      });
    })
  </script>
@endsection

@section('modal')
  <!-- Modal Create -->
  <div class="modal fade" id="editModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myCenterModalLabel">Edit</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post" id="form-edit">
            <div class="modal-body">
              <div>
                
                {{-- <div class="mb-2">
                  <label for="edit-foto" class="form-label">Logo</label>
                  <input type="file" data-plugins="dropify" class="dropify" id="edit-foto" name="foto" required/>
                  <div class="invalid-feedback"></div>
                </div> --}}

                <div class="mb-2">
                  <label for="edit-name" class="form-label">Name</label>
                  <input type="text" id="edit-name" name="name" class="form-control" required>
                  <div class="invalid-feedback"></div>
                </div>

                <div class="mb-2">
                  <label for="edit-username" class="form-label">Username</label>
                  <input type="text" id="edit-username" name="username" class="form-control" required>
                  <div class="invalid-feedback"></div>
                </div>

                <div class="mb-2">
                  <label for="edit-email" class="form-label">Email</label>
                  <input type="email" id="edit-email" name="email" class="form-control" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Modal password -->
  <div class="modal fade" id="passwordModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myCenterModalLabel">Ubah Password</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post" id="form-password">
            <div class="modal-body">
              <div>
                <div class="mb-2">
                  <label for="old-password" class="form-label">Old Password</label>
                  <input type="password" id="old-password" name="old_password" class="form-control" required>
                  <div class="invalid-feedback"></div>
                </div>

                <div class="mb-2">
                  <label for="new-password" class="form-label">New Password</label>
                  <input type="password" id="new-password" name="password" class="form-control" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Modal Foto -->
  <div class="modal fade" id="fotoModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myCenterModalLabel">Ubah Foto Profile</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post" id="form-foto">
            <div class="modal-body">
              <input type="hidden" name="type" value="profile">
              <div class="mb-2">
                <label for="edit-foto" class="form-label">Foto</label>
                <input type="file" data-plugins="dropify" class="dropify" id="edit-foto" name="image" required/>
                <div class="invalid-feedback"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@endsection