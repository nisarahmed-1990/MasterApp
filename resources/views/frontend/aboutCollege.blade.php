@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">About College</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">About Us</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">About College</p>
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
                @foreach ($getRecords as $value)
                    <div>
                        <img src="{{ asset('upload/aboutCollege/'.$value->image_path) }}" class="d-block w-100" id="image1">
                    </div>
                @endforeach
                <div class="col-md-12">
                    <h4 class="card-title">ABOUT COLLEGE <span class="line"></span></h4>
                    <h5 id="section_title" class="section-title">"Best School For Your Kids"</h5>
                    <p>
                        {!! $value->description !!}
                    </p>
                </div>
            </div>
        </div>
      </div>

      <div  class="col-2" style="margin-top: 40px;">
        @include('frontend._sidebar')
      </div>

    </div>
  </div>

<!--end of abouts us-->
@endsection
