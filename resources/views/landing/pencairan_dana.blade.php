@extends('landing.layouts.app')

@section('title', 'Pencairan')

@push('after-style')
<style>
  .card-bank.active{
    border: 2px solid #79C121;
  }
</style>

@endpush

@section('content')

<body style="text-align: center;">
  <div class="container">
    <div class="title text-start">
      <span>{{$campaign->title}}</span>
    </div>
  </div>

  
  <div class="container pt-4 pb-4"> 
    <form class="f1" id="form-create" >
        <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
        <div class="row">
      
        <div class="col-md-6 box-input">
          <!-- step 1 -->
          <fieldset>
            <div class="container">
              <div class="contact pt-3">
                <h4 class="pt-2 pb-2 mb-2 text-center">Ajukan Pencairan Dana</h4>
                <div class="col-md-12">
                  <div class="form-area">
                    <h6>Rekening penerima</h6>
                    <div class="d-flex mb-4">
                      <div class="col-md-4">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="exampleRadios" id="rekeningSaya" 
                          value="" required><span>Rekening saya</span>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="exampleRadios" id="tambahRekening" 
                          value="" required><span>Tambah rekening baru</span>
                        </div>
                      </div>
                    </div>
                    <div class="rekening-saya">
                    </div>
                    <div class="tambah-rekening" style="margin-left: 20px">
                    </div>
                {{-- <div class="col-md-12 col-md-offset-3">
                    <div class="form-area"> --}}
                      
                      {{-- <div class="row"> --}}
                        <div class="col-md-12">
                          
                          {{-- <h6>Masukkan nominal Pencairan Anda </h6>
                          <div class="card-text border info-donatur rounded-3 mt-2" style="cursor: pointer" onclick="changeAmount(10000)">                  
                            <div class="row py-2 px-2">
                              <h5 class="text-center">Rp 10.000</h5>
                            </div>
                          </div>
                          <div class="card-text border info-donatur rounded-3 mt-2" style="cursor: pointer" onclick="changeAmount(25000)">                  
                            <div class="row py-2 px-2">
                              <h5 class="text-center">Rp 25.000</h5>
                            </div>
                          </div>
                          <div class="card-text border info-donatur rounded-3 mt-2" style="cursor: pointer" onclick="changeAmount(75000)">                  
                            <div class="row py-2 px-2">
                              <h5 class="text-center">Rp 75.000</h5>
                            </div>
                          </div>
                          <div class="card-text border info-donatur rounded-3 mt-2 mb-5" style="cursor: pointer" onclick="changeAmount(100000)">                  
                            <div class="row py-2 px-2">
                              <h5 class="text-center">Rp 100.000</h5>
                            </div>
                          </div> --}}

                          <div class="group form-group">      
                            <input type="number" class="form-control" id="amount" name="amount" max="{{ $campaign->real_time_amount }}" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Masukkan nominal yang ingin dicairkan</label>
                          </div>

                          {{-- <div class="group form-group mb-5">      
                            <input type="text" class="form-control" id="title" name="title" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Tuliskan judul pencairan</label>
                          </div> --}}

                          <div class="group form-group">
                            <div class="text-group">
                              <textarea required="required" class="form-control" rows="5" name="description"></textarea>
                              <label for="textarea" class="input-label">Tuliskan Keterangan Penggunaan Dana</label><i class="bar"></i>
                            </div>
                          </div>

                          <div class="group form-group">
                            <h6>Apakah anda sudah memiliki bukti pembayaran/ dokumen pendukung lainnya?</h6>
                            <div class="d-flex">
                              <div class="col-md-2">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="exampleRadios" id="checkBelum" 
                                  value="" required><span>Belum</span>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="exampleRadios" id="checkSudah" 
                                  value="" required><span>Sudah</span>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="group form-group uploadBukti">
                          </div>

                          <div class="group form-group checkBox">
                          </div>

                        </div>
                      {{-- </div> --}}
  
                    {{-- </div> --}}
                </div>
              </div>
            </div>

            <div class="f1-buttons pb-3">
              <button type="submit" class="btn btn-primary btn-next">Ajukan</button>
            </div>
          </fieldset>
        </div>
      </div>                     
    </form>
  </div>
</body>

@endsection


