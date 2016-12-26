@extends('layouts.default')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">New Project Request (Kinesis or Decipher Survey Theme)</div>
  <div class="panel-body">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
   @include('flash.session')

    <form action="{{ route('project-request') }}" method="post" enctype='multipart/form-data'>
        {!! csrf_field() !!}

       <div class="form-group">
          <label for="project_title">Project Title <span class="required">(Required)</span></label>
          <input type="text" name="project_title" class="form-control">
       </div>

      <div class="form-group">
        <label for="requester_email">Your Email (So the system can notify you about things) <span class="required">(Required)</span></label>
        <input type="email" name="requester_email" class="form-control">
      </div>


       <div class="form-group">
         <label for="project_location">Project Location (URL? Project ID?)</label>
         <input type="text" name="project_location" class="form-control">
       </div>
       
       <div class="form-group">
          <label for="project_description">Project Description <span class="required">(Required)</span></label>
          <textarea name="project_description" class="form-control"></textarea>
       </div>

      <div class="form-group">
        <label for="project_type">Project Type</label>
        <select name="project_type">
           <option selected="true" disabled="disabled">Choose Project Type</option>    
           <option value="Decipher Custom Survey Theme">Decipher Custom Survey Theme</option>
           <option value="Kinesis Community Site">Kinesis Community Site</option>
        </select>
      </div>

      <!-- assets/attachments/style guides -->
      <!-- todo: add ability to add new attachments..maybe a vue component??? -->
      <div class="form-group">
        <label for="attachment">Attachments/Style Guides (it is recommended that you send files within a .zip)</label>
        <input type="file" name="attachment">
      </div>


      <div class="form-group">
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>

    </form>
  </div>
</div>
@endsection