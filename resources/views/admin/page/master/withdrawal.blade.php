@extends('admin.layout.master')

@section('pageTitle', 'Pencairan Dana')

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
            <h4 class="mt-0 header-title">Withdrawals</h4>
            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" id="addBtn">Create</button>
          </div>
          <div id="exportButtons" class="mb-2"></div>
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
            <div class="col-sm-12 col-md-2">
                <label class="form-label">Status</label>
                <select class="form-select form-select-sm" name="status" id="status-filter">
                    <option value="">All</option>
                    <option value="processing">Processing</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
          </div>
          <table id="datatable" class="w-100 table table-bordered display-all focus-on">
            <thead>
              <tr>
                <th>No</th>
                <th>Campaign</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Bank</th>
                <th>Rek Name</th>
                <th>Rek Number</th>
                <th>Reject Note</th>
                {{-- <th>Created at</th> --}}
                <th>Action</th>
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
<!-- Modal Create and Edit -->
<div class="modal fade" id="donationModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modalTitle">Create New</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="" id="formWithdrawal" name="formWithdrawal">
        <div class="modal-body">
          <div class="mb-2">
            <label for="campaign_id" class="form-label">Campaign</label><br />
            <input name="campaign_id" id="campaign_id" class="form-control campaign_id" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="mb-2">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Biaya pengobatan" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="mb-2">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Rp ..." required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="mb-2">
            <label for="hope" class="form-label">Description</label><br />
            <textarea type="text" class="form-control" id="description" name="description"
              placeholder="Write something here"></textarea>
            <div class="invalid-feedback"></div>
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
            <th id="detail_campaign_id"></th>
          </tr>
          <tr>
            <th>Username</th>
            <th>:</th>
            <th id="detail_user"></th>
          </tr>
        </table>
        <table class="table">
          <tr>
            <th>Title</th>
            <td><span id="detail_title"></span></td>
          </tr>
          <tr>
            <th>Description</th>
            <td><span id="detail_desc"></span></td>
          </tr>
          <tr>
            <th>Amount</th>
            <td><span id="detail_amount"></span></td>
          </tr>
          <tr>
            <th>Bank</th>
            <td id="detail_bank_name"></td>
          </tr>
          <tr>
            <th>Rek Name</th>
            <td id="detail_rek_name"></td>
          </tr>
          <tr>
            <th>Rek Number</th>
            <td id="detail_rek_number"></td>
          </tr>
          <tr>
            <th>Status</th>
            <td><span id="detail_status"></span></td>
          </tr>
          <tr>
            <th>Dokumen pendukung</th>
            <td id="detail_document"></td>
          </tr>
          <tr class="bukti-transfer">
            <th>Bukti transfer pencairan</th>
            <td id="detail_bukti_transfer"></td>
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
          url:"{{ route('api.master.withdrawal.index') }}",
          data: function (d) {
                d.from = minDate,
                d.to = maxDate,
              d.status = $('#status-filter').val()
          },
          complete: function(){
              $('[data-bs-toggle="tooltip"]').tooltip();
          }
        },
        dom: "<'row mb-1'<'col-sm-6'Bl><'col-sm-6'f>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-6'i><'col-sm-6'p>>",
        buttons: [
            {
                text: 'Copy',
                extend: 'copy',
                exportOptions: {
                  columns: [0,1,2,3,4,5,6,7,8],
                },
                action: newexportaction
            }, 
            {
                text: 'CSV',
                extend: 'csv',
                exportOptions: {
                  columns: [0,1,2,3,4,5,6,7,8],
                },
                action: newexportaction
            },
            {  
                text: 'Excel',
                extend: 'excel', 
                exportOptions: {
                  columns: [0,1,2,3,4,5,6,7,8],
                },
                action: newexportaction
            },
           
            {
                text: 'Print',
                extend: 'print',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8],
                },
                action: newexportaction
            }, 
        ],
        columns: [
            {data: 'DT_RowIndex', name: 'id', searchable: false},
            {data: 'campaign.title', name: 'campaign.title'},
            {data: 'description', name: 'description'},
            {data: 'amount', name: 'amount'},
            {data: 'status', name: 'status'},
            {data: 'bank_name', name: 'bank_name', render: function(data, type, row) {
              if (data == null) { 
                return row.campaign.user.detail.bank_name; 
              } else {
                return row.bank_name;
              }
            }},
            {data: 'rek_name', name: 'rek_name', render: function(data, type, row) {
              if (data == null) { 
                return row.campaign.user.detail.rek_name;
              } else {
                return row.rek_name;
              }
            }},
            {data: 'rek_number', name: 'rek_number', render: function(data, type, row) {
              if (data == null) { 
                return row.campaign.user.detail.rek_number;
              } else {
                return row.rek_number;
              }
            }},
            {data: 'reject_note', name: 'reject_note', defaultContent: '-'},
            // {data: 'created_at', name: 'created_at', defaultContent: '-'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        order: [[0, 'desc']]
    });

    table.buttons( 0, null ).containers().appendTo('#exportButtons');

    $('#status-filter').change(function(){
        table.draw();
    });

    function newexportaction(e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
        dt.one('preXhr', function(e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = dt.page.info().recordsTotal;
            dt.one('preDraw', function(e, settings) {
                // Call the original action function
                if (button[0].className.indexOf('buttons-copy') >= 0) {
                    $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                    $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                    $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                    $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-print') >= 0) {
                    $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                }
                dt.one('preXhr', function(e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    };

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

    $('#addBtn').click(function(e){
      $('input[name="image"]').prop('required',true);
      $('#modalTitle').text("Create Pencairan dana");
      $('#formWithdrawal').trigger("reset");
      $('#donationModal').modal('show');
    });

    $('.add-document').click(function(e){
        var htmlData = $('.clone').html();
        $('.increment').after(htmlData);
    });

    $('.remove-document').click(function(e){
        $(this).fint('.xpress').remove();
    });

    // $('#formWithdrawal').submit(function(e){
    //     e.preventDefault();
    //     let btn = $(this).find("button[type=submit]" );

    //     ajax({
    //         url: "",
    //         type: 'POST',
    //         data: new FormData(e.target),
    //         processData: false,
    //         contentType: false,
    //         beforeSend: function () {
    //             btn.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);
    //         },
    //         success: function(response){
    //             if(response.meta.status == 'OK'){
    //                 $("#donationModal").modal('hide');
    //                 $('#formWithdrawal').trigger("reset");
    //                 table.ajax.reload();
    //                 $('.dropify-clear').click();
    //             }
    //         },
    //         error: function (response) {
    //             let res = response.responseJSON;
    //             let code = res.meta.code;
    //             handleError(code, res);
    //         },
    //         complete: function(){
    //             btn.html('Save');
    //         }
    //     });
    // }); 

    function detail(id){
        $('#detailModal').modal('show');
        ajax({
            url: "{{ route('api.master.withdrawal.show','') }}/" + id,
            type: "GET",
            success: function(response){
                if(response.meta.status == 'OK'){
                    $('#detail_id').text(response.data.id);
                    $('#detail_campaign_id').text(response.data.campaign.title);
                    $('#detail_user').text(response.data.campaign.user.username);
                    $('#detail_desc').text(response.data.description);
                    $('#detail_amount').text(response.data.amount);

                    if(response.data.bank_name == null){
                      $('#detail_bank_name').text(response.data.campaign.user.detail.bank_name);
                    } else {
                      $('#detail_bank_name').text(response.data.bank_name);
                    }

                    if(response.data.rek_name == null){
                      $('#detail_rek_name').text(response.data.campaign.user.detail.rek_name);
                    } else {
                      $('#detail_rek_name').text(response.data.rek_name);
                    }

                    if(response.data.rek_number == null){
                      $('#detail_rek_number').text(response.data.campaign.user.detail.rek_number);
                    } else {
                      $('#detail_rek_number').text(response.data.rek_number);
                    }

                    let status_color = '';
                    switch (response.data.status) {
                        case 'processing':
                        status_color = 'bg-warning';
                        break;
                        case 'rejected':
                        status_color = 'bg-danger';
                        break;
                        case 'approved':
                        status_color = 'bg-success';
                        break;
                    
                        default:
                        status_color = 'bg-secondary';
                        break;
                    }
                
                  $('#detail_status').html(`
                  <div>
                      <div class="mb-2" id='status-verif'>
                          <h5 class='m-0 badge p-1 ${status_color}'>${(response.data.status).toUpperCase()}</h5>
                      </div>
                      <div id="button">
                          ${response.data.status == 'processing' ?
                          '<button type="button" class="btn btn-danger btn-sm rounded" onclick="tolak('+response.data.id+')">Tolak</button>'+
                          '<button type="button" class="btn btn-success ms-2 rounded btn-sm" onclick="terima('+response.data.id+')">Terima</button>' 
                          : response.data.status == 'rejected' ?
                          '<span><strong>Alasan ditolak:</strong> '+response.data.reject_note+'</span>'
                          : ''
                          } 
                      </div>
                  </div>
                  `);

                  // $('#detail_bukti_transfer').html(`
                  //     <span><strong>Type: </strong>${response.data.document.type}</span>
                  //     <img src="{{asset('')}}uploads${response.data.campaign.img_path}" class="img-fluid rounded" style="max-width: 200px; max-height: 200px;">
                  // `);

                  if((response.data.document ?? []).length){
                      $('#detail_document').html('');
                      (response.data.document).forEach(item => {
                          $('#detail_document').append(`
                              <a href="{{asset('uploads')}}${item.path}" class="image-popup" title="bukti pendukung">
                                <img src="{{asset('uploads')}}${item.path}" alt="dokumen pendukung" class="thumb-img img-fluid rounded" style="max-width: 200px; max-height: 200px;">
                              </a>
                          `);
                      });
                  }else{
                      $('#detail_document').html('-');
                  }
                }
            },
            error: function(response){
            const res = response.responseJSON;
            console.log(res);
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
          return fetch("{{route('api.master.withdrawal.verif','') }}/" + id, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Authorization': 'Bearer '+localStorage.getItem('_token'),
            },
            body: JSON.stringify({
              status: 0,
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
            <h5 class='m-0 badge p-1 bg-danger'>${(data.status).toUpperCase()}</h5>
          `);
          table.ajax.reload();
        }
      })
    }

    function terima(id){
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data akan diubah menjadi terverifikasi!",
        icon: 'warning',
        input: 'file',
        inputAttributes: {
          name:"invoce",
          id:"invoiceUpload"
        },
        willOpen: () => {
            $(".swal2-file").change(function () {
                var reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
                console.log(reader);
            });
        },
        showCancelButton: true,
        showLoaderOnConfirm: true,
        allowOutsideClick: () => !Swal.isLoading(),
        preConfirm: () => {
          var formData = new FormData();
          var file = $('.swal2-file')[0].files[0];
          formData.append("invoice", file);
          formData.append("status", 1);
          return fetch("{{route('api.master.withdrawal.verif','') }}/" + id, {
            method: 'post',
            body: formData,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Authorization': 'Bearer '+localStorage.getItem('_token'),
            },
            processData: false,
            contentType: false,
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
            <h5 class='m-0 badge p-1 bg-success'>${(result.value.data.status).toUpperCase()}</h5>
          `);
          $('.bukti-transfer').html(`
            <th>Bukti transfer</th>
            <td id="detail_bukti_tf">
              <a href="{{asset('')}}uploads${result.value.data.documents.path}" target="blank" rel="noopener noreferrer">Lihat Bukti Bayar</a>
            </td>
          `);
          table.ajax.reload();
        }
      })
    }

    function formatRupiah(money) {
        return new Intl.NumberFormat('id-ID',
            { style: 'currency', currency: 'IDR' }
        ).format(money);
    }

    function netAmount(){

    }
</script>
@endsection