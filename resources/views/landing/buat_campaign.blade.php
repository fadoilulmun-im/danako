@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection

@push('after-style')
<style>
    /* buat campaign */


.f1-steps { 
  overflow: hidden; 
  position: relative; 
  margin-top: 20px; 
}

.f1-progress { 
position: absolute; 
top: 0; 
width: 3px; 
height: 100%; 
left: 48%; 
background: #ddd; 
}

.f1-progress-line { 
position: absolute; 
top: 0; 
left: 50%; 
width: 1px; 
height: 0; 
background: #338056; 
transform: translateX(-50%);
}

.f1-step { 
position: relative; 
width: 100%; 
margin-bottom: 30px;
}

.f1-step-icon {
display: inline-block; 
width: 40px; 
height: 40px; 
margin-right: 10px;
background: #ddd;
font-size: 16px; 
color: #fff; 
line-height: 40px;
text-align: center;
-moz-border-radius: 50%; 
-webkit-border-radius: 50%; 
border-radius: 50%;
}

.f1-step.activated .f1-step-icon {
background: #fff; 
border: 1px solid #338056; 
color: #338056; 
line-height: 38px;
}

.f1-step.active .f1-step-icon {
background: #338056;
color: #fff;
width: 48px; 
height: 48px; 
font-size: 22px; 
line-height: 48px;
}

.f1-step p { 
color: #ccc; 
}

.f1-step.activated p { 
color: #338056; 
}

.f1-step.active p { 
color: #338056; 
}

.f1 fieldset { 
display: none; 
text-align: left; 
}

.f1-buttons { 
text-align: right; 
}

.f1 .input-error { 
border-color: #f35b3f; 
}

