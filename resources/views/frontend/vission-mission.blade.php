@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Vission & Mission</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">About Us</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Vission & Mission</p>
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
                    <p style="font-size:20px; color:#4B49B6;">Vission<span class="line-4"></p>
                    <p>"To educate and elevate the rural poor”</p>
                </div>
                <div class="col-md-6">
                    <p style="font-size:20px; color:#4B49B6;">Mission<span class="line-4"></p>
                    <p>"To propagate quality education for rural people that instills a deep concern for the society and service to humanity"</p>

                </div>

                    <p style="font-size:20px; color:#4B49B6;">Objectives<span class="line-4"></p>
                    <p>
                        1. To create a sense of social responsibility amongst students and create the potential to tackle socio-economic problems of community
                        in which we live.

                        <br> 2. To create persons not only physically strong but also mentally and spiritually.

                        <br> 3. To provide opportunities to rural women, SC/ST and other backward class to develop themselves.

                        <br> 4. To create Scientific Outlook and Competitive spirit.

                        <br> 5. To generate Self-Employment Opportunities.
                    </p>
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
