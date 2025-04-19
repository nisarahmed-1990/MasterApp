@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">About NAAC</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">NAAC</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">About NAAC</p>
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
              <span class="px-2"><span class="line-2"></span>About NAAC<span class="line-3"></span></span>
            </p>
          </div>
        <div class="container main-section ">
            <div class="row">
                {{-- @foreach ($getRecords as $value) --}}
                {{-- <div>
                    <img src="{{ asset('upload/aboutCollege/'.$value->image_path) }}" class="d-block w-100" id="image1">
                </div> --}}
                 {{-- @endforeach --}}
                <div class="col-md-12">
                    <h4 class="card-title">About NAAC <span class="line"></span></h4>
                    {{-- <p> {!! $value->aboutiqac !!}</p> --}}
                </div>
            </div>
            <p style="font-size:20px; color:#4B49B6;">NAAC Cycle<span class="line-4"></span> </p>
            <p style="font-size:20px; color:#4B49B6;">NAAC Coordinator<span class="line-4"></span> </p>
            <p style="font-size:20px; color:#4B49B6;">Committee Members<span class="line-4"></p>
                <p>
                    {{-- {!! $value->committee_members !!} --}}
                </p>
                <table class="table table-striped table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Report </th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    {{-- <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($getRecords as $pdf)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $pdf->title }} <td>
                                <a class="btn btn-primary btn-sm" href="{{ asset('storage/pdfs/' . $pdf->title) }}" target="_blank">view</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody> --}}
                  </table>
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
