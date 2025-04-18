@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')


<div class="pagetitle">
 <!-- Table with stripped rows -->
 @include('auth._message')
 <div class="card">
    <div class="card-body">

      <h5 class="card-title">Women Empowerment Cell
        <a href="{{ route('wec_insert') }}" class="btn btn-primary sm-btn" style="float: right">Add</a>
      </h5>
     <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Vision</th>
            <th scope="col">Mission</th>
            <th scope="col">Objectives</th>
            <th scope="col">Committee Convenor</th>
            <th scope="col">Committee Members</th>
            <th scope="col">Report Name</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($getRecords as $pdf)
            <tr>
                <th scope="row">{{ $pdf->id }}</th>
                <th scope="row">{!! $pdf->vision !!}</th>
                <th scope="row">{!! $pdf->mission !!}</th>
                <th scope="row">{!! $pdf->objectives !!}</th>
                <th scope="row">{!! $pdf->committee_convenor !!}</th>
                <th scope="row">{!! $pdf->committee_members !!}</th>
                <th scope="row">{!! $pdf->title !!}</th>
                <th scope="row">{{ $pdf->created_at }}</th>
                <th scope="row">{{ $pdf->updated_at }}</th>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ asset('storage/pdfs/' . $pdf->title) }}" target="_blank">view</a>
                    <a class="btn btn-secondary btn-sm" href="{{ url('wec_edit/'.$pdf->id) }}"><i class="bi bi-pencil"></i></a>
                    <a onclick="return confirm('Do you want to delete?')" class="btn btn-danger btn-sm" href="{{ url('wec_delete/'.$pdf->id) }}"><i class="bi bi-trash3-fill"></i></a>
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

