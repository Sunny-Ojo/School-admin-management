@extends('layouts.admin')
@section('title', 'Add a Student ')
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


  <a href="/students" class="btn btn-secondary mb-1">Go Back</a>

  <h1 class="bg-dark text-white text-center p-2">Add a new Student</h1>
<div class="row">
<div class="col-md-8 col-lg-8 offset-md-2">
              {!! Form::open(['action' => 'StudentsController@store', 'method' => 'POST', 'enctype'=> 'multipart/form-data']) !!}
<div class="form-group mt-3">
{{ Form::label('firstName', 'First Name') }}
{{ Form::text('firstName','', ['class'=> 'form-control']) }}
@error('firstName') <li class="text-danger"> {{ $message }}</li> @enderror

</div>
<div class="form-group ">
{{ Form::label('lastName', 'Last Name') }}
{{ Form::text('lastName', '', ['class'=> 'form-control']) }}
@error('lastName') <li class="text-danger"> {{ $message }}</li> @enderror

</div>
<div class="form-group ">
{{ Form::label('dob', 'Date of Birth ') }}
{{ Form::date('dob', '', ['class'=> 'form-control']) }}
@error('dob') <li class="text-danger"> {{ $message }}</li> @enderror

</div>
<div class="form-group ">
{{ Form::label('gender', 'Gender') }}
{{ Form::select('gender',['male'=> 'Male', 'female'=>'Female'] ,'',['class'=> 'form-control']) }}
@error('gender') <li class="text-danger"> {{ $message }}</li> @enderror

</div>
<div class="form-group ">
    {{ Form::label('homeAddress', 'Home Address ') }}
    {{ Form::text('homeAddress', '', ['class'=> 'form-control']) }}
    @error('homeAddress') <li class="text-danger"> {{ $message }}</li> @enderror

</div>
    <div class="form-group ">
        {{ Form::label('fathersName', "Father's Name ") }}
        {{ Form::text('fathersName', '', ['class'=> 'form-control']) }}
        @error('fathersName') <li class="text-danger"> {{ $message }}</li> @enderror

    </div>
        <div class="form-group ">
            {{ Form::label('emailAddress', 'Email Address') }}
            {{ Form::email('emailAddress', '', ['class'=> 'form-control']) }}
            @error('emailAddress') <li class="text-danger"> {{ $message }}</li> @enderror

        </div>
            <div class="form-group ">
                               <small>upload your passport</small><br>
 {{ Form::file('passport', ) }} <br>
 @error('passport') <li class="text-danger"> {{ $message }}</li> @enderror
 </div>
        <div class="form-group ">
            {{ Form::label('phone', 'Phone Number ') }}
            {{ Form::text('phone','', ['class'=> 'form-control']) }}

        </div>
        <div class="form-group ">
            {{ Form::label('course', 'Students Course ') }}
            {{ Form::text('course', '', ['class'=> 'form-control']) }}
                      @error('course') <li class="text-danger"> {{ $message }}</li> @enderror
  </div>
            {{ Form::Submit('Create', ['class'=>'btn btn-primary']) }}
{!! Form::close() !!}
</div>
</div>

@endsection
