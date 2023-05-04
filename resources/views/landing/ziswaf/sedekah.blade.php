@extends('landing.layouts.app')

@section('title')
    Sedekah
@endsection



@section('content')

<br>

<div class="container">
    <div class="title">
		
        <img src="{{ asset('') }}danako/img/Expand_left.svg" />

        <span>Sedekah</span>
    </div>
  </div>

  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 form-bg">
			<div class="container">
				<p class="mb-4 mt-4">Sedekah merupakan kata yang sangat familiar di kalangan umat Islam. Sedekah diambil dari kata bahasa Arab yaitu “shadaqah”, berasal dari kata sidq (sidiq) yang berarti “kebenaran”. Menurut peraturan BAZNAS No.2 tahun 2016, sedekah adalah harta atau non harta yang dikeluarkan oleh seseorang atau badan usaha di luar zakat untuk kemaslahatan umum.</p>
				<p class="mb-4 mt-4">Sedekah merupakan amalan yang dicintai Allah SWT. Hal ini dibuktikan dengan banyaknya ayat Al-Qur’an yang menyebutkan tentang sedekah, salah satunya dalam surat Al-Baqarah ayat 271,</p>
				<p class="mb-4 mt-4">“Jika kamu menampakkan sedekah (mu), maka itu adalah baik sekali. Dan jika kamu menyembunyikannya dan kamu berikan kepada orang-orang fakir, maka menyembunyikan itu lebih baik bagimu. Dan Allah akan menghapuskan dari kamu sebagian kesalahan-kesalahanmu, dan Allah mengetahui apa yang kamu kerjakan” (QS. Al-Baqarah: 271).
				</p>
				
			</div>
			<a href="{{ url('') }}">
			<img src="{{ asset('') }}danako/img/ziswaf/sedekah.png" class="card-img-top" alt="...">
			</a>

		  <div class="container my-4 mx-4">
			<h5 >Keutamaan Sedekah</h5>
			<p class="mb-4 mt-4">1. Sedekah Tidak Mengurangi Harta</p>
			<p>
				“Sedekah adalah ibadah yang tidak akan mengurangi harta, sebagaimana Rasulullah SAW bersabda untuk mengingatkan kita dalam sebuah riwayat Muslim, “sedekah tidaklah mengurangi harta.” (HR. Muslim).  Mengapa sedekah tidak akan mengurangi harta? Karena meskipun secara tersurat harta terlihat berkurang, namun kekurangan tersebut akan ditutup dengan pahala di sisi Allah SWT dan akan terus bertambah kelipatannya menjadi lebih banyak. Hal ini merupakan janji Allah yang termaktub dalam surat Saba “Dan barang apa saja yang kamu nafkahkan, maka Allah akan menggantinya dan Dia-lah pemberi rezeki sebaik-baiknya.” (QS. Saba’: 39).</p>
				
			</div>

			<div class="container my-4 mx-4">
				<p class="mb-4 mt-4">2. Sedekah Menghapus Dosa</p>
				<p>
					Sebagai makhluk Allah SWT yang tak luput dari dosa, umat Islam senantiasa diberikan berbagai keistimewaan agar berkesempatan untuk bertaubat dan menghapus dosa-dosanya dengan cara yang yang diridhai oleh Nya. Salah satunya dengan sedekah.</p>
					<p class="mb-4 mt-4">2. Didoakan Malaikat</p>
					<p>
						Sedekah merupakan ibadah yang istimewa, ia dapat memudahkan kita dalam menghapus dosa-dosa. Rasulullah SAW pernah bersabda “Sedekah itu dapat menghapus dosa sebagaimana air itu memadamkan api. (HR. At-Tirmidzi).</p>
					
				</div>
			

				<div class="container my-4 mx-4">
					<p class="mb-4 mt-4">Sedekah Melipatgandakan Pahala</p>
					<p>
						Sedekah memberikan banyak keistimewaan kepada pelakunya, salah satu diantaranya adalah Allah SWT akan memberikan pahala yang banyak untuk orang yang bersedekah. Allah SWT berfiman,</p>
						<p class="mb-4 mt-4">2. Didoakan Malaikat</p>
						<p>
							“Sesungguhnya orang-orang yang bersedekah baik laki-laki maupun perempuan dan meminjamkan kepada Allah pinjaman yang baik, niscaya akan dilipat-gandakan (ganjarannya) kepada mereka; dan bagi mereka pahala yang banyak.” (Qs. Al Hadid: 18)</p>
							<p class="mb-4 mt-4">Itulah beberapa keistimewaan sedekah. Begitu banyak nikmat Allah dalam bersedekah, semoga kita termasuk ke dalam orang orang yang diringankan dalam melakukan ibadah istimewa ini. Aamiin.</p>
							<p>
								Mari salurkan sedekah anda melalui Danako dengan cara klik di bawah ini
						</p>
					</div>
				
        
          <div class="d-flex justify-content-center mt-5 mb-5 ">
            <button type="button" class="btn btn-primary my-3 mx-3 bg-danako-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Sedekah Sekarang
            </button>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>





@endsection


