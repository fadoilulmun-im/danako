@extends('landing.layouts.app')

@section('title')
    Waqaf
@endsection



@section('content')

<br>

<div class="container pt-5">
    <div class="title">
        <span>Waqaf</span>
    </div>
  </div>

  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 form-bg">
			<div class="container">
				<p class="mb-4 mt-4">Hukum waqaf adalah ketentuan dalam agama Islam mengenai penyerahan sebagian harta atau aset untuk kepentingan umum atau kegiatan amal yang bersifat abadi. Waqaf sering kali dilakukan dengan tujuan untuk mendirikan masjid, sekolah, rumah sakit, dan lembaga amal lainnya.</p>
				<p class="mb-4 mt-4">Dalam hukum waqaf, harta atau aset yang diwakafkan tidak boleh diperjualbelikan, dipindahtangankan, atau dimanfaatkan oleh pemiliknya. Penerima manfaat waqaf adalah umat Islam secara umum, dan keberlanjutan manfaatnya dijamin selama berlangsungnya waqaf tersebut.</p>
				<p class="mb-4 mt-4">Waqaf merupakan salah satu amalan yang sangat dianjurkan dalam Islam. Dalam banyak hadis, Nabi Muhammad SAW menganjurkan umatnya untuk berwakaf dan menyebutkan bahwa pahala waqaf akan terus mengalir kepada pemberi waqaf, bahkan setelah kematian. Waqaf juga dianggap sebagai salah satu bentuk investasi akhirat yang memberikan manfaat jangka panjang bagi umat manusia.
				</p>
				
			</div>
			<a href="{{ url('') }}">
			<img src="{{ asset('danako/img/ziswaf/waqaf.jpeg') }}" class="card-img-top" alt="...">
			</a>

		  <div class="container my-4 mx-4">
			<h5 >Keutamaan Waqaf</h5>
			<p class="mb-4 mt-4">1.berkesinambungan dan Abadi</p>
			<p>Salah satu keutamaan waqaf adalah sifatnya yang berkesinambungan dan abadi. Ketika seseorang atau sebuah lembaga mewakafkan harta atau aset untuk kepentingan umum, manfaatnya akan terus berlanjut sepanjang waktu. Misalnya, jika tanah diwakafkan untuk membangun masjid, masjid tersebut akan terus memberikan manfaat kepada umat selama berlangsungnya waqaf tersebut.</p>
			</div>

			<div class="container my-4 mx-4">
				<p class="mb-4 mt-4">2.Investasi Akhirat</p>
				<p>
					Waqaf juga dianggap sebagai investasi akhirat yang sangat berharga. Dengan mewakafkan harta atau aset, seseorang berkontribusi dalam membangun lembaga amal yang bermanfaat bagi umat Islam. Pahala dari waqaf akan terus mengalir kepada pemberi waqaf, bahkan setelah kematian. Hal ini sesuai dengan hadis Nabi Muhammad SAW yang menyatakan bahwa amal jariyah (amal yang terus berlanjut) akan memberikan manfaat kepada pelakunya di kehidupan akhirat.</p>	
				</div>
			

				<div class="container my-4 mx-4">
						<p class="mb-4 mt-4">3. Menjadi Sumber Keberkahan</p>
						<p>
							Waqaf dianggap sebagai salah satu sumber keberkahan dalam kehidupan. Dengan mewakafkan harta atau aset, seseorang menunjukkan kesediaan untuk berbagi dengan umat dan menyebarkan manfaat kepada mereka. Allah SWT telah berjanji untuk menggantikan dan melipatgandakan pahala bagi orang yang bersedekah dan mewakafkan harta mereka.</p>
							<p class="mb-4 mt-4">Waqaf juga memiliki dampak positif dalam memperkuat ikatan sosial dalam masyarakat. Ketika seseorang atau sebuah lembaga mewakafkan harta untuk kepentingan umum, hal ini mencerminkan semangat kepedulian dan solidaritas sosial. Waqaf menjadi sarana untuk membantu mereka yang membutuhkan dan memperbaiki kondisi masyarakat secara keseluruhan.</p>
				</div>

                <div class="container my-4 mx-4">
                    <p class="mb-4 mt-4">5. Mendapatkan Doa dan Pahala</p>
                    <p>
                        Mewakafkan harta atau aset untuk kepentingan umum juga mendapatkan doa dan pahala dari mereka yang diuntungkan oleh waqaf tersebut. Orang-orang yang mengambil manfaat dari waqaf tersebut akan mendoakan kebaikan bagi pemberi waqaf, serta memberikan pahala kepada mereka.</p>
                      
                </div>
				
        
          {{-- <div class="d-flex justify-content-center mt-5 mb-5 ">
            <button type="button" class="btn btn-primary my-3 mx-3 bg-danako-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Sedekah Sekarang
            </button> --}}
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>





@endsection


@push('after-script')

@endpush


