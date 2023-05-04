@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection

@push('after-style')
<style>
   
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
      <form action="" method="post" class="f1">
          <div class="row">
        
          <div class="col-md-12 box-input">
            <!-- step 1 -->
            <fieldset>
              <h4 class="pt-2 pb-2">Berita Acara Pencairan Dana : </h4>
                
                <div class="container">
                  <div class="contact pt-3">
                    <div class="col-md-12">
                      <div class="group form-group">      
                        <input type="text" class="form-control" id="name" value="No Rekening" required disabled>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>No Rekening Pemilik Campaign</label>
                      </div>
                    </div>
                    <div class="col-md-12 col-md-offset-3">
                        <div class="form-area">
                          
                        <div class="row">
                          <div class="col-md-6">
                            
                            <h6>Masukkan nominal Pencairan Anda </h6>
                            <div class="card-text border info-donatur rounded-3 mt-2">                  
                              <div class="row py-2 px-2">
                                <h5 class="text-center">Rp 10.000</h5>
                              </div>
                            </div>
                            <div class="card-text border info-donatur rounded-3 mt-2">                  
                              <div class="row py-2 px-2">
                                <h5 class="text-center">Rp 40.000</h5>
                              </div>
                            </div>
                            <div class="card-text border info-donatur rounded-3 mt-2">                  
                              <div class="row py-2 px-2">
                                <h5 class="text-center">Rp 80.000</h5>
                              </div>
                            </div>
                            <div class="card-text border info-donatur rounded-3 mt-2 mb-5">                  
                              <div class="row py-2 px-2">
                                <h5 class="text-center">Rp 100.000</h5>
                              </div>
                            </div>

                            <div class="group form-group">      
                              <input type="text" class="form-control" id="name" required>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Atau masukkan nominal lainnya</label>
                            </div>
                            
                          </div>

                          <div class="col-md-6">
                            <div class="form-group group">
                              <div class="text-group">
                                <textarea required="required" class="form-control" rows="6"></textarea>
                                <label for="textarea" class="input-label">Tuliskan Deskripsi Alasan Pencairan</label><i class="bar"></i>
                              </div>
                            </div>

                          </div>
                        </div>
      
                        </div>
                    </div>
                  </div>
                </div>

                <div class="f1-buttons pb-3">
                  <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                </div>
            </fieldset>

                  <fieldset>
                    <h4>Pilih Metode Pembayaran</h4>
                    <div class="card" style="height: 500px; overflow-y: scroll;">
                      <div class="card-body">

                        <div class="card-text border-bottom info-donatur rounded-3 mt-2">                  
                          <div class="row py-2 px-2">
                            <div class="col-md-6 order-md-2">
                              <img src="assets/img/campaign/icon_akun.png" class="img-thumbnail float-md-end" alt="Lingkungan">
                            </div>
                            <div class="col-md-6">
                              <h3>Bca</h3>
                            </div>
                          </div>
                          
                        </div>
                       
                      </div>
                  </div>
                        <div class="f1-buttons pt-3 pb-3">
                          <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                            <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                        </div>
                </fieldset>
                  <!-- step 2 -->
                  
                   
                 
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
                      $(this).find('input[type="text"], input[type="password"], textarea').each(function() {
                        if( $(this).val() == "" ) {
                          e.preventDefault();
                          $(this).addClass('input-error');
                        }
                        else {
                          $(this).removeClass('input-error');
                        }
                      });
                    });
                });
        </script>
@endpush


