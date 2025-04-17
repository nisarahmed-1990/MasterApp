@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')


<div class="pagetitle">
 <!-- Table with stripped rows -->
 @include('auth._message')
 <div class="card">

    <div class="card-body">
<h5 class="card-title">Carousel
        <a href="{{ route('carousel_add') }}" class="btn btn-primary sm-btn" style="float: right">Add</a>
      </h5>
     <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">File Name</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($getRecords as $value)
                <tr>
                    <th scope="row">{{ $value->id }}</th>
                    <td>
                        @if (!empty($value->getImage()))
                            <img src="{{ $value->getImage() }}" style="height: 50px; width:50px;" alt="image here">
                        @endif
                    </td>
                    <td>{{ $value->file_name }}</td>
                    <td>{{ date('d-m-Y H:i:A', strtotime($value->created_at)) }}</td>
                    <td><a class="btn btn-secondary btn-sm" href="{{ url('carousel/carousel_edit/'.$value->id) }}">Edit</a>
                        <a onclick="return confirm('Do you want to delete?')" class="btn btn-danger btn-sm" href="{{ url('carousel/carousel_delete/'.$value->id) }}">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100%"> Record not found.</td>
                </tr>
            @endforelse
        </tbody>
      </table>
      {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
     </div>
  </div>
  <!-- End Table with stripped rows -->
  @endsection
  @section('script')
  @endsection

