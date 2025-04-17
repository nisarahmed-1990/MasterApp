@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')


<div class="pagetitle">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Carousel</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Title</label>
              <input type="text" class="form-control" value="{{ $getRecord->file_name }}" id="inputNanme4" name='file_name'>
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Upload Image</label>
              <input type="file" class="form-control" name='image_path' id="inputEmail4">
                @if (!empty($getRecord->getImage()))
                    <img src="{{ $getRecord->getImage() }}" style="height: 50px; width:50px;" alt="image here">
                @endif
            </div>

            <div class="text-center">
              <button style="float: left" type="submit" class="btn btn-primary">Submit</button>

            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>
  @endsection
  @section('script')
  @endsection

