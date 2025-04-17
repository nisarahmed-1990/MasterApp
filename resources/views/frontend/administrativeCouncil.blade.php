@extends('app')

@section('content')
<style>
.our-team{
    text-align: center;
    margin-bottom: 100px;
    z-index: 1;
    position: relative;
}
.our-team .pic{
    border-radius: 50%;
    overflow: hidden;
    position: relative;
}
.our-team .pic:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: rgba(0,0,0,0.7);
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    transition: all 0.5s ease 0s;
}
.our-team:hover .pic:after{ opacity: 1; }
.our-team .pic img{
    width: 100%;
    height: auto;
}
.our-team .social{
    width: 100%;
    padding: 0;
    margin: 0;
    list-style: none;
    opacity: 0;
    position: absolute;
    top: 45%;
    left: 0;
    z-index: 1;
    transition: all 0.5s ease 0s;
}
.our-team:hover .social{ opacity: 1; }
.our-team .social li{ display: inline-block; }
.our-team .social li a{
    display: block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    border: 1px solid #fff;
    font-size: 15px;
    color: #fff;
    margin-right: 10px;
    transition: all 0.5s ease 0s;
}
.our-team .social li a:hover{
    background: #fff;
    color: #000;
}
.our-team .team-content{
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 2px dotted #ddd;
    position: absolute;
    bottom: -70px;
    left: 0;
    z-index: -1;
    transition: all 0.5s ease 0s;
}
.our-team:hover .team-content{ border: 2px dotted #00adae; }
.our-team .team-info{
    width: 100%;
    color: #464646;
    position: absolute;
    bottom: 12px;
    left: 0;
}
.our-team .title{
    font-size: 14px;
    font-weight: 600;
    color: #464646;
    margin: 0 0 5px 0;
    transition: all 0.5s ease 0s;
}
.our-team:hover .title{ color: #00adae; }
.our-team .post{
    display: block;
    font-size: 14px;
    color: #696666;
}
</style>
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Administrative Council</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">Administration</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Administrative Council</p>
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
              <span class="px-2"><span class="line-2"></span>Our Administrative Council Members<span class="line-3"></span></span>
            </p>
          </div>
        {{-- admin --}}
        <div class="container">
            <div class="row">
                {{-- one admincouncil code --}}
                @forelse ($getRecords as $value)
                    <div class="col-md-3 col-sm-6">
                        <div class="our-team">
                            <div class="pic">
                                @if (!empty($value->getImage()))
                                    <img  src="{{ $value->getImage() }}"
                                    alt="image here"
                                    >
                                @endif
                                <ul class="social">
                                    <li><a href="#" class="bi bi-facebook"></a></li>
                                    <li><a href="#" class="bi bi-twitter"></a></li>
                                    <li><a href="#" class="bi bi-google"></a></li>
                                    <li><a href="#" class="bi bi-linkedin"></a></li>
                                </ul>
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3 class="title">{!! $value->title !!}</h3>
                                    <span class="post">{!! $value->designation !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    No Recorde Found!
                @endforelse
                {{-- one admincoucil code end --}}
            </div>
        </div>
        {{-- admin end --}}
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
