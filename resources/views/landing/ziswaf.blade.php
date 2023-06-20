@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')

 <div class="container">
        <div class="title">
           
            <span>Ziswaf</span>
        </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-md-3 mb-4">

            <a href="{{ url('zakat') }}" class="card-link">
              <div class="card">
                <div class="container">
                  <div class="card-body">
                    <div class="card-body d-flex align-items-center">
                      <i class="fa-solid fa-hand-holding-heart fa-2xl" style="color: #1c913c;"></i>
                      <h5 class="card-title mb-0 text-black ms-3 text-dark">Zakat</h5>
                    </div>
                    <p class="card-text text-dark">Zakat penghasilan atau yang dikenal juga sebagai zakat profesi adalah bagian dari zakat maal yang wajib dikeluarkan atas harta yang berasal dari pendapatan / penghasilan rutin dari pekerjaan yang tidak melanggar syariah. Nishab zakat penghasilan sebesar 85 gram emas per tahun. Kadar zakat penghasilan senilai 2,5%. Dalam praktiknya, zakat penghasilan dapat ditunaikan setiap bulan dengan nilai nishab per bulannya.....</p>
                  </div>
                  <img src="{{ asset('') }}danako/img/ziswaf/zakat.png" class="card-img-top" alt="...">
                </div>
              </div>
            </a>
          
          </div>
          
          
            <div class="col-md-3 mb-4">
              <a href="{{ url('infaq') }}" class="card-link">
              <div class="card">
                <div class="container">
                  <img src="{{ asset('') }}danako/img/ziswaf/infaq.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <div class="card-body d-flex align-items-center">
                      <i class="fa-solid fa-star-and-crescent fa-2xl" style="color: #1c913c;"></i>
                      <h5 class="card-title mb-0 ms-3 text-dark">Infaq</h5>
                    </div>
                    <p class="card-text text-dark">infak adalah harta yang dikeluarkan oleh seseorang atau badan usaha di luar zakat untuk kemaslahatan umum (Menurut Undang-Undang Nomor 23 Tahun 2011 tentang Pengelolaan Zakat pada BAB I Pasal 1). infak merupakan amalan yang tak bisa lepas dari kehidupan sehari-hari seorang Muslim. infak berasal dari Bahasa Arab, "anfaqa" yang berarti membelanjakan harta atau memberikan harta. Sedangkan infak berarti keluarkanlah harta.</p>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <div class="col-md-3 mb-4">
              <a href="{{ url('sedekah') }}" class="card-link">
                <div class="card">
                  <div class="container">
                    <div class="card-body">
                      <div class="card-body d-flex align-items-center">
                        <i class="fa-solid fa-hand-holding-droplet fa-2xl" style="color: #1c913c;"></i>
                        <h5 class="card-title mb-0 ms-3 text-dark">Sedekah</h5>
                      </div>
                      <p class="card-text text-dark">Sedekah merupakan kata yang sangat familiar di kalangan umat Islam. Sedekah diambil dari kata bahasa Arab yaitu “shadaqah”, berasal dari kata sidq (sidiq) yang berarti “kebenaran”. Menurut peraturan BAZNAS No.2 tahun 2016, sedekah adalah harta atau non harta yang dikeluarkan oleh seseorang atau badan usaha di luar zakat untuk kemaslahatan umum.

                        Sedekah merupakan amalan yang dicintai Allah SWT.</p>
                    </div>
                    <img src="{{ asset('') }}danako/img/ziswaf/sedekah.png" class="card-img-top" alt="...">
                  </div>
                </div>
              </a>
              </div>
            
              
              <div class="col-md-3 mb-4">
                <a href="{{ url('waqaf') }}" class="card-link">
                <div class="card">
                  <div class="container">
                    <img src="{{ asset('') }}danako/img/ziswaf/waqaf.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <div class="card-body d-flex align-items-center">
                        <i class="fa-solid fa-building fa-2xl" style="color: #1c913c;"></i>
                        <h5 class="card-title mb-0 ms-3 text-dark">Wakaf</h5>
                      </div>
                      <p class="card-text text-dark">Hikmah wakaf adalah sesuatu yang dapat kita petik setelah membagikan sebagian harta kita untuk kebutuhan sosial atau ibadah. Selain sebagai salah satu cara mendekatkan diri pada Tuhan, wakaf juga memberikan pahala yang terus mengalir karena bisa memberikan manfaat tak terhingga bagi banyak orang. Apakah wakaf bermanfaat bagi umat?......
                       </p>
                    </div>
                  </div>
                </div>
              </a>
              </div>
             

          </div>
      </div>

@endsection


@push('after-script')




<script>

  </script>
@endpush


