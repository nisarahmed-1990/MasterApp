@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Program / Course Offered</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">Academics</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Program-Course Offered</p>
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
              <span class="px-2"><span class="line-2"></span>Program / Course Offered <span class="line-3"></span></span>
            </p>
          </div>
          <div class="container-fluid pt-5">
            <div class="container">
                <h4 class="card-title">Under Graduation (UG)</h4>
                <div class="row">
                <div class="col-lg-4 mb-5">
                   <div class="card border-0 bg-light shadow-sm pb-2">
                    <img class="card-img-top mb-2" src="{{ url('assets/course.jpg') }}" alt=""  style="height: 150; width:auto; object-fit:fill;"/>
                    <div class="card-body text-center">
                      <h4 class="card-title">Bachelor of Arts</h4>
                      <p class="card-text">
                        Justo ea diam stet diam ipsum no sit, ipsum vero et et diam
                        ipsum duo et no et, ipsum ipsum erat duo amet clita duo
                      </p>
                    </div>
                    <div class="card-footer bg-transparent py-4 px-5">
                      <div class="row border-bottom">
                        <div class="col-6 py-1 text-right border-right">
                          <strong>Duration</strong>
                        </div>
                        <div class="col-6 py-1">3 Years</div>
                      </div>
                      <div class="row border-bottom">
                        <div class="col-6 py-1 text-right border-right">
                          <strong>Qualification</strong>
                        </div>
                        <div class="col-6 py-1">P.U.C</div>
                      </div>
                      <div class="row border-bottom">
                        <div class="col-6 py-1 text-right border-right">
                          <strong>College Time</strong>
                        </div>
                        <div class="col-6 py-1">09:00 - 03:00</div>
                      </div>

                    </div>
                    {{-- <a href="" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a> --}}
                  </div>

                </div>
                {{-- one course code End --}}

                {{-- one course code start --}}
                <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                     <img class="card-img-top mb-2" src="{{ url('assets/course.jpg') }}" alt=""  style="height: 150; width:auto; object-fit:fill;"/>
                     <div class="card-body text-center">
                       <h4 class="card-title">Bachelor of Arts</h4>
                       <p class="card-text">
                         Justo ea diam stet diam ipsum no sit, ipsum vero et et diam
                         ipsum duo et no et, ipsum ipsum erat duo amet clita duo
                       </p>
                     </div>
                     <div class="card-footer bg-transparent py-4 px-5">
                       <div class="row border-bottom">
                         <div class="col-6 py-1 text-right border-right">
                           <strong>Duration</strong>
                         </div>
                         <div class="col-6 py-1">3 Years</div>
                       </div>
                       <div class="row border-bottom">
                         <div class="col-6 py-1 text-right border-right">
                           <strong>Qualification</strong>
                         </div>
                         <div class="col-6 py-1">P.U.C</div>
                       </div>
                       <div class="row border-bottom">
                         <div class="col-6 py-1 text-right border-right">
                           <strong>College Time</strong>
                         </div>
                         <div class="col-6 py-1">09:00 - 03:00</div>
                       </div>

                     </div>
                     {{-- <a href="" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a> --}}
                   </div>

                 </div>
                 {{-- one course code End --}}

                 {{-- one course code start --}}
                 <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                     <img class="card-img-top mb-2" src="{{ url('assets/course.jpg') }}" alt=""  style="height: 150; width:auto; object-fit:fill;"/>
                     <div class="card-body text-center">
                       <h4 class="card-title">Bachelor of Arts</h4>
                       <p class="card-text">
                         Justo ea diam stet diam ipsum no sit, ipsum vero et et diam
                         ipsum duo et no et, ipsum ipsum erat duo amet clita duo
                       </p>
                     </div>
                     <div class="card-footer bg-transparent py-4 px-5">
                       <div class="row border-bottom">
                         <div class="col-6 py-1 text-right border-right">
                           <strong>Duration</strong>
                         </div>
                         <div class="col-6 py-1">3 Years</div>
                       </div>
                       <div class="row border-bottom">
                         <div class="col-6 py-1 text-right border-right">
                           <strong>Qualification</strong>
                         </div>
                         <div class="col-6 py-1">P.U.C</div>
                       </div>
                       <div class="row border-bottom">
                         <div class="col-6 py-1 text-right border-right">
                           <strong>College Time</strong>
                         </div>
                         <div class="col-6 py-1">09:00 - 03:00</div>
                       </div>

                     </div>
                     {{-- <a href="" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a> --}}
                   </div>

                 </div>
                 {{-- one course code End --}}
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
