@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">About IQAC</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">IQAC</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">About IQAC</p>
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
              <span class="px-2"><span class="line-2"></span>About IQAC<span class="line-3"></span></span>
            </p>
          </div>
        <div class="container main-section ">
            <div class="row">
                {{-- <div class="col-md-6">
                    <img src="{{ url('assets/apj.png') }}" class="img-fluid" alt="Kids and Teacher">
                </div> --}}
                <div class="col-md-12">
                    <h4 class="card-title">About IQAC  <span class="line"></span></h4>
                        <p style="text-align:justify; margin-top:10px;">
                        I am greatly rejoiced and proudly place on record the fact that Your College Name Arts,Science, Commerce College your city name, Dist Gadag, State Karnataka, is the visionary dream of its founder Late Sri Sanganagouda Patil humble servant of education whose little mission, a many decade ago to transform a small college into a big one, has unfolded into an institution of glorious past and great future.

                        In order to accomplish our vision and mission, we are prepared to take as much effort as possible
                        for the betterment of academic scenario in India. We believe that education is an effective medium of social transformation.
                        We get encouragement, looking at bright and successful career of our thousands of students, which subsequently benefit the society.
                        We feel proud that we are part of such an excellent institute, which is shaping modern India.
                    </p>
                </div>
                <p style="text-align:justify"> Your College Name Arts,Science, Commerce College endowed with progressive futuristic outlook, which aims at continual growth in the quality of all academic activities with the sense of commitment to fully meet the expectations of the students, parents and society at large.

                    Our college cares for the individual development of each and every student. We follow “Mentor System”
                    under which each class is put into the multipronged web of a teacher. We accord prime importance to the behavioral discipline,
                    moral integrity and cognitive developments of our students. Departments of Youth Welfare, NSS, Physical Education, Career Guidance Cell,
                    Readers Forum, Red Cross Society, Red Ribbon Club and Centre for Women Empowerment cell offer integrated services for the multi –faceted
                    developments of our students. Our teachers strive to teach not only academic programme but also life skills that are needed for student’s
                    self development with highly resourceful faculty.
                    In order to make our students academically strong with inspiring vision of goal setting future.</p>
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
