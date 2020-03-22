@extends('layouts.teacher')
@section('title', 'Add a Contents for your course ')
  @section('content')



  <a href="/teachersadmin" class="btn btn-primary mb-1">Go Back</a>

  <h3 class="bg-dark text-white text-center p-2">Add a new Content for your course</h3>
<div class="row">
<div class="col-md-8 col-lg-8 offset-md-2">
        <form action="/teachersadmin/store" method="post" enctype="multipart/form-data">
        <div class="form-group mt-3">
                         <input type="text" class="form-control" name="topic" id="topic" placeholder="Enter Topic ">
        </div>
            <div class="form-group mt-3">
                <input type="text" name="content"  class="form-control" id="content" placeholder="Contents of your topic">
            </div>

            <div class="form-group mt-3">
                <small>Upload a file(supported files(PDF, XLSX, IMAGES, TXT)</small> <br>
                       <input type="file" name="uploads[]" id="uploads" multiple>
            </div>
                            <div class="form-group">
                        <input type="submit" value="Create" class="btn btn-warning">
                            </div>
                        </form>

   {!! Form::close() !!}

</div>
</div>

@endsection
