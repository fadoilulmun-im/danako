@extends('admin.layout.master')

@section('third-party-css')
<link href="{{ asset('assets') }}/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets') }}/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets') }}/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets') }}/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets') }}/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets') }}/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
<!-- Responsive Table css -->
<link href="{{ asset('assets') }}/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet">
<!-- Select css -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <h4 class="mt-0 header-title">Campaigns</h4>
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"
                            id="addBtn">Create</button>
                    </div>
                    <div class="row" style="padding-bottom: 15px">
                        <div class="col-sm-12 col-md-2">Status
                            <select class="form-select form-select-sm" name="status" id="status-filter">
                              <option value="">All</option>
                              <option value="processing">Processing</option>
                              <option value="sending">Sending</option>
                              <option value="received">Received</option>
                              <option value="closed">Closed</option>
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
                    <table id="datatable" class="w-100 table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Verification</th>
                                <th>Target Amount</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Receiver</th>
                                <th>Purpose</th>
                                <th>Address Receiver</th>
                                <th>Detail Usage of Funds</th>
                                <th>Real Time Amount</th>
                                <th>Reject Note</th>
                                <th>Status</th>
                                <th>Slug</th>
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

@section('modal')
<!-- Modal Create and Edit-->
<div class="modal fade" id="campaignModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTitle">Create New</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="" id="formCampaign" name="formCampaign" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <input type="hidden" name="id" id="campaign_id">
                                <label for="user_id" class="form-label">User</label><br />
                                <select name="user_id" id="user_id" class="form-control select2 select2User custom-select" style="width: 100%" required>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="category_id" class="form-label">Category</label><br />
                                <select name="category_id" id="category_id" class="form-control select2 select2Category custom-select" 
                                style="width: 100%" required>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="title" class="form-label">Title</label><br />
                                <input type="text" class="form-control" id="title" name="title" placeholder="John" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="target_amount" class="form-label">Target amount</label>
                                <input type="text" class="form-control" id="target_amount" name="target_amount" placeholder="Target amount" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description"
                                    placeholder="Write something here" required></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="purpose" class="form-label">Purpose</label>
                                <textarea type="text" class="form-control" id="purpose" name="purpose"
                                    placeholder="Write something here" required></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="receiver" class="form-label">Receiver</label>
                                <input type="text" class="form-control" id="receiver" name="receiver"
                                    placeholder="Receiver" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="address_receiver" class="form-label">Address receiver</label>
                                <input type="text" class="form-control" id="address_receiver" name="address_receiver"
                                    placeholder="Address receiver" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="start_date" class="form-label">Start date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    placeholder="Start campaign" required>
                                    <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="end_date" class="form-label">End date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    placeholder="End campaign" required>
                                    <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" data-plugins="dropify" id="image" name="image" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="detail_usage_of_funds" class="form-label">Funds usage detail</label>
                                <textarea type="text" class="form-control" id="detail_usage_of_funds"
                                    name="detail_usage_of_funds" placeholder="Write something here" required></textarea>
                                    <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="documents" class="form-label">Upload Document</label>
                        <div class="input-group increment">
                            <input type="file" class="form-control" multiple name="documents[]">
                            <button class="btn btn-success add-document" type="button">Add</button>
                        </div>
                        <div class="invalid-feedback"></div>
                        <div class="clone d-none">
                            <div class="input-group xpress">
                                <input type="file" class="form-control" multiple name="documents[]">
                                <button class="btn btn-danger remove-document" type="button">Remove</button>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTitle">Detail Campaign</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table width="100%" class="table">
                    <tr>
                        <td colspan="3" id="detail_img" align=Center></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td id="detail_status"></td>
                    </tr>
                    <tr>
                        <th>Activity</th>
                        <td id="detail_activity"></td>
                    </tr>
                    <tr>
                        <th>Campaign ID</th>
                        <td><span id="detail_id"></span></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><span id="detail_user"></span></td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td><span id="detail_category"></span></td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td><span id="detail_title"></span></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><span id="detail_description"></span></td>
                    </tr>
                    <tr>
                        <th>Target amount</th>
                        <td><span id="detail_target_amount"></span></td>
                    </tr>
                    <tr>
                        <th>Receiver</th>
                        <td><span id="detail_receiver"></span></td>
                    </tr>
                    <tr>
                        <th>Purpose</th>
                        <td><span id="detail_purpose"></span></td>
                    </tr>
                    <tr>
                        <th>Address receiver</th>
                        <td><span id="detail_address_receiver"></span></td>
                    </tr>
                    <tr>
                        <th>Start date</th>
                        <td><span id="detail_start_date"></span></td>
                    </tr>
                    <tr>
                        <th>End date</th>
                        <td><span id="detail_end_date"></span></td>
                    </tr>
                    <tr>
                        <th>Detail usage of funds</th>
                        <td><span id="detail_usage"></span></td>
                    </tr>
                    <tr>
                        <th>Real time amount</th>
                        <td><span id="detail_realtime_amount"></span></td>
                    </tr>
                    <tr>
                        <th>Campaign Document</th>
                        <td id="detail_document"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
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
                        <button type="submit" class="btn btn-danger ms-1">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('third-party-js')
