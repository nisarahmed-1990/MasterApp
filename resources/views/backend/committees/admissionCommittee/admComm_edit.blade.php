@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')


<div class="pagetitle">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Admission Committee
            <a href="{{ route('admComm_list') }}" class="btn btn-danger btn-sm" style="float: right"><i class="bi bi-arrow-left"></i>Back</a>
          </h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- TinyMCE Editor -->
            <div class="col-lg-12">
                <div class="card">
                  <label for="" class="card-title">Vision</label>
                    <textarea class="tinymce-editor" name="vision"  style="text-align: justify">
                    {{ $getRecord->vision }}
                    </textarea>
                </div>
            </div>
            <!-- End TinyMCE Editor -->

            <!-- TinyMCE Editor -->
            <div class="col-lg-12">
                <div class="card">
                  <label for="" class="card-title">Mission</label>
                    <textarea class="tinymce-editor" name="mission" style="text-align: justify">
                        {{ $getRecord->mission }}
                    </textarea>
                </div>
            </div>
            <!-- End TinyMCE Editor -->

             <!-- TinyMCE Editor -->
             <div class="col-lg-12">
                <div class="card">
                  <label for="" class="card-title">Objectives</label>
                    <textarea class="tinymce-editor" name="objectives" style="text-align: justify">
                        {{ $getRecord->objectives }}
                    </textarea>
                </div>
            </div>
            <!-- End TinyMCE Editor -->

            <div class="col-12">
                <label for="inputNanme4" class="form-label card-title">Committee Convenor</label>
                <input type="text" class="form-control" value="{{ $getRecord->committee_convenor }}" id="inputNanme4" name='committee_convenor'>
            </div>

            <!-- TinyMCE Editor -->
            <div class="col-lg-12">
                <div class="card">
                  <label for="" class="card-title">Committee Members</label>
                    <textarea class="tinymce-editor" name="committee_members" style="text-align: justify">
                        {{ $getRecord->committee_members }}
                    </textarea>
                </div>
            </div>
            <!-- End TinyMCE Editor -->

            <div class="col-12">
                <label for="inputNanme4" class="form-label card-title">Report Name</label>
                <input type="text" class="form-control" id="inputNanme4" name='title' value="{{ $getRecord->title }}">
              </div>

              <div class="col-12">
                <label for="inputEmail4" class="form-label card-title">Upload Files <span style="color: red">Max File Size: 7M</span></label>
                <input type="file" class="form-control" name="pdf" id="pdf" accept="application/pdf" required>
                <span style="color: red">If you want to update the PDF file, you can upload from here
                    or else upload previous PDF file
                </span>
            </div>

              <div class="text-center">
                <button style="float: left" type="submit" onclick="myFunction()" class="btn btn-primary">Submit</button>
                <button style="float: left; margin-left:8px;" type="reset" class="btn btn-danger">Reset</button>
              </div>
          </form><!-- Vertical Form -->

        </div>
      </div>
  @endsection

  @section('script')
  <script>
    function myFunction() {
            var pdfInput = document.getElementById("pdf");
            if (pdfInput.files.length > 0) {
                let pdfFileSize = pdfInput.files[0].size; // Get the size of the first file
                if (pdfFileSize > 700000) { // Check if the file size exceeds 7 MB
                    alert("PDF file size is exceeding 7 MB");
                    e.preventDefault(); // Prevent form submission
                }
            } else {

                e.preventDefault(); // Prevent form submission if no file is selected
            }
        };
    </script>
  @endsection

