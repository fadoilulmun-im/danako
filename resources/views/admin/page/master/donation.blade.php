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
@endsection

@section('content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <h4 class="mt-0 header-title">Donations</h4>
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target="#createModal">Create</button>
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
            {data: 'user_id', name: 'user_id.username'},
            {data: 'campaign_id', name: 'campaign_id.title'},
            {data: 'amount_donations', name: 'amount_donations'},
            {data: 'hope', name: 'hope'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[0, 'desc']]
    });
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
                        <button type="button"
                            class="btn btn-sm btn-outline-primary waves-effect waves-light clickable create">Campaign</button>
                        <button type="button"
                            class="btn btn-sm btn-outline-primary waves-effect waves-light clickable create">Zakat</button>
                        {{-- <button type="button"
                            class="btn btn-sm btn-outline-primary waves-effect waves-light clickable create">Waqaf</button>
                        --}}
                    </div>
                    <div>
                        <label for="create-name" class="form-label">Name</label>
                        <input type="text" id="create-name" name="name" class="form-control">
                        <input type="hidden" id="create-type" name="type" class="form-control">
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
                        <label for="edit-name" class="form-label">Name</label>
                        <input type="text" id="edit-name" name="name" class="form-control">
                        <input type="hidden" id="edit-type" name="type" class="form-control">
                        <input type="hidden" id="edit-id" name="id" class="form-control">
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