@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')


<div class="pagetitle">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">About IQAC
            <a href="{{ route('aboutIqac_list') }}" class="btn btn-danger btn-sm" style="float: right"><i class="bi bi-arrow-left"></i>Back</a>
          </h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- TinyMCE Editor -->
            <div class="col-lg-12">
                <div class="card">
                  <label for="" class="card-title">About IQAC</label>
                    <textarea class="tinymce-editor" name="aboutiqac" style="text-align: justify">

                    </textarea>
                </div>
            </div>
            <!-- End TinyMCE Editor -->

            <div class="col-12">
                <label for="inputNanme4" class="form-label card-title">IQAC Establishment Year</label>
                <input type="text" class="form-control" id="inputNanme4" name='iqacestb'>
            </div>

            <div class="col-12">
                <label for="inputNanme4" class="form-label card-title">IQAC Coordinator</label>
                <input type="text" class="form-control" id="inputNanme4" name='iqacco'>
            </div>

            <!-- TinyMCE Editor -->
            <div class="col-lg-12">
                <div class="card">
                  <label for="" class="card-title">Committee Members</label>
                    <textarea class="tinymce-editor" name="committee_members" style="text-align: justify">

                    </textarea>
                </div>
            </div>
            <!-- End TinyMCE Editor -->

            <div class="col-12">
                <label for="inputNanme4" class="form-label card-title">Report Name</label>
                <input type="text" class="form-control" id="inputNanme4" name='title'>
              </div>

              <div class="col-12">
                <label for="inputEmail4" class="form-label card-title">Upload File <span style="color: red">Max File Size: 7MB</span></label>
                <input type="file" class="form-control" name="pdf" id="pdf" accept="application/pdf" required>

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
                if (pdfFileSize > 7000000) { // Check if the file size exceeds 7 MB
                    alert("PDF file size is exceeding 7 MB");
                    e.preventDefault(); // Prevent form submission
                }
            } else {
                alert("Please select a PDF file to upload.");
                e.preventDefault(); // Prevent form submission if no file is selected
            }
        };
    </script>
  @endsection

