@extends('landing.layouts.app')

@section('title')
  Kategori
@endsection



@section('content')


  <div class="container">
  <div class="title">
      <img src="{{ asset('') }}danako/img/Expand_left.svg" />
      <span>{{ $category->name }}</span>
  </div>
  </div>

  <!-- slider -->
  <div class="container pb-80">
    <div class="slider">
      <h2 class="text-center"><spand class="title-gren">Tolong!</spand>Mereka segera butuh bantuanmu</h2>
      <ul class="" id="highlight">
        <div class="text-center w-100 pt-5">
          <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </ul>
    </div>
  </div>

<section class="pb-80">
  <div class="container" style="background-color: #EEF4E6" >
    <h2 class="text-center" style="font-size: 38px ; padding-top: 27px; padding-bottom: 47px;">Tolong!  <spand class="title-gren">Mereka</spand> segera butuh bantuanmu</h2>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" id="list">
        <div class="text-center w-100 pt-2">
          <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </div>
       <div class="pagination-wrapper" id="pagination">
        <ul class="pagination modal-3">
          {{-- <li><a href="#" class="prev">&laquo</a></li>
          <li><a href="#" class="active">1</a></li>
          <li> <a href="#">2</a></li>
          <li><a href="#" class="next">&raquo;</a></li> --}}
        </ul>
      </div> 
    </div>
  </div>
</section>


<div class="my-div information-container">
 <div class="container">
  <h1 class="title pt-5">Download Aplikasi DANAKO!</h1>
 <h6 class="text-center">Nikmati Kemudahan Beramal dan Salurkan bantuanmu di manapun bersama DANAKO</h6>
  <div class="text-center">
    <img src="{{ asset('') }}danako/img/category/googleplay.png" style="padding-top: 24px; padding-bottom: 41px;" />
  </div>
</div>
</div>


@endsection


@push('after-script')
  <script>
    $(document).ready(function(){
      // atas
      $.ajax({
        url: "{{ route('api.master.campaigns.pagination') }}?per_page=7&category_id={{$id}}",
        type: "GET",
        dataType: "json",
        success: function(response){
          let data = response.data.data;
          $('#highlight').addClass('cards-category');
          $('#highlight').html('');
          data.forEach(item => {
            let img_src = item.img_path ? "{{ asset('uploads') }}" + item.img_path : "{{ asset('danako/img/category/1.png') }}";
            let img_size = item.img_path ? 'width="300" height="200"' : '';
            $('#highlight').append(`
              <li class="card" onclick="detail(${item.id})">
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
              </li>
            `);
          });
        }
      })




     

      // bawah
      // $.ajax({
      //   url: "{{ route('api.master.campaigns.pagination') }}?per_page=8&category_id={{$id}}",
      //   type: "GET",
      //   dataType: "json",
      //   success: function(response){
      //     let data = response.data.data;
      //     $('#list').html('');
      //     data.forEach(item => {
      //         let img_src = item.img_path ? "{{ asset('uploads') }}" + item.img_path : "{{ asset('danako/img/category/1.png') }}";
      //         let img_size = item.img_path ? 'width="300" height="200"' : '';
      //         $('#list').append(`
      //         <div class="col">
      //         <div class="card h-100" onclick="detail(${item.id})">
      //           <img src="${img_src}" class="card-img-top ${img_size}" alt="..." onerror="this.src='{{ asset('danako/img/category/1.png') }}'">
      //           <div class="card-body">
      //             <p>${new Date(item.start_date).toLocaleDateString("id", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</p>
      //             <h5 class="card-title">${item.title.split(' ').slice(0,4).join(' ')}${item.title.split(' ').length > 4 ? '...' : ''}</h5>
      //             <p class="card-text">${item.description.split(" ").slice(0, 16).join(" ")}${item.description.split(" ").length > 16 ? "..." : ""}</p>
      //             <div class="progress">
      //               <div class="progress-bar bg-danako" role="progressbar" style="width: 10%;  border-radius: 100px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
      //             </div>
      //             <div class="row">
      //               <div class="col-6 text-start text-success pt-2">Rp ${new Intl.NumberFormat().format(item.target_amount)}</div>
      //               <div class="col-6 text-end pt-2">${days(new Date(item.end_date), new Date())} hari lagi</div>
      //             </div>
      //           </div>
      //         </div>
      //       </div>
      //       `);
      //     });
      //   },
      //   error: function(response){
      //   $('#list').html('Ada kesalahan server')
      // }
      // })


    });
  </script>

  <script>
    let page = 1;
  let perPage = 8;
  
  function loadCampaigns() {
  $.ajax({
  url: "{{ route('api.master.campaigns.pagination') }}?page=" + page + "&per_page=" + perPage + "&category_id={{$id}}",
  type: "GET",
  dataType: "json",
  success: function(response){
  let data = response.data.data;
  $('#list').html('');
  data.forEach(item => {
        let img_src = item.img_path ? "{{ asset('uploads') }}" + item.img_path : "{{ asset('danako/img/category/1.png') }}";
        let img_size = item.img_path ? 'width="300" height="200"' : '';
        $('#list').append(`
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
      `);
    });
  // render pagination links
  renderPagination(response.data);
  },
  error: function(response){
  $('#list').html('Ada kesalahan server')
  }
  })
  }
  
  function renderPagination(data) {
  let totalItems = data.total;
  let totalPages = Math.ceil(totalItems / perPage);
  let currentPage = data.current_page;
  
  let paginationHtml = '<div class="pagination-wrapper" id="pagination"><ul class="pagination modal-3">';
  
  // Previous page button
  if (currentPage > 1) {
    paginationHtml += '<li><a href="#" class="prev" onclick="changePage(' + (currentPage - 1) + ')">&laquo;</a></li>';
  } else {
    paginationHtml += '<li class="disabled"><a href="#" class="prev">&laquo;</a></li>';
  }
  
  // Page numbers
  for (let i = 1; i <= totalPages; i++) {
    if (i == currentPage) {
      paginationHtml += '<li><a href="#" class="active">' + i + '</a></li>';
    } else {
      paginationHtml += '<li><a href="#" onclick="changePage(' + i + ')">' + i + '</a></li>';
    }
  }
  
  // Next page button
  if (currentPage < totalPages) {
    paginationHtml += '<li><a href="#" class="next" onclick="changePage(' + (currentPage + 1) + ')">&raquo;</a></li>';
  } else {
    paginationHtml += '<li class="disabled"><a href="#" class="next">&raquo;</a></li>';
  }
  
  paginationHtml += '</ul></div>';
  
  $('#pagination').html(paginationHtml);
}
  
  
  function changePage(newPage) {
  page = newPage;
  loadCampaigns();
  return false;
  }
  
  loadCampaigns();
  </script>
@endpush


