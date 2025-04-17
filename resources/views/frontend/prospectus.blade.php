@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Prospectus</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">Academics</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Prospectus</p>
      </div>
    </div>
  </div>
  <!-- Header End -->
   <!--about us-->
   <div class="container">
    <div class="row">
      <div class="col-10">
        <div class="text-center pb-2">
            <p class="section-title px-5">
              <span class="px-2"><span class="line-2"></span>Prospectus <span class="line-3"></span></span>
            </p>
          </div>
        <div class="container main-section ">
            <div class="row">
                 <div class="col-md-6">
                    <img src="{{ url('assets/apj.png') }}" class="img-fluid" alt="Kids and Teacher">
                </div>
                {{-- <div class="col-md-6">
                    <h4 class="card-title">ABOUT COLLEGE <span class="line"></span></h4>
                    <h5 id="section_title" class="section-title">"Best School For Your Kids"</h5>
                    <p>
                        Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est dolor.
                    </p>
                    <ul class="list-unstyled">
                        <li>✓ Labore eos amet dolor amet diam</li>
                        <li>✓ Etsea et sit dolor amet ipsum</li>
                        <li>✓ Diam dolor diam elitiripsum vero</li>
                    </ul>

                </div> --}}
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
