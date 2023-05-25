@extends('admin.layout.master')

@section('third-party-css')
  <link href="{{asset('')}}assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('')}}assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('')}}assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('')}}assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
  <style>
    .dropify-wrapper .dropify-message span.file-icon p {
      font-size: 25px;
    }
  </style>
@endsection

@section('content')
  <div class="container-fluid mt-2">
    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                  <h4 class="mt-0 header-title">Users</h4>
                  <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#createModal">Create</button>
                </div>

                <div class="row">
                  <div class="col-sm-2">
                    <div class='mb-3'>
                      <a href="#user" class="btn btn-sm btn-outline-primary waves-effect waves-light clickable">User</a>
                      <a href="#admin" class="btn btn-sm btn-outline-primary waves-effect waves-light clickable">Admin</a>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class='mb-3'>
                      <a href="#donatur" class="btn btn-sm btn-outline-primary waves-effect waves-light clickable">Donatur</a>
                      <a href="#campainer" class="btn btn-sm btn-outline-primary waves-effect waves-light clickable">Campainer</a>
                    </div>
                  </div>
                </div>
                
               
                <div class="row" style="padding-bottom: 15px">
                  <div class="col-sm-12 col-md-2">Status
                    <select class="form-select form-select-sm" name="status" id="status-filter">
                        <option value="">All</option>
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>
                  </div>
                  <div class="col-sm-12 col-md-2">Verification
                    <select class="form-select form-select-sm" name="verif" id="verif-filter">
                      <option value="">All</option>
                      <option value="unverified">Unverified</option>
                      <option value="processing">Processing</option>
                      <option value="verified">Verified</option>
                      <option value="rejected">Rejected</option>
                    </select>
                  </div>
                </div>
                <table id="datatable" class="w-100 table table-bordered dt-responsive table-responsive nowrap">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Verification</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
          </div>
         
      </div>
    </div>
  </div>
@endsection

@section('third-party-js')
  <script src="{{asset('')}}assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('')}}assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
  <script src="{{asset('')}}assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{asset('')}}assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
  <script src="{{asset('')}}assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{asset('')}}assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
  <script src="{{asset('')}}assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="{{asset('')}}assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="{{asset('')}}assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="{{asset('')}}assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="{{asset('')}}assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
@endsection

@section('init-js')
  <script>
    function clickable(type){
      $('.clickable').each(function(){
        if($(this).text().toLowerCase() == type){
          $(this).removeClass('btn-outline-primary').addClass('btn-primary');
        }
      });
    }

    function changeStatus(e, id){
      let url = "{{ route('api.master.users.changeStatus', ':id') }}";
      url = url.replace(':id', id);
      ajax({
        url: url,
        method: 'PUT',
        data: {},
        beforeSend: function () {},
        error: function(response){
          e.checked = !e.checked;

          let res = response.responseJSON
          let code = res.meta.code

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
            default:
              Swal.fire({
                title: 'ERROR',
                text: res.meta.message,
                icon: 'error',
              })
              break;
          }
        },
      })
    }

    let type = $(location).attr('hash') ? $(location).attr('hash').slice(1) : 'user';
    document.addEventListener('DOMContentLoaded', function() {
      clickable(type);
      let table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('api.master.users.index') }}?type=" + type,
          data: function (d) {
                d.status = $('#status-filter').val(),
                d.verif = $('#verif-filter').val()
          },
          beforeSend: function (request) {
            request.setRequestHeader("Authorization", 'Bearer '+ localStorage.getItem('_token'));
          },
          error: function(response){
            let res = response.responseJSON;
            let code = res.meta.code;
            if(code == 401){
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
            }
          },
          complete: function(){
            $('[data-bs-toggle="tooltip"]').tooltip();
          }
        },
        columns: [
          {data: 'DT_RowIndex', name: 'id', searchable: false},
          {data: 'name', name: 'name'},
          {data: 'username', name: 'username', defaultContent: 'username kosong'},
          {data: 'email', name: 'email'},
          {data: 'status', name: 'status', searchable: false, orderable: false},
          {data: 'verification', name: 'verification', searchable: false, orderable: false},
          {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[0, 'desc']],
      });

      window.addEventListener('hashchange', function(){
        $('.clickable').removeClass('btn-primary').addClass('btn-outline-primary');
        type = $(location).attr('hash').slice(1);
        clickable(type)
        table.ajax.url( "{{ route('api.master.users.index') }}?type=" + type ).load();
      });

      $('.clickable.create').on('click', function(){
        type = ($(this).text().toLowerCase());
        $('.clickable.create.btn-primary').removeClass('btn-primary').addClass('btn-outline-primary');
        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
      });

      $('#form-reset').submit(function(e){
        $('#resetModal').modal('hide');
        e.preventDefault();
        let url = "{{ route('api.master.users.resetPassword', ':id') }}";
        url = url.replace(':id', $('#reset-id').val());

        ajax({
          url: url,
          method: 'PUT',
          success: function(response){
            $('#resetModal').modal('hide');
            Swal.fire({
              title: 'Berhasil',
              text: response.meta.message,
              icon: 'success',
            })
          },
        })
      });

      $('#status-filter').change(function(){
        table.ajax.reload();
      });

      $('#verif-filter').change(function(){
        table.ajax.reload();
      });

      $('#form-create').submit(function(e){
        e.preventDefault();
        $('#create-type').val(type);
        let url = "{{ route('api.master.users.store') }}";
        let data = new FormData(e.target);

        $('#createModal').modal('hide');

        ajax({
          url: url,
          method: 'POST',
          data: data,
          contentType: false,
          processData: false,
          success: function(response){
            table.ajax.reload();
          },
        })
      });
    });
    
    function resetPassword(id){
      $('#reset-id').val(id);
      $('#resetModal').modal('show');
    }
  </script>
@endsection

@section('modal')
  <!-- Modal Create -->
  <div class="modal fade" id="createModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myCenterModalLabel">Create New</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post" id="form-create">
            <div class="modal-body">
              <div class='mb-2'>
                <button type="button" class="btn btn-sm btn-outline-primary waves-effect waves-light clickable create">user</button>
                <button type="button" class="btn btn-sm btn-outline-primary waves-effect waves-light clickable create">admin</button>
              </div>
              <div>
                <input type="hidden" id="create-type" name="type" class="form-control" required>

                <div class="mb-2">
                  <label for="create-name" class="form-label">Name</label>
                  <input type="text" id="create-name" name="name" class="form-control" required>
                </div>

                <div class="mb-2">
                  <label for="create-username" class="form-label">Username</label>
                  <input type="text" id="create-username" name="username" class="form-control" required>
                </div>

                <div class="mb-2">
                  <label for="create-email" class="form-label">Email</label>
                  <input type="email" id="create-email" name="email" class="form-control" required>
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

  {{-- Modal Reset --}}
  <div id="resetModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <span class="d-flex justify-content-end">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </span>

          <div class="text-center px-4 pb-2">
            <h3 class="modal-title w-100 mb-3">Reset Password ?</h3>	
            <p class="mb-3">Silahkan tekan tombol dibawah untuk mengembalikan sandi ke default</p>
  
            <div class="password-default border rounded p-2 mb-3">
              <div>Password Default</div>
              <h3 class="m-0"> {{ config('env.default_password') }} </h3>
            </div>

            <form id="form-reset">
              <input type="hidden" id="reset-id" name="id">
              <button type="submit" class="btn btn-danger">Reset Password</button>
            </form>
          </div>						
        </div>
      </div>
    </div>
  </div>  
@endsection