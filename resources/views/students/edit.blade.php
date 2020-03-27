@extends('layouts.admin')
@section('title', 'Update Students profile')
  @section('content')



  <a href="/students" class="btn btn-secondary mb-1">Go Back</a>

<div class="row">
<div class="col-md-8 col-lg-8 offset-md-2">
   <h4 class="bg-dark text-white text-center p-2">Update {{$student->firstName. ' ' .$student->lastName}}'s Profile</h1>
{!! Form::open(['action' => ['StudentsController@update', $student->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
<div class="form-group mt-3">
{{ Form::label('firstName', 'First Name') }}
{{ Form::text('firstName', $student->firstName, ['class'=> 'form-control']) }}
</div>
<div class="form-group ">
{{ Form::label('lastName', 'Last Name') }}
{{ Form::text('lastName', $student->lastName, ['class'=> 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('dob', ' Date of Birth: ') }}
    {{ Form::date('dob', $student->dob, ['class'=>'form-control']) }}
  </div>

<div class="form-group ">
{{ Form::label('gender', 'Gender') }}
{{ Form::select('gender',['male'=> 'Male', 'female'=>'Female'] ,$student->gender ,['class'=> 'form-control']) }}
</div>
<div class="form-group ">
    {{ Form::label('homeAddress', 'Home Address ') }}
    {{ Form::text('homeAddress', $student->homeAddress, ['class'=> 'form-control']) }}
    </div>
    <div class="form-group ">
        {{ Form::label('fathersName', "Father's Name ") }}
        {{ Form::text('fathersName', $student->fathersName, ['class'=> 'form-control']) }}
        </div>
        <div class="form-group ">
            {{ Form::label('emailAddress', 'Email Address') }}
            {{ Form::email('emailAddress', $student->emailAddress, ['class'=> 'form-control']) }}
            </div>
            <div class="form-group ">
                               <small>upload your passport</small><br>
 {{ Form::file('passport', ) }} <br>
                           <img class="mt-2" style="width:65px;height:50px" src="{{'/storage/passports/'.$student->passport }}" alt="students passport">
 </div>
        <div class="form-group ">
            {{ Form::label('phone', 'Phone Number ') }}
            {{ Form::text('phone', $student->phone, ['class'=> 'form-control']) }}
            </div>
        <div class="form-group ">
            {{ Form::label('course', 'Students Course ') }}
            {{ Form::text('course', $student->studentsCourse, ['class'=> 'form-control']) }}
            </div>
            {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}
{!! Form::close() !!}
</div>
</div>

@endsection