@push('after-script')
<script language="JavaScript" type="text/javascript">
	function formatDesimal (num) {
		return num
		   .toFixed() // always two decimal digits
		   .replace(".", ",") // replace decimal point character with ,
		   .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") // use . as a separator
	}
	function hitungNisabProfesi() {
		var beras = parseInt(document.formZakatProfesi.hargaBerasProfesi.value);
		var nilaiNisabProfesi = 83385000;
		document.formZakatProfesi.hasilNisabProfesi.value= formatDesimal(nilaiNisabProfesi);
	}
	function hitungZakatProfesi() {
		var pendapatan = parseInt(document.formZakatProfesi.inputPendapatanProfesi.value);
		var bonus = parseInt(document.formZakatProfesi.inputBonusProfesi.value);
		var pengeluaran = parseInt(document.formZakatProfesi.inputPengeluaranProfesi.value);
		//var nisab = parseInt(document.formZakatProfesi.hasilNisabProfesi.value);
		var nisab = 83385000;
		
		var a = pendapatan * 12;
		var b = bonus * 12;
		var c = pengeluaran * 12;
		
		var saldoProfesi = a + b - c;
		
		if (saldoProfesi < nisab){
			saldoProfesi = 0;
			document.formZakatProfesi.keteranganZakatProfesi.value= "Tidak Wajib Zakat";
		}else{
			document.formZakatProfesi.keteranganZakatProfesi.value= "Wajib Zakat";			
		}
		document.formZakatProfesi.zakatProfesiBulanan.value= formatDesimal(saldoProfesi);
		var nilaiZakat = 0.025 * (saldoProfesi/12);
			document.formZakatProfesi.zakatProfesiBulanan.value=formatDesimal(nilaiZakat);
			document.formZakatProfesi.zakatProfesiTahunan.value=formatDesimal(nilaiZakat*12);
	}
	function hitungNisabTabungan() {
		var beras = parseInt(document.formZakatTabungan.hargaEmasTabungan.value);
		var nilaiNisabTabungan = beras * 85;
		document.formZakatTabungan.hasilNisabTabungan.value= formatDesimal(nilaiNisabTabungan);
	}
	function hitungZakatTabungan() {
		var pendapatan = parseInt(document.formZakatTabungan.inputPendapatanTabungan.value);
		var bonus = parseInt(document.formZakatTabungan.inputTabunganLain.value);
		var nisab = parseInt(document.formZakatTabungan.hasilNisabTabungan.value);
		var saldoTabungan = pendapatan + bonus;
		if (saldoTabungan < nisab){
			saldoTabungan = 0;
			document.formZakatTabungan.keteranganZakatTabungan.value= "Tidak Wajib Zakat";
		}else{
			document.formZakatTabungan.keteranganZakatTabungan.value= "Wajib Zakat";			
		}
		document.formZakatTabungan.zakatTabunganBulanan.value= formatDesimal(saldoTabungan);
		var nilaiZakat = 0.025 * saldoTabungan;
			document.formZakatTabungan.zakatTabunganBulanan.value=formatDesimal(nilaiZakat);
		var bulat = nilaiZakat / 12;
			document.formZakatTabungan.zakatTabunganTahunan.value= formatDesimal(bulat);
	}
	
	function hitungNisabPerdagangan(){
		var emas=parseInt(document.formZakatPerdagangan.hargaEmasPerdagangan.value);
		var nilaiNisabDagang=emas*85;
		document.formZakatPerdagangan.hasilNisabPerdagangan.value=formatDesimal(nilaiNisabDagang);
	}
	
	function hitungZakatPerdagangan(){
		var modal = parseInt(document.formZakatPerdagangan.inputModalDagang.value);
		var laba = parseInt(document.formZakatPerdagangan.inputKeuntunganDagang.value);
		var piutangDagang = parseInt(document.formZakatPerdagangan.inputHutangDagang.value);
		var hutangDagang=parseInt(document.formZakatPerdagangan.inputHutangDagang.value);
		var rugi = parseInt(document.formZakatPerdagangan.inputRugiDagang.value);
		var nisabDagang = parseInt(document.formZakatPerdagangan.hasilNisabPerdagangan.value);
		var hartaDagang = modal + laba + piutangDagang - hutangDagang - rugi;
		if (hartaDagang < nisabDagang){
			hartaDagang = 0;
			document.formZakatPerdagangan.keteranganZakatPerdagangan.value= "Tidak Wajib Zakat";
		}else{
			document.formZakatPerdagangan.keteranganZakatPerdagangan.value= "Wajib Zakat";			
		}
		document.formZakatPerdagangan.zakatPerdaganganBulanan.value= formatDesimal(hartaDagang);
		var nilaiZakatDagang = 0.025 * hartaDagang;
			document.formZakatPerdagangan.zakatPerdaganganBulanan.value=formatDesimal(nilaiZakatDagang);
		var bulat = nilaiZakatDagang / 12;
			document.formZakatPerdagangan.zakatPerdaganganTahunan.value= formatDesimal(bulat);
	}
	
	function hitungNisabEmas(){
		var emas=parseInt(document.formZakatEmas.hargaEmas.value);
		var nilaiNisabEmas=emas*85;
		document.formZakatEmas.hasilNisabEmas.value=formatDesimal(nilaiNisabEmas);
	}
	
	function hitungZakatEmas(){
		var jumlahEmas = parseInt(document.formZakatEmas.inputJumlahEmas.value);
		var hargaEmas=parseInt(document.formZakatEmas.hargaEmas.value)
		if (jumlahEmas < 85){
			jumlahEmas = 0;
			document.formZakatEmas.keteranganZakatEmas.value= "Tidak Wajib Zakat";
		}else{
			document.formZakatEmas.keteranganZakatEmas.value= "Wajib Zakat";			
		}
		document.formZakatEmas.zakatEmasBulanan.value= formatDesimal(0.025*jumlahEmas*hargaEmas);
		var nilaiZakatEmas = 0.025 * (jumlahEmas*hargaEmas);
		var bulat = nilaiZakatEmas / 12;
			document.formZakatEmas.zakatEmasTahunan.value= formatDesimal(bulat);
	}
	
</script>


@endpush


