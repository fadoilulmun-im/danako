@extends('landing.layouts.app')

@section('title', 'Kabar Terbaru Campaign')

@push('after-style')
<style>
  .card-bank.active{
    border: 2px solid #79C121;
  }
</style>

@endpush

@section('content')

  <div class="container pb-2">
    <div class="title text-start">
      <span>{{ $withdrawal->campaign->title }}</span>
    </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-md-8">
          <div class="p-4 bg-white mb-4 shadow">
            <form class="f1" id="form-create" >
              <input type="hidden" name="withdrawal_id" value="{{$withdrawal->id}}">
              <div class="col-md-12 col-md-offset-3">
                <!-- step 1 -->
                <fieldset>
                  <div class="container">
                    <div class="contact">
                      <h4 class="pt-2 pb-2 mb-4 text-center">Ceritakan kabar terbaru Campaign Anda</h4>
                      <div class="col-md-12">
                        <div class="form-area">
                        <div class="group form-group">      
                            <input type="text" class="form-control" id="title" name="title" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label for="title">Judul</label>
                        </div>
                        <div class="form-group group">
                            <div class="text-group mt-0">
                              <textarea class="form-control" rows="6" name="description"></textarea>
                              {{-- <label for="textarea" class="input-label">Ceritakan mengapa anda membuat campaign ini</label> --}}
                              <i class="bar"></i>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="f1-buttons pb-3">
                    <button type="submit" class="btn btn-primary btn-submit">Ajukan</button>
                  </div>
                </fieldset>
              </div>                    
            </form>
            <!-- End rounded tabs -->
          </div>
        </div>
    </div>
  </div>

@endsection


@push('after-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
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
        CKEDITOR.replace( 'description' );
        CKEDITOR.on('instanceReady', function(){
        $.each( CKEDITOR.instances, function(instance) {
          CKEDITOR.instances[instance].on("change", function(e) {
              for ( instance in CKEDITOR.instances )
              CKEDITOR.instances[instance].updateElement();
          });
        });
      });
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


      const bankClick = (e) => {
        $('.card-bank').removeClass('active');
        $(e).addClass('active');
      }

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
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Authorization': 'Bearer ' + localStorage.getItem('_token'),
          },
          url: "",
          method: "POST",
          data: new FormData(e.target),
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
</script>
@endpush


