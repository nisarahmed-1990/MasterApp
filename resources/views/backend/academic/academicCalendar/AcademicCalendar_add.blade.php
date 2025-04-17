@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')


<div class="pagetitle">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Academic Calendar
            <a href="{{ route('AcademicCalendar_list') }}" class="btn btn-danger btn-sm" style="float: right; text-align:center"><span style="color: aliceblue">&#8592;</span></i> Back</a>
          </h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-12">
                <label for="inputName4" class="form-label card-title">Name</label>
                <input type="text" class="form-control" id="inputName4" name='title' required>
            </div>

            <div class="col-12">
                <label for="pdf" class="form-label card-title">Upload File</label>
                <input type="file" class="form-control" name="pdf" id="pdf" accept="application/pdf" required>
            </div>

            <div class="text-center">
                <button style="float: left" type="submit" id="sub-btn" onclick="myFunction()" class="btn btn-primary">Submit</button>
                <button style="float: left; margin-left:8px;" type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form><!-- Vertical Form -->

        </div>
      </div>
  @endsection
<script>
function myFunction() {
        var pdfInput = document.getElementById("pdf");
        if (pdfInput.files.length > 0) {
            let pdfFileSize = pdfInput.files[0].size; // Get the size of the first file
            if (pdfFileSize > 6000000) { // Check if the file size exceeds 6 MB
                alert("PDF file size is exceeding 6 MB");
                e.preventDefault(); // Prevent form submission
            }
        } else {
            alert("Please select a PDF file to upload.");
            e.preventDefault(); // Prevent form submission if no file is selected
        }
    };
</script>
  @section('script')
  @endsection

