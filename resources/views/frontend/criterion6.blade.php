@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Criterion 6</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">NAAC</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Criterion 6</p>
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
              <span class="px-2"><span class="line-2"></span>Criterion 6 <span class="line-3"></span></span>
            </p>
            <h3>Governance, Leadership and Management</h3>
          </div>
        <div class="container main-section ">

            <div class="row">
                <table class="table table-striped table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Key Indicator Details</th>
                        <th scope="col">Metric</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                     </tbody>
                  </table>
                 {{-- <div class="col-md-6">
                    <img src="{{ url('assets/apj.png') }}" class="img-fluid" alt="Kids and Teacher">
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
