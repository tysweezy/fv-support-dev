@extends('layouts.default')

@section('content')

 <h1>Requested Projects</h1>

  <table class="table">
     <thead>
      <tr>
        <td>Project Title</td>
        <td>Project Location</td>
        <td>Project Description</td>
      </tr>
     </thead>

     <tbody>

    @if(count($requests) == 0)
      <div class="alert alert-info">There are no requests</div> 
    @else
     
      @foreach($requests as $request)
        <tr>
            <td><a href="#">{{ $request->project_title }}</a></td>
            <td>{{ $request->project_location }}</td>
            <td>{{ $request->project_description }}</td>
        </tr>
      @endforeach

    @endif
  
    </tbody>
     
  </table>

@endsection