@extends('layouts.admin')
@section('title', 'list of all registered Teachers')

@section('content')
<hr>
    @if (count($teachers)> 0)
    <h1 class="h3 mb-2 text-center bg-dark text-white p-2">Registered Teachers</h1>
    <p class="mb-4">List of all registered Teachers in the school</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            @if ($errors->any())
            <div class="alert alert-danger">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </div>
        @endif


            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Home Address</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Home Address</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
                @foreach ($teachers as $teacher)

                    <tr>
                    <td>{{$teacher->firstName}}</td>
                      <td>{{$teacher->lastName}}</td>
                      <td>{{$teacher->homeAddress}}</td>
                    <td><a href="/teachers/{{$teacher->id}}"><i class="fa fa-eye btn btn-sm btn-primary">View</i> </a>
                        <a href="/teachers/{{$teacher->id}}/edit"><i class="fa btn btn-sm btn-success fa-edit">Edit</i> </a>
                   @if ($teacher->blocked_at != '')
 <a href="/unblockteacher/{{$teacher->id}}" class="btn btn-warning btn-sm">Unblock Teacher</a>

                   @else
                                     <a href="/blockteacher/{{$teacher->id}}" class="btn btn-warning btn-sm">Block Teacher</a>

                   @endif
                        {!! Form::open(['action'=>['StudentsController@destroy',$teacher->id], 'method'=>'DELETE', 'class'=>'float-right']) !!}
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
                   <a  class="btn btn-outline-primary  p-4">No registered Teachers</a>
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">No Teacher has been registered</div>
              </div>

              <div class="col-">
                <i class="fa fa-user fa-4x text-gray-300"></i>
                          <a href="teachers/create" class="btn btn-warning float-right ml-3">Add a new Teacher</a>
  </div>
            </div>
          </div>
        </div>
      </div>
    @endif
@endsection
