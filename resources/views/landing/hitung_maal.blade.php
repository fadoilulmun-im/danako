@extends('landing.layouts.app')

@section('title')
    Dashboard
@endsection



@section('content')


<div class="container">
    <div class="title">
        <img src="{{ asset('') }}danako/img/Expand_left.svg" />
        <span>Zakat</span>
    </div>
  </div>

  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-12 form-bg">
          <h2 class="text-center mt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
          <div class="container">
            <p class="text-center mb-3 mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
            <div class="row pt-2">
                <div class="col-md-1"></div>
                <div class="col-lg-10">
                    <form>
                        <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="input1" class="form-label">Input 1</label>
                            <input type="text" class="form-control" id="input1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="input2" class="form-label">Input 2</label>
                            <input type="text" class="form-control" id="input2">
                            </div>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="input3" class="form-label">Input 3</label>
                            <input type="text" class="form-control" id="input3">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="input4" class="form-label">Input 4</label>
                            <input type="text" class="form-control" id="input4">
                            </div>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="input5" class="form-label">Input 5</label>
                            <input type="text" class="form-control" id="input5">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="input6" class="form-label">Input 6</label>
                            <input type="text" class="form-control" id="input6">
                            </div>
                        </div>
                        </div>
                        <div class="d-flex justify-content-center pt-4 pb-5">
                        <button type="button" class="btn btn-primary btn-lg me-5 bg-danako-primary bt-zakat ">Bayar Zakat</button>
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

@endsection


@push('after-script')




<script>

  </script>
@endpush


