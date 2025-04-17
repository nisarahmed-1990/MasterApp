@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')


<div class="pagetitle">
 <!-- Table with stripped rows -->
 @include('auth._message')
 <div class="card">
    <div class="card-body">

      <h5 class="card-title">Notification
        <a href="{{ route('notification_insert') }}" class="btn btn-primary sm-btn" style="float: right">Add</a>
      </h5>
     <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">File Name</th>
            {{-- <th scope="col">URL</th> --}}
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($getRecords as $pdf)
            <tr>
                <th scope="row">{{ $pdf->id }}</th>

                <td>{{ $pdf->title }} <td>
                    <a class="btn btn-primary btn-sm" href="{{ asset('storage/pdfs/' . $pdf->title) }}" target="_blank">view</a>
                    <a onclick="return confirm('Do you want to delete?')" class="btn btn-danger btn-sm" href="{{ url('notification_delete/'.$pdf->id) }}"><i class="bi bi-trash3-fill"></i></a>
                </td>

            </tr>
            @endforeach
        </tbody>
        {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
      </table>

     </div>
  </div>
  <!-- End Table with stripped rows -->
  @endsection
  @section('script')
  @endsection

