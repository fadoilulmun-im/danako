@extends('admin.layout.master')

@section('pageTitle', 'Distribution report')

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
<link href="{{ asset('assets') }}/libs/flatpickr/flatpickr.min.css" rel="stylesheet">
{{-- <link href="{{ asset('assets') }}/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('content')
<div class="container-fluid mt-2">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-2">
            <h4 class="mt-0 header-title">Distribution report</h4>
          </div>
          <div class="row" style="padding-bottom: 20px">
            <div class="col-sm-12 col-md-4">
                <label class="form-label">Date Range</label>
                <div class="input-group input-group-sm">
                    <input type="text" id="date_range" name="date_range" class="form-control form-control-sm" placeholder="yyyy-mm-dd">
                    <a class="input-group-text" title="clear" type="button" id="clear-date">
                        <i class="mdi mdi-close-thick"></i>
                    </a>
                </div>
            </div>
            </div>
          <table id="datatable" class="w-100 table table-bordered display-all focus-on">
            <thead>
              <tr>
                <th>No</th>
                <th>Withdrawal Id</th>
                <th>Campaign Title</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
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

<script src="{{ asset('assets') }}/libs/flatpickr/flatpickr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script scr="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<!-- Responsive Table js -->
<script src="{{ asset('assets') }}/libs/admin-resources/rwd-table/rwd-table.min.js"></script>
<!-- Select2 js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Magnific Popup-->
<script src="{{ asset('assets') }}/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
@endsection

@section('init-js')
<script>
    var minDate, maxDate;
  
    let table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        lengthChange: true,
        ajax: {
            url: "{{ route('api.master.distribution.report.index') }}",
            data: function (d) {
                d.from = minDate,
                d.to = maxDate
            },
        },
        columns: [
            {data: 'DT_RowIndex', name: 'id', searchable: false},
            {data: 'withdrawal_id', name: 'withdrawal_id'},
            {data: 'campaign_title', name: 'campaign_title'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'created_at', name: 'created_at'},
        ],
        order: [[0, 'desc']]
    });

    // Flat Picker Date
    $flatpikr = $('#date_range').flatpickr({
        mode: "range",
        allowInput: true,
        altInput: true,
        dateFormat: "Y-m-d",
        onClose: function(selectedDates, dateStr, instance) {
            inpDate = dateStr.split(' to ');
            minDate  =  (inpDate[0]);
            maxDate  =  (inpDate[1] ?? inpDate[0]);
            // console.log(minDate,"to",maxDate);
            // console.log(dateStr);
            table.draw();
        }
    });

    $("#clear-date").click(function() {
        $flatpikr.clear();
        minDate = null;
        maxDate = null;
        table.ajax.reload();
    });
</script>
@endsection