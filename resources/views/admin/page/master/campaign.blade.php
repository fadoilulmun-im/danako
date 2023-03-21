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
                        <h4 class="mt-0 header-title">Campaigns</h4>
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target="#createModal">Create</button>
                    </div>
                    <table id="datatable" class="w-100 table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Amount</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Receiver</th>
                                <th>Purpose</th>
                                <th>Address Receiver</th>
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
        responsive: true,
        lengthChange: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('api.master.campaigns.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id', searchable: false},
            {data: 'user_id', name: 'user_id.username'},
            {data: 'category_id', name: 'category_id.name'},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'img_path', name: 'img_path'},
            {data: 'amount', name: 'amount'},
            {data: 'start_date', name: 'start_date'},
            {data: 'end_date', name: 'end_date'},
            {data: 'receiver', name: 'receiver'},
            {data: 'purpose', name: 'purpose'},
            {data: 'address_receiver', name: 'address_receiver'},
            {data: 'real_time_amount', name: 'real_time_amount'},
            {data: 'verification_status', name: 'verification_status'},
            {data: 'activity', name: 'activity'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[0, 'desc']]
    });
</script>
@endsection

@section('modal')
<div class="modal fade" id="createModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Create New</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="form-create">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-1" class="form-label">User</label>
                                <input type="text" class="form-control" id="field-1" placeholder="John">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-2" class="form-label">Category</label>
                                <input type="text" class="form-control" id="field-2" placeholder="Doe">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-1" class="form-label">Title</label>
                                <input type="text" class="form-control" id="field-1" placeholder="John">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-2" class="form-label">Link</label>
                                <input type="text" class="form-control" id="field-2" placeholder="donako.my.id/linkname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-1" class="form-label">Description</label>
                                <textarea type="text" class="form-control" id="field-1" placeholder="Write something here"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-1" class="form-label">Purpose</label>
                                <textarea type="text" class="form-control" id="field-1" placeholder="Write something here"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-1" class="form-label">Image</label>
                                <input type="text" class="form-control" id="field-1" placeholder="John">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-2" class="form-label">Target amount</label>
                                <input type="text" class="form-control" id="field-2" placeholder="Doe">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-1" class="form-label">Receiver</label>
                                <input type="text" class="form-control" id="field-1" placeholder="John">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-2" class="form-label">Address receiver</label>
                                <input type="text" class="form-control" id="field-2" placeholder="Doe">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-1" class="form-label">Start date</label>
                                <input type="date" class="form-control" id="field-1" placeholder="John">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="field-2" class="form-label">End date</label>
                                <input type="date" class="form-control" id="field-2" placeholder="Doe">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-2">
                            <label for="field-1" class="form-label">Funds usage detail</label>
                            <textarea type="text" class="form-control" id="field-1" placeholder="Write something here"></textarea>
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
</div>

<!-- Modal Create -->
{{-- <div class="modal fade" id="create-Modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">Create New</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="form-create">
                <div class="modal-body">
                    <div>
                        <label for="create-name" class="form-label">Title</label>
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
</div><!-- /.modal --> --}}

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