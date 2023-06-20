@extends('landing.layouts.app')

@section('title')
    Infaq
@endsection



@section('content')

<br>

<div class="container pt-5">
    <div class="title">
        <span>Infaq</span>
    </div>
  </div>

  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 form-bg">
			<a href="{{ url('bayar') }}">
			<img src="{{ asset('') }}danako/img/ziswaf/infaq.png" class="card-img-top" alt="...">
			</a>
          <div class="container">
            <p class="mb-4 mt-4">infak adalah harta yang dikeluarkan oleh seseorang atau badan usaha di luar zakat untuk kemaslahatan umum (Menurut Undang-Undang Nomor 23 Tahun 2011 tentang Pengelolaan Zakat pada BAB I Pasal 1). infak merupakan amalan yang tak bisa lepas dari kehidupan sehari-hari seorang Muslim. infak berasal dari Bahasa Arab, "anfaqa" yang berarti membelanjakan harta atau memberikan harta. Sedangkan infak berarti keluarkanlah harta.</p>
			<p class="mb-4 mt-4">Sejatinya infak dibagi menjadi dua, ada infak untuk kebaikan, dan infak untuk keburukan. infak kebaikan ini dilakukan atau dibelanjakan untuk di jalan Allah, yang juga dengan harta berasal dari hal baik.</p>
			<p class="mb-4 mt-4">Sedangkan infak keburukan contohnya, dijelaskan dalam Surat Al-Anfal Ayat 36, yang artinya sebegai berikut: "Sesungguhnya orang-orang yang kafir menafkahkan harta mereka untuk menghalangi (orang) dari jalan Allah. Mereka akan menafkahkan harta itu, kemudian menjadi sesalan bagi mereka, dan mereka akan dikalahkan. Dan ke dalam Jahannamlah orang-orang yang kafir itu dikumpulkan" (QS. Al-Anfal : 36).</p>
			<p class="mb-4 mt-4">Allah Subhanahu Wata’ala memerintahkan setiap hambanya agar menyisihkan hartanya untuk berinfak yang hal ini masuk dalam kebaikan, dan Allah mencintai hambanya yang berbuat baik. Hal ini dijelaskan dalam Surat Ali Imran ayat 133-134.</p>
			<p class="mb-4 mt-4">“Dan bersegeralah kamu kepada keampunan Tuhanmu dan kepada surga yang luasnya seluas langit dan bumi yang disediakan untuk orang-orang yang takwa. Yaitu orang-orang yang menginfakkan (hartanya) baik di waktu senang atau di waktu susah, dan orang-orang yang menahan kemarahannya dan memaafkan kesalahan orang. Allah mencintai orang-orang yang berbuat kebaikan”. (QS. Ali Imran: 133-134).</p>
			<p class="mb-4 mt-4">infak ternyata memiliki perbedaan dari sedekah, infak sebenarnya dilakukan dengan harta atau material, sedangkan sedekah, bisa dilakukan dengan non-harta atau non-material. Misalnya saja sedekah bisa dilakukan dengan senyuman, “Senyummu terhadap wajah saudaramu adalah sedekah.” (HR. Tirmidzi).</p>
		</div>
		  <div class="container my-4 mx-4">
			<h5 >Keutamaan Berinfak</h5>
			<p class="mb-4 mt-4">1. Memperoleh Pahala yang Besar</p>
			<p>
				“Berimanlah kamu kepada Allah dan Rasul-Nya dan infakkanlah sebahagian dari hartamu yang Allah menjadikan kamu menguasainya. Maka orang-orang yang beriman di antara kamu dan menginfakkan (sebahagian) dari hartanya memperolehi pahala yang besar”. (QS. Al-Hadid: 7).</p>
				<p class="mb-4 mt-4">2. Didoakan Malaikat</p>
				<p>
					“Ketika hamba berada di setiap pagi, ada dua malaikat yang turun dan berdoa, “Ya Allah berikanlah ganti pada yang gemar berinfak (rajin memberi nafkah pada keluarga).” Malaikat yang lain berdoa, “Ya Allah, berikanlah kebangkrutan bagi yang enggan bersedekah (memberi nafkah).” (HR. Bukhari).</p>
					<p class="mb-4 mt-4">3. Allah Ganti Harta yang Diinfakkan</p>
					<p>
						"Katakanlah: 'Sesungguhnya Tuhanku melapangkan rezeki bagi siapa yang dikehendaki-Nya di antara hamba-hamba-Nya dan menyempitkan bagi (siapa yang dikehendaki-Nya)'. Dan barang apa saja yang kamu nafkahkan (belanjakan), maka Allah akan menggantinya dan Dialah Pemberi rezeki yang sebaik-baiknya. (QS. Saba: 39).

</p>
			</div>
        
          <div class="d-flex justify-content-center mt-5 mb-5 ">
            <a href="{{ url('bayar') }}" class="btn btn-primary my-3 mx-3 bg-danako-primary border-0" >
              Infaq Sekarang
			</a>
           
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


