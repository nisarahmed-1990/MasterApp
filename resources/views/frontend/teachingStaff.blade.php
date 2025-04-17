@extends('app')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Winky+Sans:ital,wght@0,300..900;1,300..900&display=swap');
.our-team{
    text-align: center;
    overflow: hidden;
    position: relative;
}
.our-team img{
    width: 100%;
    height: auto;
}
.our-team .team-content{
    width: 100%;
    background: #3f2b4f;
    color: #fff;
    padding: 15px 0 10px 0;
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: 1;
    transition: all 0.3s ease 0s;
}
.our-team:hover .team-content{
    padding-bottom: 40px;
}
.our-team .team-content:before,
.our-team .team-content:after{
    content: "";
    width: 60%;
    height: 38px;
    background: #3f2b4f;
    position: absolute;
    top: -5px;
    transform: rotate(15deg);
    z-index: -1;
}
.our-team .team-content:before{
    left: -3%;
}
.our-team .team-content:after{
    right: -3%;
    transform: rotate(-15deg);
}
.our-team .title{
    font-size: 16px;
    font-weight: 300;
    font-family: Winky Sans;
    text-transform: capitalize;
    margin: 0 0 7px 0;
    position: relative;
}
.our-team .title:before,
.our-team .title:after{
    content: "";
    width: 7px;
    height: 93px;
    background: #ff5543;
    position: absolute;
    top: -67px;
    z-index: -2;
    transform: rotate(-74deg);
}
.our-team .title:before{
    left: 32%;
}
.our-team .title:after{
    right: 32%;
    transform: rotate(74deg);
}
.our-team .post{
    display: block;
    font-size: 13px;
    text-transform: capitalize;
    margin-bottom: 8px;
}
.our-team .social-links{
    list-style: none;
    padding: 0 0 15px 0;
    margin: 0;
    position: absolute;
    bottom: -40px;
    right: 0;
    left: 0;
    transition: all 0.5s ease 0s;
}
.our-team:hover .social-links{
    bottom: 0;
}
.our-team .social-links li{
    display: inline-block;
}
.our-team .social-links li a{
    display: block;
    font-size: 12px;
    color: #aad6e1;
    margin-right: 6px;
    transition: all 0.5s ease 0s;
}
.our-team .social-links li:last-child a{
    margin-right: 0;
}
.our-team .social-links li a:hover{
    color: #ff5543;
}
@media only screen and (max-width: 990px){
    .our-team{ margin-bottom: 30px; }
    .our-team .team-content:before,
    .our-team .team-content:after{
        height: 50px;
        top: -24px;
    }
    .our-team .title:before,
    .our-team .title:after{
        top: -85px;
        height: 102px;
    }
    .our-team .title:before{
        left: 35%;
    }
    .our-team .title:after{
        right: 35%;
    }
}
@media only screen and (max-width: 767px){
    .our-team .team-content:before,
    .our-team .team-content:after{
        height: 75px;
    }
    .our-team .team-content:before{
        transform: rotate(8deg);
    }
    .our-team .team-content:after{
        transform: rotate(-8deg);
    }
    .our-team .title:before,
    .our-team .title:after{
        width: 10px;
        top: -78px;
        height: 102px;
    }
    .our-team .title:before{
        left: 42.5%;
        transform: rotate(-82deg);
    }
    .our-team .title:after{
        right: 42.5%;
        transform: rotate(82deg);
    }
}
@media only screen and (max-width: 480px){
    .our-team .title:before,
    .our-team .title:after{
        top: -83px;
    }
}
</style>
@section('content')
<!-- Header Start -->
<div class="container-fluid shadow mb-5" id="Nbackgroud">
    <div
      class="d-flex flex-column align-items-center justify-content-center"
      style="min-height: 400px"
    >
      <h3 class="display-3 font-weight-bold text-white">Teaching Staff</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0">Administration</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Teaching Staff</p>
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
              <span class="px-2"><span class="line-2"></span>Our Teaching Staff Staff<span class="line-3"></span></span>
            </p>
          </div>
        {{-- admin --}}
        <div class="container">
            <div class="row">
                {{-- one admincouncil code --}}
                @forelse ($getRecords as $value)
                <div class="col-md-3 col-sm-6">
                    <div class="our-team">
                        @if (!empty($value->getImage()))
                                    <img  src="{{ $value->getImage() }}"
                                    alt="image here"
                                    style="width: 100%; height:100%;
                                    border-radius:8%">
                                @endif
                        <div class="team-content">
                            <h3 class="title" style="color: white">{!! $value->title !!}</h3>
                            <span class="post">{!! $value->designation !!}</span>
                            <ul class="social-links">
                                <li style="font-size: 12px;">{!! $value->qualification !!}</li>
                                <li style="font-size: 12px;">{!! $value->department !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @empty
                    No Recorde Found!
                @endforelse

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
