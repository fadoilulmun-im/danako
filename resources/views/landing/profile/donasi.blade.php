

@extends('landing.layouts.profile')

@section('title')
    Campaign
@endsection



@section('content')

<div class="p-5 bg-white rounded shadow mb-5">
    <h1>Riwayat Donasi</h1>
      <div class="card rounded py-3 px-3 mt-3">
          <div class="row">
            <div class="col-6 text-start text-success pt-2"><h3 class="card-title pb-1 pt-1">Donasi Untuk Campaign Gempa Cianjur Lorem</h3></div>
            <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Selesai</button></div>
          </div>
          <p class="card-text pt-2 pb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam sit amet, hen Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam sit amet, hen</p>
          <div class="row">
            <div class="col-6 text-start text-success pt-2">Donasi yang di Sumbangkan Rp 34.567.890</div>
            <div class="col-6 text-end pt-2">2022-02-30 11:46:30</div>
          </div>
      </div>   
      <div class="card rounded py-3 px-3 mt-3">
        <div class="row">
          <div class="col-6 text-start text-success pt-2"><h3 class="card-title pb-1 pt-1">Donasi Untuk Campaign Gempa Cianjur Lorem</h3></div>
          <div class="col-6 text-end pt-2"><button type="button" class="btn btn-outline-success btn-sm">Selesai</button></div>
        </div>
        <p class="card-text pt-2 pb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin arcu ligula, eget maximus sapien ultrices vel</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam sit amet, hen Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sem nulla, elementum in diam sit amet, hen</p>
        <div class="row">
          <div class="col-6 text-start text-success pt-2">Donasi yang di Sumbangkan Rp 34.567.890</div>
          <div class="col-6 text-end pt-2">2022-02-30 11:46:30</div>
        </div>
      </div>    
  </div>   

@endsection


@push('after-script')
<script>
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
  </script>
@endpush


