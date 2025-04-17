@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">PG Syllabus</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">Academics</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">PG Syllabus</p>
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
              <span class="px-2"><span class="line-2"></span>PG Syllabus<span class="line-3"></span></span>
            </p>
          </div>
        <div class="container main-section ">
            <div class="row">
                <table class="table table-striped table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Filename</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($getRecords as $pdf)
                        <tr>
                            <th scope="row">{{ $pdf->id }}</th>
                            <td>{{ $pdf->title }} <td>
                                <a class="btn btn-primary btn-sm" href="{{ asset('storage/pdfs/' . $pdf->title) }}" target="_blank">view</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>


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
