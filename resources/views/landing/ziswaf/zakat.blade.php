@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')

<br>

<div class="container pt-5">
    <div class="title">
       
        <span>Zakat</span>
    </div>
  </div>

  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 form-bg">
          <h2 class="col-md-12 text-center mt-5">Kalkulator Danako Zakat</h1>
          <div class="container">
            <p class="mb-4 mt-4">Kalkulator zakat adalah layanan untuk mempermudah perhitungan jumlah zakat yang harus ditunaikan oleh setiap umat muslim sesuai ketetapan syariah. Oleh karena itu, bagi Anda yang ingin mengetahui berapa jumlah zakat yang harus ditunaikan, silahkan gunakan fasilitas Kalkulator Zakat BAZNAS dibawah ini.</p>
          </div>
		  <div class="container my-4 mx-4">
			<h6 class="text-center">Zakat penghasilan atau yang dikenal juga sebagai zakat profesi adalah bagian dari zakat maal yang wajib dikeluarkan atas harta yang berasal dari pendapatan / penghasilan rutin dari pekerjaan yang tidak melanggar syariah. Nishab zakat penghasilan sebesar 85 gram emas per tahun. Kadar zakat penghasilan senilai 2,5%. Dalam praktiknya, zakat penghasilan dapat ditunaikan setiap bulan dengan nilai nishab per bulannya adalah setara dengan nilai seperduabelas dari 85 gram emas, dengan kadar 2,5%. Jadi apabila penghasilan setiap bulan telah melebihi nilai nishab bulanan, maka wajib dikeluarkan zakatnya sebesar 2,5% dari penghasilannya tersebut. (Sumber: Al Qur'an Surah Al Baqarah ayat 267, Peraturan Menteri Agama Nomer 31 Tahun 2019, Fatwa MUI Nomer 3 Tahun 2003, dan pendapat Shaikh Yusuf Qardawi).</h6>
			<h6 class="text-center">Zakat maal yang dimaksud dalam perhitungan ini adalah zakat yang dikenakan atas uang, emas, surat berharga, dan aset yang disewakan. Tidak termasuk harta pertanian, pertambangan, dan lain-lain yang diatur dalam UU No.23/2011 tentang pengelolaan zakat. Zakat maal harus sudah mencapai nishab (batas minimum) dan terbebas dari hutang serta kepemilikan telah mencapai 1 tahun (haul). Nishab zakat maal sebesar 85 gram emas. Kadar zakatnya senilai 2,5%. (Sumber: Al Qur'an Surah Al Baqarah ayat 267, Peraturan Menteri Agama Nomer 31 Tahun 2019, Fatwa MUI Nomer 3 Tahun 2003, dan pendapat Shaikh Yusuf Qardawi)..
			  Standar harga emas yg digunakan untuk 1 gram nya adalah Rp938.099,-. Sementara nishab yang digunakan adalah sebesar 85 gram emas.</h6>
		  </div>
        
          <div class="d-flex justify-content-center mt-5 mb-5 ">
            <button type="button" class="btn btn-primary my-3 mx-3 bg-danako-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Zakat Profesi
            </button>
            <button type="button" class="btn btn-primary my-3 mx-3 bg-danako-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal2">
              Zakat Tabungan
            </button>
            <button type="button" class="btn btn-primary my-3 mx-3 bg-danako-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal3">
              Zakat Perdangagan
            </button>
            <button type="button" class="btn btn-primary my-3 mx-3 bg-danako-primary border-0" data-bs-toggle="modal" data-bs-target="#exampleModal4">
              Zakat Emas
            </button>

			<div class="text-center">
				<a href="{{ url('') }}"></a>
			</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>


@include('landing.ziswaf.hitung_zakat')


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


