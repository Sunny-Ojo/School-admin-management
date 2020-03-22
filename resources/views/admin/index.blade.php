@extends('layouts.admin')
@section('title', 'Welcome Admin ')

@section('content')
<div class="jumbotron">

<header>
    <h1>Welcome Admin</h1>
    <div class="row mt-5 ">
        <div class="col-lg-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        <a class="btn btn-lg btn-success p-4" href="/teachers">
                            @php
                                $student = count($students);
                                $teacher = count($teachers);
                                 if($teacher == 0){
                                            echo 'No Teacher has been  registered' ;
                                     }
                                      elseif ($teacher == 1) {
                                          echo $teacher. ' Teacher has been  registered ';
                                      }
                                      else {
                                          echo $teacher. ' Teachers have been  registered';
                                      }
                            @endphp

</a>
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Total number of registered Teachers</div>
             <a href="teachers/create" class="btn btn-warning  ml-3">Add a new Teacher</a>

                  </div>
                  <div class="col-auto">
                    <i class="fa fa-user-alt fa-4x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>


        <div class="col-lg-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        <a class="btn btn-lg btn-primary p-4" href="/students">
                            @php
                                 if($student == 0){
                                           echo 'No student has been  registered';

                                    }
                                     elseif ($student == 1) {
                                         echo $student. ' Student  has been registered ';
                                     }
                                     else {
                                         echo $student. ' students have registered';
                                     }
                            @endphp
                        </a>

                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Total number of registered students</div>
                    <a href="students/create" class="btn btn-danger  ml-3">Add a new Student</a>

                </div>
                  <div class="col-auto">
                    <i class="fa fa-users fa-4x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </div>
</header>
</div>
@endsection
