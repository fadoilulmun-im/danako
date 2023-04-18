@extends('landing.layouts.profile')

@section('title')
  Profil
@endsection



@section('content')
  <div class="col-md-19">
    <div class="account-details">
      <h3 class="pb-5">Basic Information</h3>
  
      <div class="contact">
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

              <h6>Tempat dan Tanggal Lahir</h6>   
              <div class="group form-group">   
                <input type="date" class="form-control" id="name" required>
                <span class="highlight"></span>
                <span class="bar"></span>
              </div>

              <div class="group">
                <select class="form-control" id="select">
                    <option value="">Jenis Kelamin</option>
                    <option value="option1">Laki-Laki</option>
                    <option value="option2">Perempuan</option>
                </select>
                <label for="select">Pilih Jenis Kelamin</label>
                <div class="bar"></div>
              </div>

              <div class="group form-group">      
                <input type="text" class="form-control" id="name" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Masukkan Pekerjaan</label>
              </div>

              <h6 class="pb-2">Kewarganegaraan</h6>
              <div class="form-check form-check-inline pb-4">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">1</label>
              </div>
              <div class="form-check form-check-inline pb-4">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">2</label>
              </div>
                
              <div class="group form-group">      
                <input type="mail" class="form-control" id="email" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Email</label>
              </div>

              <div class="group form-group">      
                <input type="text" class="form-control" id="email" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Nomor Handphone</label>
              </div>

              <div class="group form-group">      
                  <input type="text" class="form-control" id="email" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Nomor Handphone</label>
              </div>
                  
              <div class="form-group group">
                <input type="text" class="form-control" id="subject" name="subject" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Subject</label>
              </div>

              <div class="group">
                <select class="form-control" id="select">
                  <option value="">Pilih Salah Satu</option>
                  <option value="option1">Option 1</option>
                  <option value="option2">Option 2</option>
                  <option value="option3">Option 3</option>
                </select>
                <label for="select">Pilih Salah Satu</label>
                <div class="bar"></div>
              </div>

              <div class="form-group group">
                <input type="text" class="form-control" id="subject" name="subject" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Subject</label>
              </div>

              <div class="form-group group">
                <div class="text-group">
                    <textarea required="required" class="form-control" rows="6"></textarea>
                    <label for="textarea" class="input-label">Textarea</label><i class="bar"></i>
                </div>
              </div>


              <div class="form-group group">
                <div class="text-group">
                  <textarea required="required" class="form-control" rows="6"></textarea>
                  <label for="textarea" class="input-label">Textarea</label><i class="bar"></i>
                </div>
              </div>
              <button type="button" id="submit" name="submit" class="btn btn-primary col-md-12">Simpan</button>              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@push('after-script')
<script>
    // Menangkap semua elemen tab
    var tabs = document.querySelectorAll('#myTab a')
  
    // Menambahkan event click ke setiap elemen tab
    tabs.forEach(function(tab) {
      tab.addEventListener('click', function(e) {
        e.preventDefault()
  
        // Menangkap target tab yang diklik
        var target = this.getAttribute('href')
  
        // Menghapus kelas 'active' dari semua elemen tab
        tabs.forEach(function(tab) {
          tab.classList.remove('active')
        })
  
        // Menambahkan kelas 'active' ke tab yang diklik
        this.classList.add('active')
  
        // Menghapus kelas 'show' dan 'active' dari semua elemen konten tab
        var tabContents = document.querySelectorAll('.tab-pane')
        tabContents.forEach(function(content) {
          content.classList.remove('show', 'active')
        })
  
        // Menambahkan kelas 'show' dan 'active' ke konten tab yang sesuai dengan tab yang diklik
        document.querySelector(target).classList.add('show', 'active')
      })
    })
  </script>
@endpush


