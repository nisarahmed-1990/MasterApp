@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')


<div class="pagetitle">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title"> Edit Library Rules
            <a href="{{ route('libraryRules_list') }}" class="btn btn-danger btn-sm" style="float: right"><i class="bi bi-arrow-left"></i>Back</a>
          </h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-12">
              <label for="inputNanme4" class="form-label card-title">Title</label>
              <input type="text" class="form-control" value="{{ $getRecord->title }}" id="inputNanme4" name='title'>
            </div>
            <div class="col-12">
              <label for="inputEmail4" class="form-label card-title">Upload Image</label>
              <input type="file" class="form-control" name='image_path' id="inputEmail4">
              @if (!empty($getRecord->getImage()))
                <img src="{{ $getRecord->getImage() }}" style="height: 50px; width:50px;" alt="image here">
              @endif
            </div>
            <!-- TinyMCE Editor -->
            <div class="col-lg-12">
                <div class="card">
                  <label for="" class="card-title">Description</label>
                    <textarea class="tinymce-editor" name="description" style="text-align: justify">
                        {{ $getRecord->description }}
                    </textarea>
                </div>
            </div>
            <!-- End TinyMCE Editor -->
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