@media only screen and (max-width: 767px) {
.f1-steps { overflow: hidden; position: relative; margin-top: 20px; }

.f1-progress { position: absolute; top: 24px; left: 0; width: 100%; height: 1px; background: #ddd; }
.f1-progress-line { position: absolute; top: 0; left: 0; height: 1px; background: #338056; width: 100%; }

.f1-step { position: relative; float: left; width: 25%; padding: 0 5px; }

.f1-step-icon {
display: inline-block; width: 40px; height: 40px; margin-top: 4px; background: #ddd;
font-size: 16px; color: #fff; line-height: 40px;
-moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%;
}
.f1-step.activated .f1-step-icon {
background: #fff; border: 1px solid #338056; color: #338056; line-height: 38px;
}
.f1-step.active .f1-step-icon {
width: 48px; height: 48px; margin-top: 0; background: #338056; font-size: 22px; line-height: 48px;
}

.f1-step p { color: #ccc; }
.f1-step.activated p { color: #338056; }
.f1-step.active p { color: #338056; }

.f1 fieldset { display: none; text-align: left; }

.f1-buttons { text-align: right; }

.f1 .input-error { border-color: #f35b3f; }
}


.box-input{
box-sizing: border-box;
background: #FFFFFF;
border: 1px solid rgba(0, 0, 0, 0.37);
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 10px;
}

.files input {
outline: 2px dashed #92b0b3;
outline-offset: -10px;
-webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
transition: outline-offset .15s ease-in-out, background-color .15s linear;
padding: 120px 0px 85px 35%;
text-align: center !important;
margin: 0;
width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
-webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
}
.files{ position:relative}
.files:after {  pointer-events: none;
position: absolute;
top: 60px;
left: 0;
width: 50px;
right: 0;
height: 56px;
content: "";
background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
display: block;
margin: 0 auto;
background-size: 100%;
background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
position: absolute;
bottom: 10px;
left: 0;  pointer-events: none;
width: 100%;
right: 0;
height: 57px;
content: " or drag it here. ";
display: block;
margin: 0 auto;
color: #2ea591;
font-weight: 600;
text-transform: capitalize;
text-align: center;
}
</style>

@endpush

@section('content')

<body style="text-align: center;">
<div class="container">
    <div class="title text-start">
        <img src="{{ asset('') }}danako/img/Expand_left.svg" />
        <span>Lingkungan</span>
    </div>
    </div>

  
    <div class="container pt-4"> 
        <form action="" method="post" class="f1">
           <div class="row">
            <div class="col-md-2 ">
            <div class="f1-steps">
              <div class="f1-progress">
                  <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;"></div>
              </div>
                    <div class="f1-step active">
                        <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                        <p>Pilih Kategori</p>
                    </div>
              <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-home"></i></div>
                <p>Detail Campaign</p>
              </div>
              <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                <p>Detail Target</p>
              </div>
                <div class="f1-step">
                <div class="f1-step-icon"><i class="fa fa-address-book"></i></div>
                <p>Ringkasan</p>
              </div>
            </div>
          </div>
          <div class="col-md-10 box-input">
                     <!-- step 1 -->
                  <fieldset>
                    <h4>Pilih Kategori</h4>
                    <div class="card" style="height: 500px; overflow-y: scroll;">
                      <div class="card-body">

                        <div class="card-text border-bottom info-donatur rounded-3 mt-2">                  
                          <div class="row py-2 px-2">
                            <div class="col-md-6 order-md-2">
                              <img src="{{ asset('') }}danako/img/campaign/icon_akun.png" class="img-thumbnail float-md-end" alt="Lingkungan">
                            </div>
                            <div class="col-md-6">
                              <h3>Pendidikan</h3>
                            </div>
                          </div>
                          
                        </div>
                        <div class="card-text border-bottom info-donatur rounded-3 mt-2">                  
                          <div class="row py-2 px-2">
                            <div class="col-md-6 order-md-2">
                              <img src="assets/img/campaign/icon_akun.png" class="img-thumbnail float-md-end" alt="Lingkungan">
                            </div>
                            <div class="col-md-6">
                              <h3>Kesehatan</h3>
                            </div>
                          </div>
                          
                        </div>

                        <div class="card-text border-bottom info-donatur rounded-3 mt-2">                  
                          <div class="row py-2 px-2">
                            <div class="col-md-6 order-md-2">
                              <img src="assets/img/campaign/icon_akun.png" class="img-thumbnail float-md-end" alt="Lingkungan">
                            </div>
                            <div class="col-md-6">
                              <h3>Bencana</h3>
                            </div>
                          </div>    
                        </div>

                        <div class="card-text border-bottom info-donatur rounded-3 mt-2">                  
                          <div class="row py-2 px-2">
                            <div class="col-md-6 order-md-2">
                              <img src="assets/img/campaign/icon_akun.png" class="img-thumbnail float-md-end" alt="Lingkungan">
                            </div>
                            <div class="col-md-6">
                              <h3>Kemanusian</h3>
                            </div>
                          </div>    
                        </div>
                    
                      </div>
                  </div>
                        <div class="f1-buttons pt-3 pb-3">
                            <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                        </div>
                </fieldset>
                  <!-- step 2 -->
                  
                  <fieldset>
                    <h4>Cerita Campaign</h4>
                      
                      <div class="container">
                        <div class="contact pt-3">
                          <div class="col-md-12 col-md-offset-3">
                             <div class="form-area">
                               
                                <form>
                                   <div class="group form-group">      
                                      <input type="text" class="form-control" id="name" required>
                                      <span class="highlight"></span>
                                      <span class="bar"></span>
                                      <label>Name</label>
                                   </div>

                                   <div class="group form-group">      
                                      <input type="text" class="form-control" id="name" required>
                                      <span class="highlight"></span>
                                      <span class="bar"></span>
                                      <label>NIK</label>
                                  </div>

                                  <h6>Tambahkan foto campaign</h6>
                                   <div class="form-group files">
                                    
                                      <input type="file" class="form-control" multiple="">
                                      <span class="highlight"></span>
                                      <span class="bar"></span>
                                  </div>


                                   <div class="form-group group">
                                    <div class="text-group">
                                       <textarea required="required" class="form-control" rows="6"></textarea>
                                       <label for="textarea" class="input-label">Textarea</label><i class="bar"></i>
                                    </div>
                                 </div>

                                 <h6>Tambahkan foto campaign</h6>
                                   <div class="form-group files">
                                    
                                      <input type="file" class="form-control" multiple="">
                                      <span class="highlight"></span>
                                      <span class="bar"></span>
                                  </div>
                                          
                                </form>
                             </div>
                          </div>
                       </div>
                      </div>

                      <div class="f1-buttons">
                          <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                          <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                      </div>
                  </fieldset>
                  <!-- step 3 -->
                  <fieldset>
                      <h4>Buat Akun</h4>
                      <div class="container">
                        <div class="contact pt-3">
                          <div class="col-md-12 col-md-offset-3">
                             <div class="form-area">
                               
                                <form>
                                   <div class="group form-group">      
                                      <input type="text" class="form-control" id="name" required>
                                      <span class="highlight"></span>
                                      <span class="bar"></span>
                                      <label>Name</label>
                                   </div>

                                   <div class="group form-group">      
                                      <input type="text" class="form-control" id="name" required>
                                      <span class="highlight"></span>
                                      <span class="bar"></span>
                                      <label>NIK</label>
                                  </div>

                                  <h6>Tambahkan foto campaign</h6>
                                   <div class="form-group files">
                                    
                                      <input type="file" class="form-control" multiple="">
                                      <span class="highlight"></span>
                                      <span class="bar"></span>
                                  </div>


                                   <div class="form-group group">
                                    <div class="text-group">
                                       <textarea required="required" class="form-control" rows="6"></textarea>
                                       <label for="textarea" class="input-label">Textarea</label><i class="bar"></i>
                                    </div>
                                 </div>

                                 <h6>Tambahkan foto campaign</h6>
                                   <div class="form-group files">
                                    
                                      <input type="file" class="form-control" multiple="">
                                      <span class="highlight"></span>
                                      <span class="bar"></span>
                                  </div>
                                 
                                   

                                   

                                    
                                </form>
                             </div>
                          </div>
                       </div>
                      </div>

                      <div class="f1-buttons">
                          <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                          <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                      </div>
                  </fieldset>
                  <!-- step 4 -->
                  <fieldset>
                      <h4>Sosial Media</h4>
                      <div class="form-group">
                          <label>Facebook</label>
                          <input type="text" name="facebook" placeholder="Facebook" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Twitter</label>
                          <input type="text" name="twitter" placeholder="Twitter" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Google plus</label>
                          <input type="text" name="google_plus" placeholder="Google plus" class="form-control">
                      </div>
                      <div class="f1-buttons">
                          <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                          <a href="{{ url('campaign-pending') }}" class="btn btn-primary btn-submit"><i class="fa fa-save"></i> Submit</a>
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


