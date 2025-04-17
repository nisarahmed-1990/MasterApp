@extends('app')
@section('style')
<style>
    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: -250px; /* Hide sidebar initially */
        background-color: #343a40;
        transition: left 0.3s ease;
    }
    .sidebar.open {
        left: 0; /* Show sidebar */
    }
    .sidebar .nav-link {
        color: white;
    }
</style>
@endsection

@section('content')

    <!--Carousel Starts-->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($getRecords as $value)
                <div class="carousel-item active">
                    <img src="{{ asset('upload/carousel/'.$value->image_path) }}" class="d-block w-100" width="100%" height="450px">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      </div>
    <!--Hero Image End-->


{{-- Announcment --}}
    <div class="container-fluid announcement">
        <marquee behavior="" direction="left">
            <span style="color: red">NEW</span> &nbsp; Admission open for academic year 2025-26
        </marquee>
    </div>
{{-- Announcment Ends--}}

      <!--about us-->
      <div class="container">
        <div class="row">
          <div class="col-10" style="margin-top: 10px;">
            <div class="container main-section">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ url('assets/apj.png') }}" class="img-fluid" alt="Kids and Teacher">
                    </div>
                    <div class="col-md-6">
                        <h4 class="card-title">ABOUT US <span class="line"></span></h4>
                        <h5 id="section_title" class="section-title">"Best School For Your Kids"</h5>
                        <p>
                            Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est dolor.
                        </p>
                        <ul class="list-unstyled">
                            <li>✓ Labore eos amet dolor amet diam</li>
                            <li>✓ Etsea et sit dolor amet ipsum</li>
                            <li>✓ Diam dolor diam elitiripsum vero</li>
                        </ul>
                        <a href="{{ route('aboutCollege') }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
          </div>

          <div  class="col-2" style="margin-top: 40px;">
            {{-- sidebar --}}
            {{-- <div class="container" style="margin-left:100%">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Sidebar
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>

            </div> --}}
            {{-- sidebar end --}}

            {{-- Notification --}}
            @include('frontend._sidebar')
            {{-- Notification End --}}

          </div>

        </div>
      </div>

    <!--end of abouts us-->





<div class="container-fluid" >
    <div class="row">
        <div class="col-12" >
            <div class="container mt-5">
                <div class="row">
                    <h4 class="card-title text-center"><span class="line-2"></span>Facilities<span class="line-3"></span></h4>
                    <div class="col-md-4 mb-4">

                        <div class="card p-3">

                            <div class="card-body">
                                <h5 class="card-title">Play Ground</h5>
                                <p class="card-text">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <div class="card-body">
                                <h5 class="card-title">Placement Drive</h5>
                                <p class="card-text">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <div class="card-body">
                                <h5 class="card-title">Arts and Crafts</h5>
                                <p class="card-text">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <div class="card-body">
                                <h5 class="card-title">Safe Transportation</h5>
                                <p class="card-text">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <div class="card-body">
                                <h5 class="card-title">Multi Gym</h5>
                                <p class="card-text">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card p-3">
                            <div class="card-body">
                                <h5 class="card-title">Educational Tour</h5>
                                <p class="card-text">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
 <!-- Class Start -->
 <div class="container-fluid pt-5">
    <div class="container">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2"><span class="line-2"></span>Popular Classes<span class="line-3"></span></span>
        </p>
        <h3 class="mb-4">Courses Offered</h3>
      </div>
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
              {{-- <div class="row">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Tution Fee</strong>
                </div>
                <div class="col-6 py-1">$290 / Month</div>
              </div> --}}
            </div>
            <a href="{{ route('progOffered') }}" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card border-0 bg-light shadow-sm pb-2">
            <img class="card-img-top mb-2" src="{{ url('assets/course.jpg') }}" alt=""  style="height: 150; width:auto; object-fit:fill;"/>
            <div class="card-body text-center">
              <h4 class="card-title">Bachelor of Commerce</h4>
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
              {{-- <div class="row">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Tution Fee</strong>
                </div>
                <div class="col-6 py-1">$290 / Month</div>
              </div> --}}
            </div>
            <a href="{{ route('progOffered') }}" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card border-0 bg-light shadow-sm pb-2">
            <img class="card-img-top mb-2" src="{{ url('assets/course.jpg') }}" alt=""  style="height: 150; width:auto; object-fit:fill;"/>
            <div class="card-body text-center">
              <h4 class="card-title">Bachelor of Science</h4>
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
              {{-- <div class="row">
                <div class="col-6 py-1 text-right border-right">
                  <strong>Tution Fee</strong>
                </div>
                <div class="col-6 py-1">$290 / Month</div>
              </div> --}}
            </div>
            <a href="{{ route('progOffered') }}" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Class End -->

   <!-- Team Start -->
   <div class="container-fluid pt-5">
    <div class="container">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2"><span class="line-2"></span>Our Teachers <span class="line-3"></span></span>
        </p>
        <h3 class="mb-4">Meet Our Teachers</h3>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3 text-center team mb-5">
          <div
            class="position-relative overflow-hidden mb-4"
            style="border-radius: 100%"
          >
            <img class="img-fluid w-100" src="{{ url('assets/user.png') }}" alt="" />
            <div
              class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
            >
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-outline-light text-center px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <h4>Julia Smith</h4>
          <i>Music Teacher</i>
        </div>
        <div class="col-md-6 col-lg-3 text-center team mb-5">
          <div
            class="position-relative overflow-hidden mb-4"
            style="border-radius: 100%"
          >
            <img class="img-fluid w-100" src="{{ url('assets/user.png') }}" alt="" />
            <div
              class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
            >
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-outline-light text-center px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <h4>Jhon Doe</h4>
          <i>Language Teacher</i>
        </div>
        <div class="col-md-6 col-lg-3 text-center team mb-5">
          <div
            class="position-relative overflow-hidden mb-4"
            style="border-radius: 100%"
          >
            <img class="img-fluid w-100" src="{{ url('assets/user.png') }}" alt="" />
            <div
              class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
            >
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-outline-light text-center px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <h4>Mollie Ross</h4>
          <i>Dance Teacher</i>
        </div>
        <div class="col-md-6 col-lg-3 text-center team mb-5">
          <div
            class="position-relative overflow-hidden mb-4"
            style="border-radius: 100%"
          >
            <img class="img-fluid w-100" src="{{ url('assets/user.png') }}" alt="" />
            <div
              class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
            >
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                class="btn btn-outline-light text-center mr-2 px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-outline-light text-center px-0"
                style="width: 38px; height: 38px"
                href="#"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <h4>Donald John</h4>
          <i>Art Teacher</i>
        </div>
      </div>
    </div>
  </div>
  <!-- Team End -->

 @endsection
