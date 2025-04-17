@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Program / Course Outcomes</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">Academics</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Program-Course Outcomes</p>
      </div>
    </div>
  </div>
  <!-- Header End -->
   <!--about us-->
   <div class="container">
    <div class="row">
      <div class="col-10">
        <div class="container main-section ">
            <div class="row">
                {{-- <div class="col-md-6">
                    <img src="{{ url('assets/apj.png') }}" class="img-fluid" alt="Kids and Teacher">
                </div> --}}
                <div class="col-md-6">
                    <h4 class="card-title">Page Underconstruction<span class="line"></span></h4>


                </div>
            </div>
        </div>
      </div>

      <div  class="col-2" style="margin-top: 40px;">
        {{-- Notification --}}
        @include('frontend._sidebar')
        {{-- Notification End --}}

      </div>

    </div>
  </div>

<!--end of abouts us-->
@endsection
