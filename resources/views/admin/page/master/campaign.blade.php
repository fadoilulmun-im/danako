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
                    <table id="datatable" class="w-100 table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Slug</th>
                                <th>Target Amount</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Receiver</th>
                                <th>Purpose</th>
                                <th>Address Receiver</th>
                                <th>Detail Usage of Funds</th>
                                <th>Real Time Amount</th>
                                <th>Status</th>
                                <th>Activity</th>
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
                                {{-- <input type="text" class="form-control" name="user_id" id="user_id"
                                    placeholder="user id"> --}}
                                <select name="user_id" id="user_id" class="form-control select2 select2User" style="width: 100%">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="category_id" class="form-label">Category</label><br />
                                {{-- <input type="text" class="form-control" name="category_id" id="category_id"
                                    placeholder="category id"> --}}
                                <select name="category_id" id="category_id" class="form-control select2 select2Category" 
                                style="width: 100%">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="title" class="form-label">Title</label><br />
                                <input type="text" class="form-control" id="title" name="title" placeholder="John">
                                <span class="d-none invalid-feedback text-danger error-text title_error"
                                    style="font-size: 13px"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="target_amount" class="form-label">Target amount</label>
                                <input type="text" class="form-control" id="target_amount" name="target_amount"
                                    placeholder="Target amount">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description"
                                    placeholder="Write something here"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="purpose" class="form-label">Purpose</label>
                                <textarea type="text" class="form-control" id="purpose" name="purpose"
                                    placeholder="Write something here"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="receiver" class="form-label">Receiver</label>
                                <input type="text" class="form-control" id="receiver" name="receiver"
                                    placeholder="Receiver">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="address_receiver" class="form-label">Address receiver</label>
                                <input type="text" class="form-control" id="address_receiver" name="address_receiver"
                                    placeholder="Address receiver">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="start_date" class="form-label">Start date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    placeholder="Start campaign">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="end_date" class="form-label">End date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    placeholder="End campaign">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="img_path" class="form-label">Image</label>
                                <input type="file" data-plugins="dropify" id="img_path" name="img_path">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="detail_usage_of_funds" class="form-label">Funds usage detail</label>
                                <textarea type="text" class="form-control" id="detail_usage_of_funds"
                                    name="detail_usage_of_funds" placeholder="Write something here"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

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
                d.id = $('#select2User').val()
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'id', searchable: false},
            {data: 'user_id', name: 'user_id'},
            {data: 'category_id', name: 'category_id'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'img_path', name: 'img_path'},
            {data: 'slug', name: 'slug'},
            {data: 'target_amount', name: 'target_amount'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'receiver', name: 'receiver'},
            {data: 'purpose', name: 'purpose'},
            {data: 'address_receiver', name: 'address_receiver'},
            {data: 'detail_usage_of_funds', name: 'detail_usage_of_funds'},
            {data: 'real_time_amount', name: 'real_time_amount'},
            {data: 'verification_status', name: 'verification_status'},
            {data: 'activity', name: 'activity'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[0, 'desc']]
    });

    var sel_user = $('.select2User').select2({
        placeholder: {value: '',text: 'None Selected'},
        dropdownParent: $("#campaignModal"),
        allowClear: true,
        ajax: {
            url: "{{ route('api.master.campaigns.user.list') }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        console.log(data.data);
                        return {
                            text: item.username,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    }).on('change', function (e) {
        var id = $('#user_id').val();
    });

    var sel_cat = $('.select2Category').select2({
        placeholder: {value: '',text: 'None Selected'},
        dropdownParent: $("#campaignModal"),
        allowClear: true,
        ajax: {
            url: "{{ route('api.master.campaigns.category.list') }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        console.log(data.data);
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

    var state = $('#saveBtn').val();
    var type = "POST"; // for store
    var id = $('#campaign_id').val();
    var saveUrl = "{{ route('api.master.campaigns.store') }}";
    if (state == "update"){
        type = "PUT"; // for update
        saveUrl = "{{ route('api.master.campaigns.update','') }}/" + id;
    }

    $('#addBtn').click(function(e){
        $('#modalTitle').text("Create New Campaign");
        $('#formCampaign').trigger("reset");
        $('#campaignModal').modal('show'); // modal campaign untuk create tampil
        $('#saveBtn').val("create");
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
                    $('.select2Category').select2({
                        placeholder: {value: response.data.category.id, text: response.data.category.name},
                        dropdownParent: $("#campaignModal"),
                        allowClear: true,
                        ajax: {
                            url: "{{ route('api.master.campaigns.category.list') }}",
                            dataType: 'json',
                            delay: 250,
                            processResults: function (data) {
                                return {
                                    results: $.map(data.data, function (item) {
                                        console.log(data.data);
                                        return {
                                            text: item.name,
                                            id: item.id
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    }).on('select2:select', function (e) {
                        $('#category_id').val();
                    });

                    $('.select2User').select2({
                        placeholder: {value: response.data.user.id, text: response.data.user.username},
                        dropdownParent: $("#campaignModal"),
                        allowClear: true,
                        ajax: {
                            url: "{{ route('api.master.campaigns.user.list') }}",
                            dataType: 'json',
                            delay: 250,
                            processResults: function (data) {
                                return {
                                    results: $.map(data.data, function (item) {
                                        console.log(data.data);
                                        return {
                                            text: item.username,
                                            id: item.id
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    }).on('select2:select', function (e) {
                        $('#user_id').val();
                    });
                    getId = $('.select2User').val();
                    console.log(getId);
                    // $('.select2User').select2();
                    // $('.select2User').val(response.data.user_id).trigger('change');
                    // $('.select2Category').select2();
                    // $('.select2Category').val(response.data.category_id).trigger('change');
                }
            },
        });
    }

    $('#formCampaign').submit(function(e){
        e.preventDefault();

        ajax({
            url: saveUrl,
            type: type,
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            success: function(response){
                if(response.meta.status == 'OK'){
                    $("#campaignModal").modal('hide');
                    $('#formCampaign').trigger("reset");
                    table.ajax.reload();
                    $('.dropify-clear').click();
                }
            },  
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

</script>
@endsection