@extends('layouts.admin')
@section('title', 'Teachers profile')
    @section('content')
    <a href="/teachers" class="btn btn-secondary mb-1">Go Back</a>
<h1 class="bg-dark text-white text-center p-2">{{$student->firstName. ' ' .$student->lastName}}'s Profile</h1>
<div class="card-body">
 <div class="row">
<div class="col-md-4 col-lg-4">
<img style="width:100%;height:90%" src="{{'/storage/passports/'.$student->passport}}" alt="Students Passport">
</div>
<div class="col-md-8 col-lg-8">
<h3>First Name:  <b>{{$student->firstName}}</b></h3>
<h3>Last Name: <b>{{$student->lastName}}</b></h3>
<h3>Date of Birth: <b>{{$student->dob}}</b></h3>
<h3>Gender: <b>{{$student->gender}}</b></h3>
<h3>Home Address: <b>{{$student->homeAddress}}</b></h3>
<h3>Father's Name: <b>{{$student->fathersName}}</b></h3>
<h3>Email Addresss: <b>{{$student->emailAddress}}</b></h3>
<h3>Phone Number: <b>{{$student->phone}}</b></h3>
<h3>Teachers Course: <b>{{$student->course}}</b></h3>

</div>

 </div>
 <a href="/teachers/{{$student->id}}/edit"><i class="fa btn btn-sm btn-success fa-edit">Edit</i> </a>

 @if ($student->blocked_at != '')
 <a href="/unblockteacher/{{$student->id}}" class="btn btn-warning btn-sm">Unblock Teacher</a>

                   @else
                                     <a href="/blockteacher/{{$student->id}}" class="btn btn-warning btn-sm">Block Teacher</a>

                   @endif{!! Form::open(['action'=>['TeachersController@destroy',$student->id], 'method'=>'DELETE', 'class'=>'float-left mr-1 mb-3']) !!}
  {{ Form::hidden('method', 'DELETE') }}
  {{ Form::submit('Delete', ['class'=>['btn btn-danger btn-sm ', 'float-left','mb-4']]) }}
    {!! Form::close() !!}
</div>
@endsection
