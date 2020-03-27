@extends('layouts.admin')
@section('title', 'list of all registered staffs')

@section('content')
<hr>
    @if (count($staff)> 0)
    <h1 class="h3 mb-2  text-center bg-dark text-white p-2">Registered Staffs</h1>
    <p class="mb-4">List of all registered Staffs in the school</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



            <thead>
              <tr>
                  <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Home Address</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Home Address</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
                @foreach ($staff as $staffs)

                    <tr>
                    <td>{{$staffs->id}}</td>
                    <td>{{$staffs->firstName}}</td>
                      <td>{{$staffs->lastName}}</td>
                      <td>{{$staffs->homeAddress}}</td>
                    <td><a href="/staffs/{{$staffs->id}}"><i class="fa fa-eye btn btn-sm btn-primary">View</i> </a>
                        <a href="/staffs/{{$staffs->id}}/edit"><i class="fa btn btn-sm btn-success fa-edit">Edit</i> </a>
                        @if ($staffs->blocked_at != '')
                        <a href="/unblockstaff/{{$staffs->id}}" class="btn btn-warning btn-sm">Unblock staff</a>

                                          @else
                                            <a href="/blockstaff/{{$staffs->id}}" class="btn btn-warning btn-sm">Block staff</a>

                                          @endif   {!! Form::open(['action'=>['StaffController@destroy',$staffs->id], 'method'=>'DELETE', 'class'=>'float-right']) !!}
                      {{ Form::hidden('method', 'DELETE') }}
                      {{ Form::submit('Delete', ['class'=>['btn btn-danger btn-sm ', 'float-right']]) }}
                        {!! Form::close() !!}

                    </td>
                    </tr>
                   @endforeach
                  </tbody>
          </table>
        </div>
      </div>
    </div>
    @else
    <div class="col-lg-12 col-md-12 mb-4 text-center mt-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                   <a  class="btn btn-outline-primary  p-4">No registered staffs</a>
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">No staff has been registered</div>
              </div>

              <div class="col-">
                <i class="fa fa-users fa-4x text-gray-300"></i>
                          <a href="staffs/create" class="btn btn-warning float-right ml-3">Add a new staff</a>
  </div>
            </div>
          </div>
        </div>
      </div>
    @endif
@endsection
