@extends('layouts.admin')
@section('title', 'Update Staff profile')
  @section('content')



  <a href="/staffss" class="btn btn-secondary mb-1">Go Back</a>

<div class="row">
<div class="col-md-8 col-lg-8 offset-md-2">
   <h4 class="bg-dark text-white text-center p-2">Update {{$staffs->firstName. ' ' .$staffs->lastName}}'s Profile</h4>
{!! Form::open(['action' => ['StaffController@update', $staffs->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
<div class="form-group mt-3">
{{ Form::label('firstName', 'First Name') }}
{{ Form::text('firstName', $staffs->firstName, ['class'=> 'form-control']) }}
</div>
<div class="form-group ">
{{ Form::label('lastName', 'Last Name') }}
{{ Form::text('lastName', $staffs->lastName, ['class'=> 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('dob', ' Date of Birth: ') }}
    {{ Form::date('dob', $staffs->dob, ['class'=>'form-control']) }}
  </div>

<div class="form-group ">
{{ Form::label('gender', 'Gender') }}
{{ Form::select('gender',['male'=> 'Male', 'female'=>'Female'] ,$staffs->gender ,['class'=> 'form-control']) }}
</div>
<div class="form-group ">
    {{ Form::label('homeAddress', 'Home Address ') }}
    {{ Form::text('homeAddress', $staffs->homeAddress, ['class'=> 'form-control']) }}
    </div>

        <div class="form-group ">
            {{ Form::label('emailAddress', 'Email Address') }}
            {{ Form::email('emailAddress', $staffs->emailAddress, ['class'=> 'form-control']) }}
            </div>
            <div class="form-group ">
                               <small>upload your passport</small><br>
 {{ Form::file('passport', ) }} <br>
                           <img class="mt-2" style="width:65px;height:50px" src="{{'/storage/passports/'.$staffs->passport }}" alt="staffss passport">
 </div>
        <div class="form-group ">
            {{ Form::label('phone', 'Phone Number ') }}
            {{ Form::text('phone', $staffs->phone, ['class'=> 'form-control']) }}
            </div>
        <div class="form-group ">
            {{ Form::label('role', 'Staffs Role ') }}
            {{ Form::text('role', $staffs->role, ['class'=> 'form-control']) }}
            </div>
            {{ Form::submit('Update', ['class'=>'btn btn-primary']) }}
{!! Form::close() !!}
</div>
</div>

@endsection