<script src="{{ asset('assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="{{ asset('assets') }}/libs/dropzone/min/dropzone.min.js"></script>
<script src="{{ asset('assets') }}/libs/dropify/js/dropify.min.js"></script>
<!-- Responsive Table js -->
<script src="{{ asset('assets') }}/libs/admin-resources/rwd-table/rwd-table.min.js"></script>
<!-- Select2 js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('init-js')
<script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>
<script src="{{ asset('assets') }}/js/pages/form-fileuploads.init.js"></script>
<script>
    let table = $('#datatable').DataTable({
        responsive: true,
        lengthChange: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('api.master.campaigns.index') }}",
            data: function (d) {
                d.verif = $('#verif-filter').val(),
                d.status = $('#status-filter').val()
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'id', searchable: false},
            {data: 'user.username', name: 'user.username'},
            {data: 'category.name', name: 'category.name'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'img_path', name: 'img_path'},
            {data: 'verification_status', name: 'verification_status'},
            {data: 'target_amount', name: 'target_amount'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'receiver', name: 'receiver'},
            {data: 'purpose', name: 'purpose'},
            {data: 'address_receiver', name: 'address_receiver'},
            {data: 'detail_usage_of_funds', name: 'detail_usage_of_funds'},
            {data: 'real_time_amount', name: 'real_time_amount'},
            {data: 'reject_note', name: 'reject_note'},
            {data: 'activity', name: 'activity'},
            {data: 'slug', name: 'slug'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[0, 'desc']]
    });

    $('#verif-filter').change(function(){
        table.ajax.reload();
    });

    $('#status-filter').change(function(){
        table.ajax.reload();
      });

    var sel_user = $('.select2User').select2({
        placeholder: {value: '',text: 'None Selected'},
        dropdownParent: $("#campaignModal"),
        allowClear: true,
        ajax: {
            url: "{{ route('api.master.users.list') }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            text: (item.name ?? item.username) + ' ('+ item.role_name +') ',
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    }).on('change', function (e) {
        $('#user_id').val();
    });

    var sel_cat = $('.select2Category').select2({
        placeholder: {value: '',text: 'None Selected'},
        dropdownParent: $("#campaignModal"),
        allowClear: true,
        ajax: {
            url: "{{ route('api.master.categories.list') }}" + '?type=campaign',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    }).on('change', function (e) {
        $('#category_id').val();
    });

    let saveUrl = '';

    $('#addBtn').click(function(e){
        $('input[name="image"]').prop('required',true);
        saveUrl = "{{ route('api.master.campaigns.store') }}";
        $('#modalTitle').text("Create New Campaign");
        $('#formCampaign').trigger("reset");
        $('#campaignModal').modal('show');
        $('#saveBtn').val("create");
    });

    $('.add-document').click(function(e){
        var htmlData = $('.clone').html();
        $('.increment').after(htmlData);
    });

    $('.remove-document').click(function(e){
        $(this).fint('.xpress').remove();
    });

    function edit(id){
        ajax({
            url: "{{ route('api.master.campaigns.show','') }}/" + id,
            type: "GET",
            success: function(response){
                if(response.meta.status == 'OK'){
                    $('#campaign_id').val(response.data.id);
                    $('#user_id').val(response.data.user_id);
                    $('#category_id').val(response.data.category_id);
                    $('#title').val(response.data.title);
                    $('#description').val(response.data.description);
                    $('#target_amount').val(response.data.target_amount);
                    $('#receiver').val(response.data.receiver);
                    $('#purpose').val(response.data.purpose);
                    $('#address_receiver').val(response.data.address_receiver);
                    $('#detail_usage_of_funds').val(response.data.detail_usage_of_funds);
                    $('#start_date').val(response.data.start_date);
                    $('#end_date').val(response.data.end_date);
                    $('#campaignModal').modal('show');
                    $('#modalTitle').text("Edit Campaign");
                    $('#saveBtn').val("update");
                    $('.select2Category').append(new Option(response.data.category.name, response.data.category.id, false, true));
                    $('.select2User').append(new Option(response.data.user.name ?? response.data.user.username, response.data.user.id, false, true));
                }
            },
        });

        $('input[name="image"]').prop('required',false);
        saveUrl = "{{ route('api.master.campaigns.update', ':id') }}";
        saveUrl = saveUrl.replace(':id', id);
    }

    $('#formCampaign').submit(function(e){
        e.preventDefault();
        let btn = $(this).find("button[type=submit]" );

        ajax({
            url: saveUrl,
            type: 'POST',
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            beforeSend: function () {
                btn.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);
            },
            success: function(response){
                if(response.meta.status == 'OK'){
                    $("#campaignModal").modal('hide');
                    $('#formCampaign').trigger("reset");
                    $('.select2Category').val(null).trigger("change");
                    $('.select2User').val(null).trigger("change");
                    table.ajax.reload();
                    $('.dropify-clear').click();
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
        });
    }); 

    function destroy(id){
        $('#delete-id').val(id);
        $('#deleteModal').modal('show');
    }

    $('#form-delete').submit(function(e){
        $('#deleteModal').modal('hide');
        $('#loading').modal('show');
        e.preventDefault();

        ajax({
            url: "{{ route('api.master.campaigns.delete', '') }}/" + $('#delete-id').val(),
            type: "DELETE",
            success: function(response){
                if(response.meta.status == 'OK'){
                    table.ajax.reload();
                }
            },
        });
    });

    function detail(id){
        $('#detail_img').empty();
        $('#detailModal').modal('show');

        ajax({
            url: "{{ route('api.master.campaigns.show','') }}/" + id,
            type: "GET",
            success: function(response){
                if(response.meta.status == 'OK'){
                    $('#detail_img').append('<img src="{{ asset('uploads') }}' + response.data.img_path + '" alt="logo" style="width: 100px; height: 100px">');
                    $('#detail_id').text(response.data.id);
                    $('#detail_user').text(response.data.user.username);
                    $('#detail_category').text(response.data.category.name);
                    $('#detail_title').text(response.data.title);
                    $('#detail_description').text(response.data.description);
                    $('#detail_target_amount').text(response.data.target_amount);
                    $('#detail_receiver').text(response.data.receiver);
                    $('#detail_purpose').text(response.data.purpose);
                    $('#detail_address_receiver').text(response.data.address_receiver);
                    $('#detail_usage').text(response.data.detail_usage_of_funds);
                    $('#detail_start_date').text(response.data.start_date);
                    $('#detail_end_date').text(response.data.end_date);
                    $('#detail_realtime_amount').text(response.data.real_time_amount);
                    $('#detail_activity').text(response.data.activity);

                    let activity_color = '';
                    switch (response.data.activity) {
                        case 'closed':
                        activity_color = 'bg-secondary';
                        break;
                        case 'sending':
                        activity_color = 'bg-info';
                        break;
                        case 'received':
                        activity_color = 'bg-success';
                        break;
                    
                        default:
                        activity_color = 'bg-warning';
                        break;
                    }

                    let status_color = '';
                    switch (response.data.verification_status) {
                        case 'processing':
                        status_color = 'bg-warning';
                        break;
                        case 'rejected':
                        status_color = 'bg-danger';
                        break;
                        case 'verified':
                        status_color = 'bg-success';
                        break;
                    
                        default:
                        status_color = 'bg-secondary';
                        break;
                    }

                    $('#detail_activity').html(`
                        <div class="d-flex justify-content-between mb-2">
                        <div id='status-verif'>
                            <h5 class='m-0 badge p-1 ${activity_color}'>${(response.data.activity).toUpperCase()}</h5>
                        </div>
                    `);

                    $('#detail_status').html(`
                        <div class="d-flex justify-content-between mb-2">
                        <div id='status-verif'>
                            <h5 class='m-0 badge p-1 ${status_color}'>${(response.data.verification_status).toUpperCase()}</h5>
                        </div>
                        <div id="button">
                            ${response.data.verification_status == 'processing' ?
                            '<button type="button" class="btn btn-danger btn-sm rounded" onclick="tolak('+response.data.id+')">Tolak</button>'+
                            '<button type="button" class="btn btn-success ms-2 rounded btn-sm" onclick="terima('+response.data.id+')">Terima</button>' 
                            : response.data.verification_status == 'rejected' ?
                            '<span>Alasan ditolak: '+response.data.reject_note+'</span>'
                            : ''
                            } 
                        </div>
                        </div>
                    `);

                    if((response.data.documents ?? []).length){
                        $('#detail_document').html('');
                        (response.data.documents).forEach(item => {
                            $('#detail_document').append(`
                                <embed type="application/pdf" src="{{asset('')}}uploads${item.path}" width="600" height="400"></embed>
                            `);
                        });
                    }else{
                        $('#detail_document').html('-');
                    }
                }
            },
        });
    }

    function tolak(id){
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Beri alasan kenapa anda menolak",
        icon: 'warning',
        input: 'text',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        showLoaderOnConfirm: true,
        allowOutsideClick: () => !Swal.isLoading(),
        preConfirm: (note) => {
          return fetch("{{route('api.master.campaigns.verif','') }}/" + id, {
            method: 'PUT',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Authorization': 'Bearer '+localStorage.getItem('_token'),
            },
            body: JSON.stringify({
              verification_status: 0,
              reject_note: note,
            })
          })
          .then(response => {
            if (!response.ok) {
              throw new Error(response.statusText)
            }
            return response.json()
          })
          .catch(error => {
            Swal.showValidationMessage(
              `Request failed: ${error}`
            )
          })
        },
      }).then((result) => {
        if (result.isConfirmed) {
          let data = result.value.data;
          Swal.fire({
            title: `Berhasil`,
            text: 'Berhasil menolak',
            icon: 'success',
          });
          
          $('#button').html(`<span>Alasan ditolak: ${data.reject_note}</span>`);
          $('#detail_status').html(`
            <h5 class='m-0 badge p-1 bg-danger'>${(data.verification_status).toUpperCase()}</h5>
          `);
        }
      })
    }

    function terima(id){
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan diubah menjadi terverifikasi!",
        icon: 'warning',
        showCancelButton: true,
        showLoaderOnConfirm: true,
        allowOutsideClick: () => !Swal.isLoading(),
        preConfirm: () => {
          return fetch("{{route('api.master.campaigns.verif','') }}/" + id, {
            method: 'PUT',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Authorization': 'Bearer '+localStorage.getItem('_token'),
            },
            body: JSON.stringify({
              verification_status: 1
            })
          })
          .then(response => {
            if (!response.ok) {
              throw new Error(response.statusText)
            }
            return response.json()
          })
          .catch(error => {
            Swal.showValidationMessage(
              `Request failed: ${error}`
            )
          })
        },
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: `Berhasil`,
            text: 'Berhasil verifikasi',
            icon: 'success',
          });
          
          $('#button').html(``);
          $('#detail_status').html(`
            <h5 class='m-0 badge p-1 bg-success'>${(result.value.data.verification_status).toUpperCase()}</h5>
          `);
        }
      })
    }

</script>
@endsection