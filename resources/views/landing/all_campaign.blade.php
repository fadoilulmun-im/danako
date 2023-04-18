@extends('landing.layouts.app')

@section('title')
  Kategori
@endsection



@section('content')


  <div class="container">

  </div>

  <!-- slider -->
  <div class="container pb-80">
    <form class="find-form">
        <div class="row">

            <div class="col-lg-3">
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Job Title or Keyword">
                    <i class="bx bx-search-alt"></i>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Job Title or Keyword">
                    <i class="bx bx-search-alt"></i>
                </div>
            </div>
    
            <div class="col-lg-3">
                <select class="category">
                    <option data-display="Category">Category</option>
                    <option value="1">Web Development</option>
                    <option value="2">Graphics Design</option>
                    <option value="4">Data Entry</option>
                    <option value="5">Visual Editor</option>
                    <option value="6">Office Assistant</option>
                </select>
            </div>
    
            <div class="col-lg-3">
                <button type="submit" class="find-btn">
                    Find A Job
                    <i class='bx bx-search'></i>
                </button>
            </div>

        </div>
    </form>
  </div>


 

<section class="pb-80">
  <div class="container" style="background-color: #EEF4E6" >
    <h2 class="text-center" style="font-size: 38px ; padding-top: 27px; padding-bottom: 47px;">Tolong!  <spand class="title-gren">Mereka</spand> segera butuh bantuanmu</h2>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" id="segera">
            <div class="text-center w-100">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </div>
      <div class="pagination-wrapper">
        <ul class="pagination modal-3">
          <li><a href="#" class="prev">&laquo</a></li>
          <li><a href="#" class="active">1</a></li>
          <li> <a href="#">2</a></li>
          <li> <a href="#">3</a></li>
          <li> <a href="#">4</a></li>
          <li> <a href="#">5</a></li>
          <li> <a href="#">6</a></li>
          <li> <a href="#">7</a></li>
          <li> <a href="#">8</a></li>
          <li> <a href="#">9</a></li>
          <li><a href="#" class="next">&raquo;</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>


<div class="my-div information-container">
 <div class="container">
  <h1 class="title pt-5">Download Aplikasi DANAKO!</h1>
  <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam sit amet, Lorem ipsum dolor sit amet, consectetur adipisci</h6>
  <div class="text-center">
    <img src="{{ asset('') }}danako/img/category/googleplay.png" style="padding-top: 24px; padding-bottom: 41px;" />
  </div>
</div>
</div>


@endsection


@push('after-script')
  <script>
$(document).ready(function(){
  $.ajax({
    url: "{{ route('api.master.campaigns.pagination') }}?per_page=4",
    type: "GET",
    success: function(response){
      let data = response.data.data;
      $('#segera').html('');
      data.forEach(item => {
        let img_src = item.img_path ? "{{ asset('uploads') }}" + item.img_path : "{{ asset('danako/img/category/1.png') }}";
        let img_size = item.img_path ? 'width="300" height="200"' : '';
        $('#segera').append(`
          <div class="col">
            <div class="card h-100" onclick="detail(${item.id})">
              <img src="${img_src}" class="card-img-top ${img_size}" alt="..." onerror="this.src='{{ asset('danako/img/category/1.png') }}'">
              <div class="card-body">
                <p>${new Date(item.start_date).toLocaleDateString("id", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</p>
                <h5 class="card-title">${item.title.split(' ').slice(0,4).join(' ')}${item.title.split(' ').length > 4 ? '...' : ''}</h5>
                <p class="card-text">${item.description.split(" ").slice(0, 16).join(" ")}${item.description.split(" ").length > 16 ? "..." : ""}</p>
                <div class="progress">
                  <div class="progress-bar bg-danako" role="progressbar" style="width: 10%;  border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="row">
                  <div class="col-6 text-start text-success pt-2">Rp ${new Intl.NumberFormat().format(item.target_amount)}</div>
                  <div class="col-6 text-end pt-2">${days(new Date(item.end_date), new Date())} hari lagi</div>
                </div>
              </div>
            </div>
          </div>
        `)
      });
      $('#lihat-semua').toggleClass('d-none');
    },
    error: function(response){
      $('#segera').html('Ada kesalahan server')
    }
  })
});


  </script>
@endpush

