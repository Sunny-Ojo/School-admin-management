@extends('layouts.admin')
@section('title', 'Staffs profile')
    @section('content')
    <a href="/Staffs" class="btn btn-secondary mb-1">Go Back</a>
<h4 class="bg-dark text-white text-center p-2">{{$staffs->firstName. ' ' .$staffs->lastName}}'s Profile</h4>
<div class="card-body">
 <div class="row">
<div class="col-md-4 col-lg-4">
    <img style="width:100%;height:90%" src="{{'/storage/passports/'.$staffs->passport}}" alt="Staffs Passport">
</div>
<div class="col-md-8 col-lg-8">
<h3>First Name:  <b>{{$staffs->firstName}}</b></h3>
<h3>Last Name: <b>{{$staffs->lastName}}</b></h3>
<h3>Date of Birth: <b>{{$staffs->dob}}</b></h3>
<h3>Gender: <b>{{$staffs->gender}}</b></h3>
<h3>Home Address: <b>{{$staffs->homeAddress}}</b></h3>
<h3>Email Addresss: <b>{{$staffs->emailAddress}}</b></h3>
<h3>Phone Number: <b>{{$staffs->phone}}</b></h3>
<h3>Role: <b>{{$staffs->role}}</b></h3>

</div>

 </div>
 <a href="/staffs/{{$staffs->id}}/edit"><i class="fa btn btn-sm btn-success fa-edit">Edit</i> </a>

 @if ($staffs->blocked_at != '')
 <a href="/unblockstaff/{{$staffs->id}}" class="btn btn-warning btn-sm">Unblock Staff</a>

                   @else
                                     <a href="/blockstaff/{{$staffs->id}}" class="btn btn-warning btn-sm">Block Staff</a>

                   @endif
                   {!! Form::open(['action'=>['StaffController@destroy',$staffs->id], 'method'=>'DELETE', 'class'=>'float-left mr-1 mb-3']) !!}
  {{ Form::hidden('method', 'DELETE') }}
  {{ Form::submit('Delete', ['class'=>['btn btn-danger btn-sm ', 'float-left','mb-4']]) }}
    {!! Form::close() !!}
</div>
@endsection
