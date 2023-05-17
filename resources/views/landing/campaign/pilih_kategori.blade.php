@extends('landing.layouts.app')

@section('title', 'Pilih Kategori')

@push('after-style')
  <style>
    .card.kategori.active{
      border: 2px solid #79C121;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elem = document.getElementsByTagName('body')[0];
      elem.classList.add('d-flex', 'flex-column', 'h-100');
    });
  </script>
@endpush

@section('content')
<main class="flex-shrink-0 my-auto">
  <div class="container my-md-5 my-4">
    <div class="row" id="medis">
      <div class="col-md-6 mb-md-0 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <div class="row">
              <div class="col-2">
                <img src="https://galang-dana.kitabisa.com/illustrations/icon-galang-dana-medis.svg" alt="icon galang dana medis" class="jsx-4c901ca77bed544d mb-4">
              </div>
              <div class="col-10">
                <h6>Galang dana bantuan orang sakit</h6>
                <p class="m-0">Khusus biaya pengobatan atau perawatan penyakit tertentu.</p>
              </div>
            </div>
          </div>
          <div class="card-footer text-center bg-white border-0">
            <a href="{{ route('buat-campaign', config('env.category_medis')) }}" class="btn btn-block btn-outline-danako btn-lg w-100 hover-color-white fs-6"><b> Buat campaign orang sakit </b></a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="row">
              <div class="col-2">
                <img src="https://galang-dana.kitabisa.com/illustrations/icon-galang-dana-nonmedis.svg" alt="icon galang dana nonmedis" class="jsx-4c901ca77bed544d mb-4">
              </div>
              <div class="col-10">
                <h6>Galang dana bantuan lainnya</h6>
                <p class="m-0">Untuk bantuan pendidikan, kemanusiaan, bencana alam, dsb.</p>
              </div>
            </div>
          </div>
          <div class="card-footer text-center bg-white border-0">
            <button type="button" class="btn btn-block btn-outline-danako btn-lg w-100 hover-color-white fs-6" id="btn-lainnya"><b> Buat campaign bantuan lainnya </b></button>
          </div>
        </div>
      </div>
    </div>

    <div id="lainnya" style="display: none">
      <div class="row" id="list-kategori">
        <div class="col-12 text-center mb-3 mb-lg-5">
          <div class="spinner-border text-danako" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-6 text-center mb-3">
          <button type="button" class="btn btn-block btn-outline-danako btn-lg fs-6 w-100 hover-bg-secondary hover-text-danako" id="back"><b>Kembali</b></button>
        </div>
        <div class="col-12 col-md-6 text-center mb-3">
          <button type="button" class="btn btn-block btn-danako btn-lg fs-6 w-100 disabled" id="next"><b>Selanjutnya</b></button>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@push('after-script')
  <script>
    $(document).ready(function() {
      $('#btn-lainnya').click(function() {
        $('#medis').hide();
        $('#lainnya').fadeIn('slow');

        $.ajax({
          url: "{{ route('api.master.categories.list') }}?nonmedis=1",
          type: "GET",
          dataType: "JSON",
          beforeSend: function() {
            $('#list-kategori').html('<div class="col-12 text-center mb-3 mb-lg-5"><div class="spinner-border text-danako" role="status"><span class="visually-hidden">Loading...</span></div></div>');
          },
          success: function(response) {
            let data = response.data;
            $('#list-kategori').html('');
            data.forEach(item => {
              $('#list-kategori').append(`
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card kategori" data-id="${item.id}" style="cursor: pointer" onclick="categoryClick(this)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="${item.logo_link}" alt="icon ${item.name}" width="35" height="35" class="jsx-798d2d03a986eda8">
                        </div>
                        <div class="col-10 d-flex align-items-center">
                          <h6 class="m-0">${item.name}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              `)
            });
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        })
      });

      $('#back').click(function() {
        $('#lainnya').hide();
        $('#medis').fadeIn('slow');
      });

      $('#next').click(function() {
        let id = $('.card.kategori.active').data('id');
        window.location.href = "{{ route('buat-campaign', '') }}/" + id;
      })
    })

    const categoryClick = (e) => {
      $('.card.kategori').removeClass('active');
      $(e).addClass('active');
      $('#next').removeClass('disabled');
    }
  </script>
@endpush