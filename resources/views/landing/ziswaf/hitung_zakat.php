<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">KALKULATOR ZAKAT LMI</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="container pt-3"><div id="myAlert"></div></div>
      <div class="modal-body">
        <section class="pt-3">
          <div class="container">
            <div class="row justify-content-center align-items-center">
              <div class="col-lg-12 form-bg">
                <h2 class="text-center mt-5">KALKULATOR ZAKAT LMI</h1>
                <div class="container">
                  <!-- HTML -->
                  
                </div>
                  <div class="row pt-2">
                      <div class="col-md-1"></div>
                      <div class="col-lg-10">
                        <form name="formZakatProfesi">
                          <div class="row justify-content-center">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">Pendapatan / Gaji per Bulan</p>
                                <input type="text" class="form-control" name="inputPendapatanProfesi" onchange="hitungZakatProfesi()" value="0">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Bonus/pendapatan lain per bulan</p>
                                  <input type="text" class="form-control" name="inputBonusProfesi" onchange="hitungZakatProfesi()" value="0" size="12">
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Pengeluaran kebutuhan pokok per bulan</p>
                                  <input type="text" class="form-control" name="inputPengeluaranProfesi" onchange="hitungZakatProfesi()" value="0" size="12">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Besarnya Nisab ( 85gram Emas )</p>
                                  <input class="form-control" type="text" name="hasilNisabProfesi" value="83.385.000" size="12" readonly="readonly">
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Wajib Membayar Zakat?</p>
                                  <input  class="form-control" type="text" name="keteranganZakatProfesi" value="-" size="12">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Zakat profesi jika dibayarkan per tahun</p>
                                  <input class="form-control" type="text" name="zakatProfesiTahunan" value="0" size="12" readonly="readonly">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Zakat profesi jika dibayarkan per bulan</p>
                                <input  class="form-control" type="text" name="zakatProfesiBulanan" value="0" size="12" readonly="readonly">
                              </div>
                            </div>
                          </div>
                           <div class="d-flex justify-content-center pt-4 pb-5">
                           
                          </div> 
                        </form>
                        
                        
                      
                      </div>
                  <div class="col-md-1"></div>
                  </div>
                </h1>
              </div>
            </div>
          </div>
        </section>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="/bayar" class="btn btn-primary btn-lg me-5 bg-danako-primary bt-zakat">Bayar Zakat</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">KALKULATOR ZAKAT DanakoTabungan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="container pt-3"><div id="myAlert"></div></div>
      <div class="modal-body">
        <section class="pt-3">
          <div class="container">
            <div class="row justify-content-center align-items-center">
              <div class="col-lg-12 form-bg">
                <h2 class="text-center mt-5">KALKULATOR ZAKAT LMI</h1>
                <div class="container">
                  <!-- HTML -->
                  
                </div>
                  <div class="row pt-2">
                      <div class="col-md-1"></div>
                      <div class="col-lg-10">
                        <form name="formZakatTabungan" id="formZakatTabungan">
                          <div class="row justify-content-center">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">Pendapatan / Gaji per Bulan</p>
                                <input type="text" class="form-control" name="inputPendapatanTabungan" onchange="hitungZakatTabungan()" value="0" size="12">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Bonus/pendapatan lain per bulan</p>
                                  <input type="text" class="form-control" name="inputTabunganLain" onchange="hitungZakatTabungan()" value="0" size="12">
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Besarnya Nisab ( 85gram Emas )</p>
                                  <input class="form-control" type="text" name="hasilNisabTabungan" value="83.385.000" size="12" readonly="readonly">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Wajib Membayar Zakat?</p>
                                  <input class="form-control" type="text" name="keteranganZakatTabungan" value="-" size="12">
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Zakat profesi jika dibayarkan per tahun</p>
                                  <input class="form-control" type="text" name="zakatTabunganBulanan" value="0" size="12" readonly="readonly">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Zakat profesi jika dibayarkan per bulan</p>
                                  <input class="form-control" type="text" name="zakatTabunganTahunan" value="0" size="12" readonly="readonly">
                              </div>
                            </div>
                          </div>
                           <div class="d-flex justify-content-center pt-4 pb-5">
                          
                          </div> 
                        </form>
                        
                      
                      </div>
                  <div class="col-md-1"></div>
                  </div>
                </h1>
              </div>
            </div>
          </div>
        </section>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="/bayar" class="btn btn-primary btn-lg me-5 bg-danako-primary bt-zakat">Bayar Zakat</a>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">KALKULATOR ZAKAT DanakoTabungan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="container pt-3"><div id="myAlert"></div></div>
      <div class="modal-body">
        <section class="pt-3">
          <div class="container">
            <div class="row justify-content-center align-items-center">
              <div class="col-lg-12 form-bg">
                <h2 class="text-center mt-5">KALKULATOR ZAKAT LMI</h1>
                <div class="row pt-2">
                      <div class="col-md-1"></div>
                      <div class="col-lg-10">
                      <form action="" method="post" name="formZakatPerdagangan" id="formZakatPerdagangan">
                          <div class="row justify-content-center">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">Modal yang Diputar Selama 1 Tahun</p>
                                <input type="text"  class="form-control" name="inputModalDagang" onchange="hitungZakatPerdagangan()" value="0" size="12">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                Keuntungan Bersih Selama 1 Tahun</p>
                                  <input type="text" class="form-control" name="inputKeuntunganDagang" onchange="hitungZakatPerdagangan()" value="0" size="12">
                              </div>
                            </div>
                          </div>
                          
                          <div class="row justify-content-center">
                              <div class="col-md-6">
                                  <div class="mb-3">
                                    <p class="text-center mb-3 mt-3">
                                    Piutang Dagang</p>
                                    <input type="text" class="form-control" name="inputPiutangDagang" onchange="hitungZakatPerdagangan()" value="0" size="12">
                                  </div>
                                </div>
                             
                              <div class="col-md-6">
                                  <div class="mb-3">
                                    <p class="text-center mb-3 mt-3">
                                    Hutang Jatuh Tempo</p>
                                    <input type="text" class="form-control" name="inputHutangDagang" onchange="hitungZakatPerdagangan()" value="0" size="12">
                                  </div>
                                </div>
                          </div>

                          <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="mb-3">
                                  <p class="text-center mb-3 mt-3">
                                  Kerugian Selama 1 Tahun</p>
                                  <input type="text" class="form-control" name="inputRugiDagang" onchange="hitungZakatPerdagangan()" value="0" size="12">
                                </div>
                              </div>
                            </div>
                           
                          </div>


                          <div class="row justify-content-center">
                              <div class="col-md-6">
                                <div class="mb-3">
                                  <p class="text-center mb-3 mt-3">
                                    Besarnya Nisab ( 85gram Emas )</p>
                                    <input class="form-control" type="text" name="hasilNisabPerdagangan" value="83.385.000" size="12" readonly="readonly">
                                </div>
                              </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Wajib Membayar Zakat?</p>
                                  <input class="form-control" type="text" name="keteranganZakatPerdagangan" value="-" size="12">
                              </div>
                            </div>
                          </div>
                        
                          
                          <div class="row justify-content-center">  
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                Zakat perdagangan jika dibayarkan per tahun</p>
                                  <input class="form-control" type="text" name="zakatPerdaganganBulanan" value="0" size="12" readonly="readonly">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                Zakat perdagangan jika dibayarkan per bulan</p>
                                  <input class="form-control" type="text" name="zakatPerdaganganTahunan" value="0" size="12" readonly="readonly">
                              </div>
                            </div>
                          </div>

                           <div class="d-flex justify-content-center pt-4 pb-5">
                           
                          </div> 
                        </form>
                        
                      
                      </div>
                  <div class="col-md-1"></div>
                 
           
              </div>
            </div>
          </div>
        </section>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="/bayar" class="btn btn-primary btn-lg me-5 bg-danako-primary bt-zakat">Bayar Zakat</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">KALKULATOR ZAKAT DanakoEmas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="container pt-3"><div id="myAlert"></div></div>
      <div class="modal-body">
        <section class="pt-3">
          <div class="container">
            <div class="row justify-content-center align-items-center">
              <div class="col-lg-12 form-bg">
                <h2 class="text-center mt-5">KALKULATOR ZAKAT DanakoEmas</h1>
                <div class="container">
                  <!-- HTML -->
                  
                </div>
                  <div class="row pt-2">
                      <div class="col-md-1"></div>
                      <div class="col-lg-10">
                      <form action="" method="post" name="formZakatEmas" id="formZakatEmas">
                          <div class="row justify-content-center">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Jumlah Emas yang Dimiliki dalam Gram</p>
                                  <input type="text" name="inputJumlahEmas" onchange="hitungZakatEmas()" value="0" size="12">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                Harga Emas saat ini per gram</p>
                                <input type="text" name="hargaEmas" onchange="hitungNisabEmas()" value="981.000" size="12">
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                           
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Besarnya Nisab ( 85gram Emas )</p>
                                  <input class="hasilHitung" type="text" name="hasilNisabEmas" value="83.385.000" size="12" readonly="readonly">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Wajib Membayar Zakat?</p>
                                  <input class="hasilHitung" type="text" name="keteranganZakatEmas" value="-" size="12">
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                          
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Zakat profesi jika dibayarkan per tahun</p>
                                  <input class="hasilHitung" type="text" name="zakatEmasBulanan" value="0" size="12" readonly="readonly">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-3">
                                <p class="text-center mb-3 mt-3">
                                  Zakat profesi jika dibayarkan per bulan</p>
                                  <input class="hasilHitung" type="text" name="zakatEmasTahunan" value="0" size="12" readonly="readonly">
                              </div>
                            </div>
                          </div>
                           <div class="d-flex justify-content-center pt-4 pb-5">
                           
                          </div> 
                        </form>
                        
                      
                      </div>
                  <div class="col-md-1"></div>
                  </div>
                </h1>
              </div>
            </div>
          </div>
        </section>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="/bayar" class="btn btn-primary btn-lg me-5 bg-danako-primary bt-zakat">Bayar Zakat</a>
      </div>
    </div>
  </div>
</div>







