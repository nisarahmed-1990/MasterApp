@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')


<div class="pagetitle">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Gallery Items
            <a href="{{ route('gallery_list') }}" class="btn btn-danger btn-sm" style="float: right"><i class="bi bi-arrow-left"></i>Back</a>
          </h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-12">
              <label for="inputNanme4" class="form-label card-title">Title</label>
              <input type="text" class="form-control" id="inputNanme4" name='title'>
            </div>
            <div class="col-12">
                <label for="inputNanme4" class="form-label card-title">Choose image</label>
                <input type="file" class="form-control" id="inputNanme4" name='image_path'>
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

