@extends('landing.layouts.app')

@section('title', 'Verifikasi Email')

@section('content')

  <section class="email-confirm">
    <div class="card">
      @if ($status == 'ok')
        <img src="{{ asset('') }}danako/img/sukses.png" alt="Image"  class="pt-3"/>
        <h2 class="title">Berhasil Verifikasi Email</h1>
        <p>{{ $message }}</p>
      @else
        <img src="{{ asset('') }}danako/img/gagal.png" alt="Image" class="img-fluid pt-3"/>
        <h2 class="title text-danger">Gagal Verifikasi Email</h1>
        <p>{{ $message }}</p>
      @endif
    </div>
  </section>

@endsection


