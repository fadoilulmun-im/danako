@extends('landing.layouts.app')

@section('title', 'Pencairan')

@push('after-style')


@endpush

@section('content')
<div class="container pt-4">
  <h1 class="color-primary">Pencairan Dana</h1>
  <a href="{{ url('ajukan-pencairan-dana').'/'.$id }}" class="btn btn-outline-success" type="button">Cairkan Dana</a>
  <input type="hidden" id="campaign_id" value="{{ $campaign->id }}">
</div>

{{-- <div class="row-container"> --}}
  <section class="account-section pt-4 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
              <div class="p-5 bg-white mb-5 shadow">
                <!-- Rounded tabs -->
                <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
                  <li class="nav-item flex-sm-fill">
                    <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link border-0 text-uppercase font-weight-bold active">Semua</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="profile-tab" data-toggle="tab" href="#processing" role="tab" aria-controls="profile" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Diproses</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="contact-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Berhasil</a>
                  </li>
                  <li class="nav-item flex-sm-fill">
                    <a id="contact-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="contact" aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Ditolak</a>
                  </li>
                </ul>
            
                <div id="myTabContent" class="tab-content">
                  <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade py-5 show active">
                    <div class="container-fluid" style="max-height: 800px; overflow-y: scroll;" id="list-pencairan-all">
                      {{-- //kontain --}}
                      {{-- <div class="card mt-3">
                        <div class="card-header bg-white">
                          <div class="row">
                            <div class="col-10 text-start pt-2">
                              <div class="row">
                                <small>13 Nov 2022, 08:00 AM</small>
                                <h5 class="card-title pt-1"><span class="text-success">Rp 15.000.000</span></h5>
                              </div>
                            </div>
                            <div class="col-2 text-end pt-2"><span class="badge p-2 bg-success">Berhasil</span></div>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <span>BRI - 123456789 a.n. <b>SITI FATIMAH</b></span>
                            <span>BRI - 123456789</span>
                            <span>Rincian penggunaan dana: Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit 
                              amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, 
                              consectetur adipisLorem ipsum dolor sit amet, consectetur adipis
                            </span>
                          </div>
                        </div>
                      </div> --}}
                      {{-- <div class="row pt-3 pb-3 shadow">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-6 text-start pt-2">
                              <h4 class="card-title pb-1 pt-1"><span class="py-3 px-3 text-success">Rp.15000000</span></h4>
                            </div>
                            <div class="col-6 text-end pt-2"><span class="badge p-2 bg-success">Berhasil</span></div>
                          </div>
                          <h6 class="card-text">Lorem ipsum dolor sit amet, consectetur adipis</h6>
                          <h6 class="card-text">Keterangan penggunaan dana:</h6>
                          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectet</p>
                        </div>
                      </div> --}}
                      <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
                      </div>
                    </div>
                  </div>
            
                  <div id="approved" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade py-5">
                    <div class="container-fluid" style="max-height: 1500px; overflow-y: scroll;" id="list-pencairan-approved">
                      {{-- //kontain --}}
                      <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="row pt-3 pb-3 shadow">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-6 text-start pt-2"><h4 class="card-title pb-1 pt-1">Pencairan Sukses<span class="py-3 px-3 text-success">Rp.15000000</span></h4></div>
                          <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Aktiv</button></div>
                        </div>
                        <h6 class="card-text">Lorem ipsum dolor sit amet, consectetur adipis</h6>
                        <h6 class="card-text ">Lorem ipsum dolor sit amet, consectetur adipis</h6>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consectetur adipis </p>
                        <div class="row">
                          <div class="col-md-3">
                              <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 " alt="...">
                          </div>
                          <div class="col-md-3">
                              <img src="{{ asset('') }}danako/img/category/1.png" class="img-thumbnail border-0 " alt="...">
                          </div>
                        </div>
                      </div>
                    </div> --}}
                  </div>
            
                  <div id="rejected" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade py-5">
                    <div class="container-fluid" style="max-height: 1500px; overflow-y: scroll;" id="list-pencairan-rejected">
                      {{-- //kontain --}}
                      <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
                      </div>
                    </div>
                  </div>
            
                  <div id="processing" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade py-5">
                    <div class="container-fluid" style="max-height: 1500px; overflow-y: scroll;" id="list-pencairan-processing">
                      {{-- //kontain --}}
                      <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
                      </div>
                    </div>
                  </div>
            
            
            
                </div>
                <!-- End rounded tabs -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="bg-white rounded mb-5">
                <div class="row">
                    <div class="col-sm-12 px-4 shadow">
                        <h5 class="pt-4 pb-3">Informasi Pengunaan Dana</h5>
      
                        <div class="bg-info border border-primary mb-3 rounded-3" >
                            <div class="card-body text-white">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="card-title">Sudah Di Cairkan</h6>
                                        <p class="card-text">Rp {{ $sudahDicairkan }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="card-title">Belum Di Cairkan</h6>
                                        <p class="card-text">Rp {{ $belumDicairkan }}</p>
                                    </div>
                                    {{-- <div class="col-md-12 py-1 bg-light text-dark rounded-3">
                                        Data Di Perbarui setiap 15 menit harap Terakir 23 - Maret - 2022
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <h5 class="pt-1 pb-1">Total Transaksi sampai saat  ini</h5>
                        <div class="d-flex justify-content-between pb-3">
                          <span>Jumlah Donasi</span>
                          <span>{{ $donasi }} transaksi</span>
                        </div>
                        <div class="d-flex justify-content-between pb-3">
                          <span>Jumlah Donatur</span>
                          <span>{{ $donatur }} donatur</span>
                        </div>
                        <div class="d-flex justify-content-between pb-3">
                          <span>Dana Terkumpul</span>
                          <span>Rp {{ $totalDana }}</span>
                        </div>
                        {{-- <div class="row">
                            <div class="col">
                              <p>Jumlah Donasi</p>
                              <p>Jumlah Donatur</p>
                              <p>Dana Terkumpul</p>
                            </div>
                            <div class="col text-right">
                              <p>Rp 30000</p>
                              <p>Rp 30000</p>
                              <p>Rp 30000</p>
                            </div>
                        </div> --}}
                        <h5 class="pt-1 pb-1">Rincian dana terkumpul</h5>
                        <div class="d-flex justify-content-between pb-3">
                          <span>&#8226; Biaya Transaksi Bank</span>
                          <span>Rp {{ $totalBiayaTransaksi }}</span>
                        </div>
                        <div class="d-flex justify-content-between pb-3">
                          <span>&#8226; Donasi operasional DANAKO</span>
                          <span>Rp {{ $totalBiayaPlatform }}</span>
                        </div>
                        <div class="d-flex justify-content-between pb-3">
                          <span>Dana dapat dicairkan</span>
                          <span>Rp {{ $dapatDicairkan }}</span>
                        </div>
                        {{-- <div class="row">
                            <div class="col">
                              <p>Biaya Transaksi Bank</p>
                              <p>Donasi operasional DANAKO</p>
                              <p>Jumlah Saat Ini</p>
                            </div>
                            <div class="col text-right">
                              <p>Rp 30000</p>
                              <p>Rp 30000</p>
                              <p>Rp 30000</p>
                            </div>
                        </div> --}}
                        {{-- <div class="row">
                            <div class="col">
                              <p>Dana Dapat Di Cairkan</p>
                              
                            </div>
                            <div class="col text-right">
                                <p>Rp 30000</p>
                            </div>
                        </div> --}}
                        <div class="alert alert-warning fade show" role="alert">
                            <div class="row mb-2">
                              <div class="col-md-1">
                                <strong>*</strong>
                              </div>
                              <div class="col-md-11">
                                <span>Dana dapat dicairkan dan dikelola oleh penggalang dana</span>
                              </div>
                            </div>
                            <div class="row mb-2">
                              <div class="col-md-1">
                                <strong>**</strong>
                              </div>
                              <div class="col-md-11">
                                <span>Biaya transaksi bank 100% ditujukan untuk pihak ketiga penyedia layanan transaksi digital melalui 
                                  Virtual Account, dompet digital dan QRIS. DANAKO tidak mengambil keuntungan dari layanan ini.
                                </span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-1">
                                <strong>***</strong>
                              </div>
                              <div class="col-md-11">
                                <span>Donasi untuk operasional DANAKO agar donasi semakin mudah, aman & transparan. 
                                  Maksimal 5% dari setiap donasi yang terkumpul.
                                </span>
                              </div>
                            </div>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                            </div>
                        </div>
                    </div>
                </div>
          </div>
        </div>
    </div>
</section>
   
{{-- </div> --}}


@endsection


@push('after-script')
<script>
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

  $(document).ready(()=>{
      $.ajax({
        url: "{{ route('api.master.withdrawal.list', '') }}/" + $('#campaign_id').val(),
        type: "GET",
        dataType: "json",
        success: function (response) {
          const datas = response.data;
          $('#list-pencairan-all').html('');
          $.each(datas, function(i, item) {
            let bg = '';
            let status = '';
            switch (item.status) {
              case 'processing':
                bg = 'warning';
                status = 'Diproses';
                break;
              case 'approved':
                bg = 'success';
                status = 'Berhasil';
                break;
              case 'rejected':
                bg = 'danger';
                status = 'Ditolak';
                break;
              default:
                break;
            }
            $('#list-pencairan-all').append(`
            <div class="card mb-3">
              <div class="card-header bg-white">
                <div class="row">
                  <div class="col-10 text-start pt-2">
                    <div class="row">
                      <small>${item.created_at}</small>
                      <h5 class="pt-1">Pencairan Dana <span class="text-success">Rp ${new Intl.NumberFormat().format(item.amount)}</span></h5>
                    </div>
                  </div>
                  <div class="col-2 text-end pt-2"><span class="badge p-2 bg-${bg}">${status}</span></div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <span><b>${item.rek_name}</b></span>
                  <span>${item.bank_name} - ${item.rek_number}</span>
                  <span>Rincian penggunaan dana: ${item.description}
                  </span>
                </div>
              </div>
            </div>
            `);
          });
        },
        error: function (data) {
          console.log(data);
        }
      });
  });

  $(document).ready(()=>{
      $.ajax({
        url: "{{ route('api.master.withdrawal.list', '') }}/" + $('#campaign_id').val() + "&status=processing",
        type: "GET",
        dataType: "json",
        success: function (response) {
          const datas = response.data;
          $('#list-pencairan-processing').html('');
          $.each(datas, function(i, item) {
            $('#list-pencairan-processing').append(`
            <div class="card mb-3">
              <div class="card-header bg-white">
                <div class="row">
                  <div class="col-10 text-start pt-2">
                    <div class="row">
                      <small>${item.created_at}</small>
                      <h5 class="pt-1">Pencairan Dana <span class="text-success">Rp ${new Intl.NumberFormat().format(item.amount)}</span></h5>
                    </div>
                  </div>
                  <div class="col-2 text-end pt-2"><span class="badge p-2 bg-warning">${item.status}</span></div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <span><b>${item.rek_name}</b></span>
                  <span>${item.bank_name} - ${item.rek_number}</span>
                  <span>Rincian penggunaan dana: ${item.description}
                  </span>
                </div>
              </div>
            </div>
            `);
          });
        },
        error: function (data) {
          console.log(data);
        }
      });
  });

  $(document).ready(()=>{
      $.ajax({
        url: "{{ route('api.master.withdrawal.list', '') }}/" + $('#campaign_id').val() + "&status=approved",
        type: "GET",
        dataType: "json",
        success: function (response) {
          const datas = response.data;
          $('#list-pencairan-approved').html('');
          $.each(datas, function(i, item) {
            $('#list-pencairan-approved').append(`
            <div class="card mb-3">
              <div class="card-header bg-white">
                <div class="row">
                  <div class="col-10 text-start pt-2">
                    <div class="row">
                      <small>${item.created_at}</small>
                      <h5 class="pt-1">Pencairan Dana <span class="text-success">Rp ${new Intl.NumberFormat().format(item.amount)}</span></h5>
                    </div>
                  </div>
                  <div class="col-2 text-end pt-2"><span class="badge p-2 bg-success">${item.status}</span></div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <span><b>${item.rek_name}</b></span>
                  <span>${item.bank_name} - ${item.rek_number}</span>
                  <span>Rincian penggunaan dana: ${item.description}
                  </span>
                </div>
              </div>
            </div>
            `);
          });
        },
        error: function (data) {
          console.log(data);
        }
      });
  });

  $(document).ready(()=>{
    $.ajax({
      url: "{{ route('api.master.withdrawal.list', '') }}/" + $('#campaign_id').val() + "&status=rejected",
      type: "GET",
      dataType: "json",
      success: function (response) {
        const datas = response.data;
        $('#list-pencairan-rejected').html('');
        $.each(datas, function(i, item) {
          $('#list-pencairan-rejected').append(`
          <div class="card mb-3">
            <div class="card-header bg-white">
              <div class="row">
                <div class="col-10 text-start pt-2">
                  <div class="row">
                    <small>${item.created_at}</small>
                    <h5 class="pt-1">Pencairan Dana <span class="text-success">Rp ${new Intl.NumberFormat().format(item.amount)}</span></h5>
                  </div>
                </div>
                <div class="col-2 text-end pt-2"><span class="badge p-2 bg-danger">${item.status}</span></div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <span><b>${item.rek_name}</b></span>
                <span>${item.bank_name} - ${item.rek_number}</span>
                <span>Rincian penggunaan dana: ${item.description}
                </span>
              </div>
            </div>
          </div>
          `);
        });
      },
      error: function (data) {
        console.log(data);
      }
      });
  });



  
</script>
@endpush


