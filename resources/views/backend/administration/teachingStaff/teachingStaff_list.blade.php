@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')


<div class="pagetitle">
 <!-- Table with stripped rows -->
 @include('auth._message')
 <div class="card">
    <div class="card-body">

      <h5 class="card-title">Teaching Staff
        <a href="{{ route('teachingStaff_insert') }}" class="btn btn-primary sm-btn" style="float: right">Add</a>
      </h5>
     <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Qualification</th>
            <th scope="col">Desgination</th>
            <th scope="col">Department</th>
            {{-- <th scope="col">Profile</th> --}}
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
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
                    <td>{{ $value->title }}</td>
                    <td>{!!  $value->qualification  !!}</td>
                    <td>{!!  $value->designation  !!}</td>
                    <td>{!!  $value->department  !!}</td>
                    {{-- <td>
                        @if (!empty($value->getImage()))
                            <img src="{{ $value->getImage() }}" style="height: 50px; width:50px;" alt="image here">
                        @endif
                    </td> --}}
                    <td>{{ date('d-m-Y H:i:A', strtotime($value->created_at)) }}</td>
                    <td>{{ date('d-m-Y H:i:A', strtotime($value->updated_at)) }}</td>
                    <td><a class="btn btn-secondary btn-sm" href="{{ url('teachingStaff_edit/'.$value->id) }}"><i class="bi bi-pencil-fill"></i></a>
                        <a onclick="return confirm('Do you want to delete?')" class="btn btn-danger btn-sm" href="{{ url('teachingStaff_delete/'.$value->id) }}"><i class="bi bi-trash3-fill"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100%"> Record not found.</td>
                </tr>
            @endforelse
        </tbody>
        {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
      </table>

     </div>
  </div>
  <!-- End Table with stripped rows -->
  @endsection
  @section('script')
  @endsection