@push('after-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script >
  
  function scroll_to_class(element_class, removed_height) {
    var scroll_to = $(element_class).offset().top - removed_height;
    if($(window).scrollTop() != scroll_to) {
      $('html, body').stop().animate({scrollTop: scroll_to}, 0);
    }
  }

  function bar_progress(progress_line_object, direction) {
    var number_of_steps = progress_line_object.data('number-of-steps');
    var now_value = progress_line_object.data('now-value');
    var new_value = 0;
    if(direction == 'right') {
      new_value = now_value + ( 100 / number_of_steps );
    }
    else if(direction == 'left') {
      new_value = now_value - ( 100 / number_of_steps );
    }
    progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
  }

  $(document).ready(function() {
      // Form
      $('.f1 fieldset:first').fadeIn('slow');
      
      $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea, .f1 input[type="radio"], .f1 input[type="file"]').on('focus', function() {
        $(this).removeClass('input-error');
      });
      
      // step selanjutnya (ketika klik tombol selanjutnya)
      $('.f1 .btn-next').on('click', function() {
        var parent_fieldset = $(this).parents('fieldset');
        var next_step = true;
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.f1').find('.f1-step.active');
        var progress_line = $(this).parents('.f1').find('.f1-progress-line');

        
        // validasi form
        parent_fieldset.find('input[type="text"], input[type="password"], textarea, input[type="radio"], input[type="file"]').each(function() {
          if( $(this).val() == "" ) {
            $(this).addClass('input-error');
            next_step = false;
          }
          else {
            $(this).removeClass('input-error');
          }
        });


        
        if( next_step ) {
          parent_fieldset.fadeOut(400, function() {
            // change icons
            current_active_step.removeClass('active').addClass('activated').next().addClass('active');
            // progress bar
            bar_progress(progress_line, 'right');
            // show next step
            $(this).next().fadeIn();
            // scroll window to beginning of the form
            scroll_to_class( $('.f1'), 20 );
          });
        }
      });
      
      // step sbelumnya (ketika klik tombol sebelumnya)
      $('.f1 .btn-previous').on('click', function() {
        // navigation steps / progress steps
        var current_active_step = $(this).parents('.f1').find('.f1-step.active');
        var progress_line = $(this).parents('.f1').find('.f1-progress-line');
        
        $(this).parents('fieldset').fadeOut(400, function() {
          // change icons
          current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
          // progress bar
          bar_progress(progress_line, 'left');
          // show previous step
          $(this).prev().fadeIn();
          // scroll window to beginning of the form
        scroll_to_class( $('.f1'), 20 );
        });
      });

      // $('#checkSudah').is(":checked"){

      // }

      $('#checkSudah').click(function(e){
        $('#checkSudah').val('checked');
        $('#checkBelum').val('');
        $('.checkBox').html(``);
        $('.uploadBukti').html(`
          <span style="padding-bottom: 80px;">Silahkan upload bukti pembayaran/ dokumen pendukung (Jpg, Png, Jpeg)</span>
          <input type="file" class="form-control" id="documents" name="documents[] multiple accept="image/*" multiple required>
          <span class="highlight"></span>
          <span class="bar"></span>
        `);
      });

      $('#checkBelum').click(function(e){
        $('#checkBelum').val('checked');
        $('#checkSudah').val('');
        $('.uploadBukti').html(``);
        $('.checkBox').html(`
          <div class="card">
            <div class="card-body">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                Dengan ini saya bersedia melakukan upload bukti pembayaran setelah pencairan dana berhasil
              </div>
            </div>
          </div>
        `);
      });

      $('#rekeningSaya').click(function(e){
        $('#rekeningSaya').val('checked');
        $('#checkBelum').val('');
        $('.tambah-rekening').html(``);
        $('.rekening-saya').html(`
          <h6>Bank pencairan</h6>
          <div class="group form-group">      
            <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $campaign->user->detail->bank_name }}" readonly="readonly" required>
            <span class="highlight"></span>
            <span class="bar"></span>
          </div>
          <h6>Nama Pemilik Rekening</h6>
          <div class="group form-group">      
            <input type="text" class="form-control" id="rek_name" name="rek_name" value="{{ $campaign->user->detail->rek_name }}" readonly="readonly" required>
            <span class="highlight"></span>
            <span class="bar"></span>
          </div>
          <h6>No Rekening</h6>
          <div class="group form-group">      
            <input type="text" class="form-control" id="rek_number" name="rek_number" value="{{ $campaign->user->detail->rek_number }}" readonly="readonly" required>
            <span class="highlight"></span>
            <span class="bar"></span>
          </div>
         
        `);
      });

      const bankClick = (e) => {
        $('.card-bank').removeClass('active');
        $(e).addClass('active');
      }

      $('#tambahRekening').click(function(e){
        $('#tambahRekening').val('checked');
        $('#rekeningSaya').val('');
        $('.rekening-saya').html(``);
        $('.tambah-rekening').html(`
          <div class="group" style="margin-top: 50px">
            <select class="form-control" id="bank_name" name="bank_name" required>
              <option selected disabled>Pilih Bank</option>
              <option value="BCA">BCA</option>
              <option value="BRI">BRI</option>
              <option value="Mandiri">MANDIRI</option>
              <option value="BNI">BNI</option>
              <option value="BSI">BSI</option>
            </select>
            <label>Bank pencairan</label>
            <span class="highlight"></span>
            <div class="bar"></div>
          </div>
          <div class="group form-group">      
            <input type="text" class="form-control" id="rek_name" name="rek_name" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Nama Pemilik Rekening</label>
          </div>
          <div class="group form-group">      
            <input type="text" class="form-control" id="rek_number" name="rek_number" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>No Rekening</label>
          </div>
        `);
      });

      // submit (ketika klik tombol submit diakhir wizard)
      $('.f1').on('submit', function(e) {
        // validasi form
        $(this).find('input[type="text"], input[type="password"], textarea, input[type="radio"]').each(function() {
          if( $(this).val() == "" ) {
            e.preventDefault();
            $(this).addClass('input-error');
          }
          else {
            $(this).removeClass('input-error');
          }
        });
      });

      $('#form-create').submit((e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Authorization': 'Bearer ' + localStorage.getItem('_token'),
          },
          url: "{{ route('api.withdrawal.store') }}",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          beforeSend: () => {
            Swal.fire({
              title: 'Mohon Tunggu',
              html: 'Sedang memproses data',
              allowOutsideClick: false,
              showConfirmButton: false,
              onBeforeOpen: () => {
                Swal.showLoading()
              }
            });
          },
          success: (response) => {
            const data = response.data;
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: 'Berhasil mengajukan pencairan dana',
            }).then(() => {
              window.location.href = "{{ route('verifikasi-pencairan') }}";
            });
          },
          error: (response) => {
            const res = response.responseJSON;
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: res.meta.message,
            });
          }
        })
      })
  });

  const changeAmount = (amount) => {
    $('#amount').val(amount)
  }
</script>
@endpush


