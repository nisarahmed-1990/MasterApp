@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')


<div class="pagetitle">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Administrative Council
            <a href="{{ route('administrativeCouncil_list') }}" class="btn btn-danger btn-sm" style="float: right; text-align:center"><span style="color: aliceblue">&#8592;</span></i> Back</a>
          </h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-12">
              <label for="inputNanme4" class="form-label card-title">Name</label>
              <input type="text" class="form-control" id="inputNanme4" name='title' value="{{ $getRecord->title }}">
            </div>
            <div class="col-12">
                <label for="inputNanme4" class="form-label card-title">Designation</label>
                <input type="text" class="form-control" id="inputNanme4" name='designation' value="{{ $getRecord->designation }}">
              </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label card-title">Profile Picture</label>
              <input type="file" class="form-control" name='image_path' id="inputEmail4">
              @if (!empty($getRecord->getImage()))
                <img src="{{ $getRecord->getImage() }}" style="height: 50px; width:50px;" alt="image here">
             @endif
            </div>

            <div class="text-center">
              <button style="float: left" type="submit" class="btn btn-primary">Submit</button>
              <button style="float: left; margin-left:8px;" type="reset" class="btn btn-danger">Reset</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>
  @endsection
  @section('script')
  @endsection

