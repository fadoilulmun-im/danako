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
                        <h4 class="mt-0 header-title">Withdrawals</h4>
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" id="addBtn">Create</button>
                    </div>
                    <table id="datatable" class="w-100 table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Campaign</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Status</th>
                                {{-- <th>Action</th> --}}
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
<!-- Modal Detail -->
<div class="modal fade" id="detailModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTitle">Withdrawal Detail</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="mb-2">
                    <tr>
                        <th>Withdrawal Id</th>
                        <th>:</th>
                        <th id="detail_id"></th>
                    </tr>
                    <tr>
                        <th>Campaign Id</th>
                        <th>:</th>
                        <th id="campaign_id"></th>
                    </tr>
                </table>
                <table class="table table-bordered table-responsive no-margin">
                    <tr>
                        <th>Title</th>
                        <td><span id="detail_campaign"></span></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><span id="detail_desc"></span></td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td><span id="detail_amount_donations"></span></td>
                    </tr>
                    <tr>
                        <th>Payment method</th>
                        <td><span id="detail_payment_method"></span></td>
                    </tr>
                    <tr>
                        <th>Payment channel</th>
                        <td><span id="detail_payment_channel"></span></td>
                    </tr>
                    <tr>
                        <th>Payment link</th>
                        <td><span id="detail_payment_link"></span></td>
                    </tr>
                    <tr>
                        <th>Paid at</th>
                        <td><span id="detail_paid_at"></span></td>
                    </tr>
                    <tr>
                        <th>External id</th>
                        <td><span id="detail_external_id"></span></td>
                    </tr>
                </table>
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
        responsive: true,
        lengthChange: true,
        ajax: "{{ route('api.master.withdrawals.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id', searchable: false},
            {data: 'campaign_id', name: 'campaign_id'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'amount', name: 'amount'},
            {data: 'status', name: 'status'},
            // {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        order: [[0, 'desc']]
    });
</script>
@endsection