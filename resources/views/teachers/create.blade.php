@extends('layouts.admin')
@section('title', 'Add a Teacher ')
  @section('content')
  <hr>


  <a href="/teachers" class="btn btn-warning mb-1">Go Back</a>

<div class="row">
<div class="col-md-8 col-lg-8 offset-md-2">
          <h4 class="bg-dark text-white text-center p-2">Add a new Teacher</h4>
      {!! Form::open(['action' => 'TeachersController@store', 'method' => 'POST', 'enctype'=> 'multipart/form-data']) !!}
<div class="form-group mt-3">
{{ Form::label('firstName', 'First Name') }}
{{ Form::text('firstName','', ['class'=> 'form-control']) }}

</div>
<div class="form-group ">
{{ Form::label('lastName', 'Last Name') }}
{{ Form::text('lastName', '', ['class'=> 'form-control']) }}

</div>
<div class="form-group ">
{{ Form::label('dob', 'Date of Birth ') }}
{{ Form::date('dob', '', ['class'=> 'form-control']) }}

</div>
<div class="form-group ">
{{ Form::label('gender', 'Gender') }}
{{ Form::select('gender',['male'=> 'Male', 'female'=>'Female'] ,'',['class'=> 'form-control']) }}

</div>
<div class="form-group ">
    {{ Form::label('homeAddress', 'Home Address ') }}
    {{ Form::text('homeAddress', '', ['class'=> 'form-control']) }}

</div>
    <div class="form-group ">
        {{ Form::label('fathersName', "Father's Name ") }}
        {{ Form::text('fathersName', '', ['class'=> 'form-control']) }}

    </div>
        <div class="form-group ">
            {{ Form::label('emailAddress', 'Email Address') }}
            {{ Form::email('emailAddress', '', ['class'=> 'form-control']) }}

        </div>
                <div class="form-group ">
                <small>upload your passport</small><br>
                {{ Form::file('passport', ) }} <br>
                </div>


        <div class="form-group ">
            {{ Form::label('phone', 'Phone Number ') }}
            {{ Form::text('phone','', ['class'=> 'form-control']) }}

        </div>


        <div class="form-group ">
            {{ Form::label('course', ' Course ') }}
            {{ Form::text('course', '', ['class'=> 'form-control']) }}
  </div>


            {{ Form::Submit('Create', ['class'=>'btn btn-primary']) }}
{!! Form::close() !!}
</div>
</div>

@endsection
