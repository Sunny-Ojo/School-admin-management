@extends('layouts.admin')
@section('title', 'Update Teachers profile')
  @section('content')
  <hr>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  <a href="/teachers" class="btn btn-secondary mb-1">Go Back</a>

  <h1 class="bg-dark text-white text-center p-2">Update {{$teacher->firstName. ' ' .$teacher->lastName}}'s Profile</h1>
<div class="row">
<div class="col-md-8 col-lg-8 offset-md-2">
 {!! Form::open(['action' => ['TeachersController@update', $teacher->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
<div class="form-group mt-3">
{{ Form::label('firstName', 'First Name') }}
{{ Form::text('firstName', $teacher->firstName, ['class'=> 'form-control']) }}
</div>
<div class="form-group ">
{{ Form::label('lastName', 'Last Name') }}
{{ Form::text('lastName', $teacher->lastName, ['class'=> 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('dob', ' Date of Birth: ') }}
    {{ Form::date('dob', $teacher->dob, ['class'=>'form-control']) }}
  </div>

<div class="form-group ">
{{ Form::label('gender', 'Gender') }}
{{ Form::select('gender',['male'=> 'Male', 'female'=>'Female'] ,$teacher->gender ,['class'=> 'form-control']) }}
</div>
<div class="form-group ">
    {{ Form::label('homeAddress', 'Home Address ') }}
    {{ Form::text('homeAddress', $teacher->homeAddress, ['class'=> 'form-control']) }}
    </div>
    <div class="form-group ">
        {{ Form::label('fathersName', "Father's Name ") }}
        {{ Form::text('fathersName', $teacher->fathersName, ['class'=> 'form-control']) }}
        </div>
        <div class="form-group ">
            {{ Form::label('emailAddress', 'Email Address') }}
            {{ Form::email('emailAddress', $teacher->emailAddress, ['class'=> 'form-control']) }}
            </div>
            <div class="form-group ">
                               <small>upload your passport</small><br>
 {{ Form::file('passport', ) }} <br>
                           <img class="mt-2" style="width:65px;height:50px" src="{{'/storage/passports/'.$teacher->passport }}" alt="teachers passport">
 </div>
        <div class="form-group ">
            {{ Form::label('phone', 'Phone Number ') }}
            {{ Form::text('phone', $teacher->phone, ['class'=> 'form-control']) }}
            </div>
        <div class="form-group ">
            {{ Form::label('password', 'Change your password ') }}
            {{ Form::password('password', ['class'=> 'form-control'], $teacher->password) }}
            </div>
            {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}
{!! Form::close() !!}
</div>
</div>

@endsection
