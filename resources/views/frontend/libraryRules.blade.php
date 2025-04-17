@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Library Rules</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">Library</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Library Rules</p>
      </div>
    </div>
  </div>
  <!-- Header End -->
   <!--about us-->
   <div class="container">
    <div class="row">
        <div class="text-center pb-2">
            <p class="section-title px-5">
              <span class="px-2"><span class="line-2"></span>Library Rules<span class="line-3"></span></span>
            </p>
          </div>
      <div class="col-10">
        <div class="container main-section ">
            <div class="row">
                @foreach ($getRecords as $value)
                    <div>
                        {{-- <img src="{{ asset('upload/aboutCollege/'.$value->image_path) }}" class="d-block w-100" id="image1"> --}}
                    </div>
                @endforeach
                <div class="col-md-12">
                    <h4 class="card-title">{!! $value->title !!} <span class="line"></span></h4>
                        <p style="text-align:justify; margin-top:10px;">
                            {!! $value->description !!}
                        </p>
                </div>
                <p style="text-align:justify">

                <div class="col-md-12">
                     </div>
                <div class="col-md-12"><br>

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
