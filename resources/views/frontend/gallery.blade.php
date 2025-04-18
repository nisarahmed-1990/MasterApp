@extends('app')
@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Our Gallery</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">Library</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Our Gallery</p>
      </div>
    </div>
  </div>
  <!-- Header End -->
   <!--about us-->
   <div class="container">
    <div class="row">
      <div class="col-11">
        <div class="text-center pb-2">
            <p class="section-title px-5">
              <span class="px-2"><span class="line-2"></span>Our Gallery<span class="line-3"></span></span>
            </p>
          </div>
        <div class="container main-section ">
            <div class="row">
                <div class="container-1">
                  <div style="margin:30px auto"></div>
                <div style="margin:30px auto">
            </div>
    {{-- <img class="lightboxed" rel="group1" src="{{ url('img/portfolio-1.jpg') }}"  alt="Image Alt" data-caption="Image Title" />
	<img class="lightboxed" rel="group1" src="{{ url('img/portfolio-2.jpg') }}"  alt="Image Alt" data-caption="Image Caption" />
	<img class="lightboxed" rel="group1" src="{{ url('img/portfolio-3.jpg') }}"  alt="Image Alt" data-caption="Image Caption" />
	<img class="lightboxed" rel="group1" src="{{ url('img/portfolio-4.jpg') }}"  alt="Image Alt" data-caption="Image Caption" />
    <img class="lightboxed" rel="group1" src="{{ url('img/portfolio-5.jpg') }}"  alt="Image Alt" data-caption="Image Caption" />
    <img class="lightboxed" rel="group1" src="{{ url('img/portfolio-6.jpg') }}"  alt="Image Alt" data-caption="Image Caption" /> --}}
    @foreach ($getRecords as $value)
    <img style="width: 300px;height:250px;" class="lightboxed" rel="group1" src="{{ asset('upload/gallery/'.$value->image_path) }}"  alt="Image Alt" data-caption="{!! $value->title !!}" />
    @endforeach
</div>


            </div>
        </div>
      </div>


      <div  class="col-1" style="margin-top: 40px;">

        {{-- Notification --}}
        <div class="card" style="width: 20rem;">
            <div class="card-header">
              Quick Links
            </div>
            <ul class="list-group list-group-flush">
              <a style="text-decoration: none" href="{{ route('gallery') }}"><li class="list-group-item">Gallery</li></a>
              <a style="text-decoration: none" href=""><li class="list-group-item">An item</li></a>
              <a style="text-decoration: none" href=""><li class="list-group-item">An item</li></a>
              <a style="text-decoration: none" href=""><li class="list-group-item">An item</li></a>
              <a style="text-decoration: none" href=""><li class="list-group-item">An item</li></a>
              <a style="text-decoration: none" href=""><li class="list-group-item">An item</li></a>
            </ul>
          </div>
        {{-- Notification End --}}

      </div>

    </div>
  </div>

<!--end of abouts us-->
@endsection
