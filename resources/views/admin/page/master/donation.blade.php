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
<!-- Responsive Table css -->
<link href="{{ asset('assets') }}/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet">
<!-- Select2 css -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <h4 class="mt-0 header-title">Donations</h4>
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" id="addBtn">Create</button>
                    </div>
                    <table id="datatable" class="w-100 table table-bordered dt-responsive table-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Campaign</th>
                                <th>Amount Donation</th>
                                <th>Hope</th>
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
<div class="modal fade" id="donationModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTitle">Create New</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="" id="formDonation" name="formDonation">
                <div class="modal-body">
                    <div class="mb-2">
                        <input type="hidden" name="id" id="donation_id">
                        <label for="user_id" class="form-label">User</label><br />
                        <select name="user_id" id="user_id" class="form-control select2 select2User" style="width: 100%">
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="campaign_id" class="form-label">Campaign</label><br />
                        <select name="campaign_id" id="campaign_id" class="form-control select2 select2Campaign" 
                        style="width: 100%">
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="amount_donations" class="form-label">Amount donations</label>
                        <input type="text" class="form-control" id="amount_donations" name="amount_donations"
                            placeholder="Doe">
                    </div>
                    <div class="mb-2">
                        <label for="hope" class="form-label">Hope</label><br />
                        <textarea type="text" class="form-control" id="hope" name="hope" placeholder="Write something here"></textarea>
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
 <!-- Responsive Table js -->
 <script src="{{ asset('assets') }}/libs/admin-resources/rwd-table/rwd-table.min.js"></script>
 <!-- Select2 js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('init-js')
<script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>
<script>
    let table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('api.master.donations.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id', searchable: false},
            {data: 'user_id', name: 'user_id'},
            {data: 'campaign_id', name: 'campaign_id'},
            {data: 'amount_donations', name: 'amount_donations'},
            {data: 'hope', name: 'hope'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[0, 'desc']]
    });

    $('.select2User').select2({
        placeholder: {value: '',text: 'None Selected'},
        dropdownParent: $("#donationModal"),
        allowClear: true,
        ajax: {
            url: "{{ route('api.master.campaigns.user.list') }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
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
        $('#user_id').val();
    });

    $('.select2Campaign').select2({
        placeholder: {value: '',text: 'None Selected'},
        dropdownParent: $("#donationModal"),
        allowClear: true,
        ajax: {
            url: "{{ route('api.master.donations.campaign.list') }}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            text: item.title,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    }).on('change', function (e) {
        $('#campaign_id').val();
    });

    var state = $('#saveBtn').val();
    var id = $('#donation_id').val();
    var method = "POST";
    var saveUrl = "{{ route('api.master.donations.store') }}";
    if (state == "update"){
        method = "PUT";
        saveUrl = "{{ route('api.master.donations.update', '') }}/" + id;
    }

    $('#addBtn').click(function(e){
        $('#modalTitle').text("Create New Donation");
        $('#formDonation').trigger("reset");
        $('#donationModal').modal('show'); // modal campaign untuk create tampil
        $('#saveBtn').val("create");
    });

    $('#formDonation').submit(function(e){
        e.preventDefault();
        ajax({
            url: saveUrl,
            type: method,
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            success: function(response){
                if(response.meta.status == 'OK'){
                    $("#donationModal").modal('hide');
                    $('#formDonation').trigger("reset");
                    table.ajax.reload();
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
            url: "{{ route('api.master.donations.delete', '') }}/" + $('#delete-id').val(),
            type: "DELETE",
            success: function(response){
                if(response.meta.status == 'OK'){
                    table.ajax.reload();
                }
            },
        });
    });

    function edit(id){
        ajax({
            url: "{{ route('api.master.donations.show','') }}/" + id,
            type: "GET",
            success: function(response){
                if(response.meta.status == 'OK'){
                    $('#donation_id').val(response.data.id);
                    $('#user_id').val(response.data.user_id);
                    $('#campaign_id').val(response.data.campaign_id);
                    $('#amount_donations').val(response.data.amount_donations);
                    $('#hope').val(response.data.hope);
                    $('#donationModal').modal('show');
                    $('#modalTitle').text("Edit Donation");
                    $('#saveBtn').val("update");
                }
            },
        });
    }

    function destroy(id){
        $('#delete-id').val(id);
        $('#deleteModal').modal('show');
    }

    $.fn.select2.defaults.set( "theme", "bootstrap" );

</script>
@endsection