@extends('landing.layouts.app')

@section('title')
    Infaq
@endsection



@section('content')

<br>

<div class="container">
    <div class="title">
		
       

        <span>Bayar</span>
    </div>
  </div>

  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 form-bg">
			<a href="{{ url('') }}">
			<img src="{{ asset('') }}danako/img/ziswaf/bayar.jpg" class="card-img-top" alt="...">
			</a>
            
            <section class="pt-3">
                <div class="container">
                  <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12 form-bg">
                      <h2 class="text-center mt-5">TUNAIKAN ZAKAT, INFAK, DAN SEDEKAH ANDA DENGAN AMAN DAN MUDAH
                      </h2>
                      <div class="container">
                        <!-- HTML -->
                        
                      </div>
                        <div class="row pt-2">
                            <div class="col-md-1"></div>
                            <div class="col-lg-10">
                              <form name="formZakatProfesi">
                                <div class="row justify-content-center">
                                  <div class="col-md-12">
                                    <div class="container shadow p-3 mb-5 bg-body rounded">
                                        <h4>Pilih Jenis Dana</h4>

                                        <div class="mb-3">
                                            <select class="form-select" id="jenis-biaya" aria-label="Default select example">
                                                <option selected>Pilih Jenis Biaya</option>
                                                <option value="1">Zakat</option>
                                                <option value="2">Infaq</option>
                                                <option value="3">Sedekah Danako </option>
                                                <option value="4">Fidyah</option>
                                            </select>
                                        </div>

                                        <div id="zakat-khusus" style="display:none;">
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Nilai khusus Zakat</option>
                                                <option value="1">Zakat Profesi</option>
                                                <option value="2">Zakat Tabungan</option>
                                                <option value="1">Zakat Perdagaan</option>
                                                <option value="2">Zakat Emas</option>
                                            </select>
                                        </div>

                                        <div id="infaq-khusus" style="display:none;">
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Nilai khusus Infaq</option>
                                                <option value="1">Infaq Dunia Islam (Pray For Turkiye Syria)</option>
                                                <option value="2">Infaq Kemanusia</option>
                                                <option value="2">Infaq Pendidikan</option>
                                                <option value="2">Infaq Kesehatan</option>
                                                <option value="2">Infaq Ekonomi</option>
                                                <option value="2">Infaq Dakwah</option>
                                            </select>
                                        </div>

                                        <div id="sedekah-khusus" style="display:none;">
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Nilai khusus Sedekah</option>
                                                <option value="1">Infaq Dunia Islam (Pray For Turkiye Syria)</option>
                                                <option value="2">Infaq Kemanusia</option>
                                                <option value="2">Infaq Pendidikan</option>
                                                <option value="2">Infaq Kesehatan</option>
                                                <option value="2">Infaq Ekonomi</option>
                                                <option value="2">Infaq Dakwah</option>
                                            </select>
                                        </div>

    
                                          <div class="mb-3">
                                            <h4>Masukkan Nominal:</h4>
                                            <input type="text" class="form-control" name="inputPendapatanProfesi" onchange="hitungZakatProfesi()" value="0">
                                          </div>

                                    </div>

<<<<<<< HEAD
                              
=======
                                    <div class="container shadow p-3 mb-5 bg-body rounded">
                                        <h4>Silahkan lengkapi data di bawah ini:</h4>

                                          <div class="mb-3">
                                            <input type="text" class="form-control" name="inputPendapatanProfesi"  value="" placeholder="Nama Lengkap">
                                          </div>

                                          <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                <label class="form-check-label" for="inlineRadio1">1</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">2</label>
                                              </div>
                                          </div>
                            
                                          <div class="mb-3">
                                            <input type="text" class="form-control" name="inputPendapatanProfesi"  value="" placeholder="No Handphone">
                                          </div>
                                          
                                          <div class="mb-3"> 
                                            <input type="text" class="form-control" name="inputPendapatanProfesi"  value=""  placeholder="Email">
                                          </div>

                                    </div>
>>>>>>> develop-ardi

                                  </div>
                                 
                                </div>
                              
                                 
                              </form>
                              
                            
                            </div>
                        <div class="col-md-1"></div>
                        </div>
                      </h1>
                    </div>
                  </div>
                </div>
              </section>
        
          <div class="d-flex justify-content-center mb-5 ">
            <button type="button" class="btn btn-primary my-3 mx-3 bg-danako-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Pilih Pembayaran Sekarang
            </button>

            <button type="button" class="btn btn-primary my-3 mx-3 bg-danako-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Konfirmasi Pembayaran Sekarang
              </button>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>



<<<<<<< HEAD
  {{-- <div class="container shadow p-3 mb-5 bg-body rounded">
    <h4>Silahkan lengkapi data di bawah ini:</h4>

      <div class="mb-3">
        <input type="text" class="form-control" name="inputPendapatanProfesi"  value="" placeholder="Nama Lengkap">
      </div>

      <div class="mb-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">1</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">2</label>
          </div>
      </div>

      <div class="mb-3">
        <input type="text" class="form-control" name="inputPendapatanProfesi"  value="" placeholder="No Handphone">
      </div>
      
      <div class="mb-3"> 
        <input type="text" class="form-control" name="inputPendapatanProfesi"  value=""  placeholder="Email">
      </div>

</div> --}}
=======
>>>>>>> develop-ardi


@endsection


@push('after-script')
<script>
var jenisBiaya = document.getElementById("jenis-biaya");
var zakatKhusus = document.getElementById("zakat-khusus");
var infaqKhusus = document.getElementById("infaq-khusus");
var sedekahKhusus = document.getElementById("sedekah-khusus");

jenisBiaya.addEventListener("change", function() {
  if (jenisBiaya.value == 1) {
    zakatKhusus.style.display = "block";
    infaqKhusus.style.display = "none";
    sedekahKhusus.style.display = "none";
  } else if (jenisBiaya.value == 2) {
    infaqKhusus.style.display = "block";
    zakatKhusus.style.display = "none";
    sedekahKhusus.style.display = "none";

    } else if (jenisBiaya.value == 3) { 
    sedekahKhusus.style.display = "block";
    zakatKhusus.style.display = "none";
    infaqKhusus.style.display = "none";
  } else {
    zakatKhusus.style.display = "none";
    infaqKhusus.style.display = "none";
    infaqKhusus.style.display = "none";
  }
});


</script>
@endpush


