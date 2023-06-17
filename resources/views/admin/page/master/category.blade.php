@extends('admin.layout.master')

@section('pageTitle', 'Category')

@section('third-party-css')
  <link href="{{asset('')}}assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('')}}assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('')}}assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('')}}assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('')}}assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  <div class="container-fluid mt-2">
    <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                  <h4 class="mt-0 header-title">Categories</h4>
                  <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#createModal">Create</button>
                </div>

                {{-- <div class='mb-3'>
                  <a href="#campaign" class="btn btn-sm btn-outline-primary waves-effect waves-light clickable">Campaign</a>
                  <a href="#zakat" class="btn btn-sm btn-outline-primary waves-effect waves-light clickable">Zakat</a>
                </div> --}}

                <table id="datatable" class="w-100 table table-bordered dt-responsive table-responsive nowrap">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Logo</th>
                        <th>Name</th>
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
  <script src="{{asset('')}}assets/libs/dropify/js/dropify.min.js"></script>
@endsection

@section('init-js')
  <script src="{{asset('')}}assets/js/pages/datatables.init.js"></script>
  <script>
    let type = $(location).attr('hash') ? $(location).attr('hash').slice(1) : 'campaign';
    document.addEventListener('DOMContentLoaded', function() {
      $('.dropify').dropify({});
      clickable(type);
      let table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('api.master.categories.index') }}?type=" + type,
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
          }
        },
        columns: [
          {data: 'DT_RowIndex', name: 'id', searchable: false},
          {data: 'logo_path', name: 'logo_path', searchable: false, orderable: false},
          {data: 'name', name: 'name'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[0, 'desc']]
        
      });

      window.addEventListener('hashchange', function(){
        $('.clickable').removeClass('btn-primary').addClass('btn-outline-primary');

        type = $(location).attr('hash').slice(1);

        clickable(type)

        table.ajax.url( "{{ route('api.master.categories.index') }}?type=" + type ).load();
      });

      $('.clickable.create').on('click', function(){
        type = ($(this).text().toLowerCase());
        $('.clickable.create.btn-primary').removeClass('btn-primary').addClass('btn-outline-primary');
        $(this).removeClass('btn-outline-primary').addClass('btn-primary');
      });

      $('#form-create').submit(function(e){
        $('#createModal').modal('hide');
        e.preventDefault();
        $('#create-type').val(type);
        let data = new FormData(e.target);
        
        ajax({
          url: "{{ route('api.master.categories.store') }}",
          type: "POST",
          data: data,
          processData: false,
          contentType: false,
          success: function(response){
            if(response.meta.status == 'OK'){
              table.ajax.reload();
              $('#create-name').val('');
              $('.dropify-clear').click();
            }
          },
        });
      });

      $('#form-edit').submit(function(e){
        $('#editModal').modal('hide');
        e.preventDefault();

        ajax({
          url: "{{ route('api.master.categories.update', '') }}/" + $('#edit-id').val(),
          type: "POST",
          data: new FormData(e.target),
          processData: false,
          contentType: false,
          success: function(response){
            if(response.meta.status == 'OK'){
              table.ajax.reload();
              $('#create-name').val('');
              $('.dropify-clear').click();
            }
          },
        });
      });
      
      $('#form-delete').submit(function(e){
        $('#deleteModal').modal('hide');
        $('#loading').modal('show');
        e.preventDefault();

        ajax({
          url: "{{ route('api.master.categories.delete', '') }}/" + $('#delete-id').val() + '?type=' + type,
          type: "DELETE",
          success: function(response){
            if(response.meta.status == 'OK'){
              table.ajax.reload();
            }
          },
        });
      });
    });

    
    function clickable(type){
      $('.clickable').each(function(){
        if($(this).text().toLowerCase() == type){
          $(this).removeClass('btn-outline-primary').addClass('btn-primary');
        }
      });
    }

    function edit(id){
      ajax({
        url: "{{ route('api.master.categories.show', '') }}/" + id +'?type=' + type,
        type: "GET",
        success: function(response){
          if(response.meta.status == 'OK'){
            $('#edit-id').val(response.data.id);
            $('#edit-name').val(response.data.name);
            $('#edit-type').val(type);
            $('#editModal').modal('show');
          }
        },
      });
    }

    function destroy(id){
      $('#delete-id').val(id);
      $('#delete-type').val(type);
      $('#deleteModal').modal('show');
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
              {{-- <div class='mb-2'>
                <button type="button" class="btn btn-sm btn-outline-primary waves-effect waves-light clickable create">Campaign</button>
                <button type="button" class="btn btn-sm btn-outline-primary waves-effect waves-light clickable create">Zakat</button>
              </div> --}}
              <div>
                <input type="hidden" id="create-type" name="type" class="form-control" required>

                <div class="mb-2">
                  <label for="create-name" class="form-label">Name</label>
                  <input type="text" id="create-name" name="name" class="form-control" required>
                </div>
                <div class="mb-2">
                  <label for="create-logo" class="form-label">Logo</label>
                  <input type="file" data-plugins="dropify" class="dropify" id="create-logo" name="logo" required/>
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

  <!-- Modal Edit -->
  <div class="modal fade" id="editModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myCenterModalLabel">Update</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post" id="form-edit">
            <div class="modal-body">
              <div>
                <input type="hidden" id="edit-type" name="type" class="form-control" required>
                <input type="hidden" id="edit-id" name="id" class="form-control" required>
                <div class="mb-2">
                  <label for="edit-name" class="form-label">Name</label>
                  <input type="text" id="edit-name" name="name" class="form-control" required>
                </div>
                <div class="mb-2">
                  <label for="edit-logo" class="form-label">Logo</label>
                  <input type="file" data-plugins="dropify" class="dropify" id="edit-logo" name="logo"/>
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

  {{-- Modal Delete --}}
  <div id="deleteModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <span class="d-flex justify-content-end">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </span>

          <div class="text-center">
            <i class="far fa-times-circle text-danger mb-3" style="font-size: 56px;"></i>
            <h3 class="modal-title w-100 mb-3">Are you sure?</h3>	
            <p class="mb-3">Do you really want to delete these records? This process cannot be undone.</p>
  
            <form id="form-delete">
              <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cancel</button>
              <input type="hidden" id="delete-id" name="id">
              <input type="hidden" id="delete-type" name="type">
              <button type="submit" class="btn btn-danger ms-1">Delete</button>
            </form>
          </div>						
        </div>
      </div>
    </div>
  </div>   
@endsection