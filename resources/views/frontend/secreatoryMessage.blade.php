@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Secreatory Message</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">About Us</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Secreatory Message</p>
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
                <div class="col-md-6">
                    @foreach ($getRecords as $value)
                    <div>
                        <img src="{{ asset('upload/secreatoryImage/'.$value->image_path) }}" class="d-block w-100" id="image1">
                    </div>
                @endforeach
                </div>
                <div class="col-md-6">
                    <h4 class="card-title">Secreatory Message <span class="line"></span></h4>
                    <h5 id="section_title" class="section-title">“Success comes from doing small efforts every day.”</h5>
                    <p>
                        {!! $value->description!!}
                    </p>


                </div>
            </div>
        </div>
      </div>

      <div  class="col-2" style="margin-top: 40px;">
        @include('frontend._sidebar')
        {{-- Notification End --}}

      </div>

    </div>
  </div>

<!--end of abouts us-->
@endsection
