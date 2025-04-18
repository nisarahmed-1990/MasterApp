@extends('app')

@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Women Empowerment Cell</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">Committees</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Women Empowerment Cell</p>
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
                    <img style="object-fit:cover; hieght:100px; width:100px; display: block; margin-left: auto; margin-right: auto;width: 50%;"  src="{{ url('img/women-2.png') }}" alt="">
                    @foreach ($getRecords as $value)
                        {{-- <div>
                            <img src="{{ asset('upload/aboutCollege/'.$value->image_path) }}" class="d-block w-100" id="image1">
                        </div> --}}
                         @endforeach

                    <p style="font-size:20px; color:#4B49B6;">Vission<span class="line-4"></p>
                        <p> {!! $value->vision !!}</p>
                </div>
                <div class="col-md-6">
                    <p style="text-align: justify">She gives a way to come on Earth; She gives a way to see the Earth She is Power. She is the Heaven; Who gives us birth. She is the <span style="color:#DB261B; font-style:italic">"WOMAN"</span></p>
                    <p style="font-size:20px; color:#4B49B6; margin-top:135px;">Mission<span class="line-4"></p>
                        <p>{!! $value->mission !!}</p>

                </div>

                <p style="font-size:20px; color:#4B49B6;">Objectives<span class="line-4"></p>
                    <p>
                        {!! $value->objectives !!}
                     </p>
                     <p style="font-size:20px; color:#4B49B6;">Committee Convenor<span class="line-4"></span> {!! $value->committee_convenor !!}</p>
                    <p style="font-size:20px; color:#4B49B6;">Committee Members<span class="line-4"></p>
                        <p style="margin-top:-30px;">
                            {!! $value->committee_members !!}
                        </p>
                    <table class="table table-striped table-hover table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Report </th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
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
