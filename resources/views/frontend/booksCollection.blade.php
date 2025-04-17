@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Books Collection</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">Library</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Books Collection/p>
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
              <span class="px-2"><span class="line-2"></span>Books Collection<span class="line-3"></span></span>
            </p>
          </div>
        <div class="container main-section ">
            <div class="row">
                <table class="table table-striped table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subject</th>
                        <th scope="col">No.'s of Books Available</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($getRecords as $value)
                        <tr>
                            <th scope="row">{{ $value->id }}</th>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->nobooks }}</td>
                        </tr>
                        @endforeach
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
