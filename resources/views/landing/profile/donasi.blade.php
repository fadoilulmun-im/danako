

@extends('landing.layouts.profile')

@section('title', 'Riwayat DOnasi')

@section('content')

<div class="p-5 bg-white rounded shadow mb-5">
  <h1>Riwayat Donasi</h1>
  <div id="list-donasi">
    <div class="text-center w-100">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
  </div>  
</div>   

@endsection


@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.5/plugin/relativeTime.min.js"></script>
<script>
    dayjs.extend(window.dayjs_plugin_relativeTime);
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

    $(document).ready(() => {
      $.ajax({
        url: "{{ route('api.master.donations.list') }}?token=" + localStorage.getItem('_token'),
        type: 'GET',
        success: (response) => {
          const data = response.data;
          $('#list-donasi').html(``);
          data.forEach(item => {
            let bg = '';
            switch (item.status) {
              case 'PENDING':
                bg = 'warning';
                break;
              case 'PAID':
                bg = 'success';
                break;
              default:
                bg = 'danger';
                break;
            }
            $('#list-donasi').append(`
              <div class="card rounded py-3 px-3 mt-3">
                <div class="row">
                  <div class="col-6 text-start text-success pt-2"><h5 class="card-title pb-1 pt-1">Donasi Untuk Campaign ${item.campaign.title}</h5></div>
                  <div class="col-6 text-end pt-2"><span class="badge bg-${bg}" >${item.status}</span></div>
                </div>
                <p class="card-text pt-2 pb-1">${item.hope}</p>
                <div class="row">
                  <div class="col-6 text-start text-success pt-2">Donasi yang di Sumbangkan Rp ${new Intl.NumberFormat().format(item.amount_donations)}</div>
                  <div class="col-6 text-end pt-2">${
                    item.status == 'PENDING' ? '<a href="' + item.payment_link + '" class="btn btn-sm btn-warning text-white">Lanjutkan Pembayaran</a>' : 
                     dayjs(new Date(item.created_at)).fromNow()
                  }</div>
                </div>
              </div>
            `)
          });

          if(!data.length){
            $('#list-donasi').html(`
              <div class="text-center w-100 mt-4">
                <h3>Belum ada riwayat donasi</h3>
              </div>
            `)
          }
        }
      })
    })
  </script>
@endpush


