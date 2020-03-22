 @extends('layouts.teacher')
@section('title', 'Welcome Admin ')

@section('content')
<div class="jumbotron">

<h1>Dashboard</h1>

        <div class="col-lg-12 col-md-12 mb-4" align="center">
            <div class="card border-left-warning shadow h-100 ">
              <div class="card-body">
                <div class="row gutters align-items-center">
                  <div class="col">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        <a class="btn btn-lg btn-primary p-4" href="/students">
                            @php
                            $student = count($students);
                                 if($student == 0){
                                           echo 'No student has been  registered for your course';

                                    }
                                     elseif ($student == 1) {
                                         echo $student. ' Student  has been registered for your course';
                                     }
                                     else {
                                         echo $student. ' students have registered for your course';
                                     }
                            @endphp
                        </a>

                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Total number of registered students for  your course</div>

                </div>
                  <div class="col-auto">
                    <i class="fa fa-users fa-4x mr-4 text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
  <div class="bg-secondary  bg-gradient-danger p-4" align="center" >
    <a href="students/create" class="btn btn-secondary  ml-3">Add a new Student</a>
<a href="/teachersadmin/create" class="btn btn-success">Create Contents for your Course</a>
  </div>
@endsection
