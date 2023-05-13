@extends('landing.layouts.app')

@section('title', 'Donasi')

@push('after-style')
  <style>
    .nominal.active{
      background: var(--orange);
      color: white;
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

  
  <div class="container py-4"> 
    <form action="" method="post" class="f1" id="form-donasi">
      <input type="hidden" name="campaign_id" value="{{$id}}">
      <div class="row">
        <div class="col-md-12 box-input p-4">
          <!-- step 1 -->
          <fieldset>
            <h4>Silahkan lengkapi data di bawah ini:</h4>
              
            <div class="container">
              <div class="contact pt-3">
                <div class="col-md-12 col-md-offset-3">
                  <div class="form-area">
                    
                    <div class="row">
                      <div class="col-md-6">
                        
                        <h6>Masukkan nominal donasi </h6>
                        <div class="card-text nominal border info-donatur rounded-3 mt-2" style="cursor:pointer; overflow:hidden" onclick="changeAmount(10000, this)">                  
                          <div class="py-2 px-2">
                            <h5 class="text-center my-2">Rp 10.000</h5>
                          </div>
                        </div>
                        <div class="card-text nominal border info-donatur rounded-3 mt-2" style="cursor:pointer; overflow:hidden" onclick="changeAmount(25000, this)">                  
                          <div class="py-2 px-2">
                            <h5 class="text-center my-2">Rp 25.000</h5>
                          </div>
                        </div>
                        <div class="card-text nominal border info-donatur rounded-3 mt-2" style="cursor:pointer; overflow:hidden" onclick="changeAmount(50000, this)">                  
                          <div class="py-2 px-2">
                            <h5 class="text-center my-2">Rp 50.000</h5>
                          </div>
                        </div>
                        <div class="card-text nominal border info-donatur rounded-3 mt-2" style="cursor:pointer; overflow:hidden" onclick="changeAmount(100000, this)">                  
                          <div class="py-2 px-2">
                            <h5 class="text-center my-2">Rp 100.000</h5>
                          </div>
                        </div>

                        <div class="group form-group mt-5">      
                          <input type="number" class="form-control" id="amount" name="amount" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Atau masukkan nominal lainnya</label>
                        </div>
                        
                      </div>

                      <div class="col-md-6">
                        <div class="group form-group">      
                          <input type="text" class="form-control" id="donatur" name="donatur" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Nama anda (donatur)</label>
                        </div>

                        <div class="group form-group">      
                          <input type="email" class="form-control" id="email" name="email" required pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$">
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Email</label>
                        </div>

                        <div class="group form-group">      
                          <input type="number" class="form-control" id="phone_number" name="phone_number" required>
                          <span class="highlight"></span>
                          <span class="bar"></span>
                          <label>Nomor WA</label>
                        </div>

                        <div class="form-group group">
                          <div class="text-group">
                            <textarea required="required" class="form-control" rows="6" name="hope"></textarea>
                            <label for="textarea" class="input-label">Tuliskan do’a untuk penerima (opsional)</label><i class="bar"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="f1-buttons">
              <button type="submit" class="btn btn-primary">Selanjutnya <i class="fa fa-arrow-right"></i></button>
            </div>
          </fieldset>
        </div>
      </div>                     
    </form>
  </div>
</body>

@endsection


@push('after-script')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
<script >
  
  // function scroll_to_class(element_class, removed_height) {
  //   var scroll_to = $(element_class).offset().top - removed_height;
  //   if($(window).scrollTop() != scroll_to) {
  //     $('html, body').stop().animate({scrollTop: scroll_to}, 0);
  //   }
  // }

  // function bar_progress(progress_line_object, direction) {
  //   var number_of_steps = progress_line_object.data('number-of-steps');
  //   var now_value = progress_line_object.data('now-value');
  //   var new_value = 0;
  //   if(direction == 'right') {
  //     new_value = now_value + ( 100 / number_of_steps );
  //   }
  //   else if(direction == 'left') {
  //     new_value = now_value - ( 100 / number_of_steps );
  //   }
  //   progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
  // }

  $(document).ready(function() {
      // Form
      $('.f1 fieldset:first').fadeIn('slow');
      
      $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function() {
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
        parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(function() {
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
      
      // submit (ketika klik tombol submit diakhir wizard)
      $('.f1').on('submit', function(e) {
        // validasi form
        e.preventDefault();
        $(this).find('input, textarea').each(function() {
          if( $(this).val() == "" ) {
            e.preventDefault();
            $(this).addClass('input-error');
          }
          else {
            $(this).removeClass('input-error');
          }
        });
      });

      $('#form-donasi').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Authorization': 'Bearer '+ localStorage.getItem('_token'),
          },
          url: "{{ route('api.xendit.invoice.create') }}",
          type: "POST",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function(){
            Swal.fire({
              title: 'Mohon Tunggu',
              html: 'Sedang membuatkan invoice pembayaran',
              allowOutsideClick: false,
              showConfirmButton: false,
              onBeforeOpen: () => {
                Swal.showLoading()
              },
            });
          },
          success: function(response){
            const data = response.data;
            window.location.href = data.payment_link;
          },
          error: function(response){
            const res = response.responseJSON;
            if(res.meta.code == 401){

            }else {
              Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: res.meta.message,
              });
            }
          },
        });
      });

      $('#amount').keyup(function(){
        $('.nominal.active').removeClass('active');
      });

      const user = JSON.parse(localStorage.getItem('user'));
      if(user){
        if(user.name) $('#donatur').val(user.name).attr('readonly', true).attr('disabled', true);
        if(user.email) $('#email').val(user.email).attr('readonly', true).attr('disabled', true);
        if(user.phone_number) $('#phone_number').val(user.phone_number).attr('readonly', true).attr('disabled', true);
        // $('#email').val(user.email);
        // $('#phone').val(user.phone);
      }
  });

  const changeAmount = (amount, e) => {
    $('#amount').val(amount);
    $(e).addClass('active').siblings().removeClass('active');
  }
</script>
@endpush


