<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FocusVision Support Design & Development</title>
    <!-- adding this here cause NPM wont work -->
     <link rel="stylesheet" href="{{ url('/') }}/css/temp.css">
  </head>
  <body>

    <header class="main-header">
      <div class="brand">
        <a href="{{ url('/') }}"><img src="img/focusvision.png" alt="FocusVision Logo" /></a>
      </div>

      <div class="landing-auth">
       @if (Auth::guest())  
         <a href="{{ url('/login') }}">Login</a>
        
       @endif

       @if (Auth::check())
        <a href="{{ url('/logout') }}">Logout</a>
       @endif

      </div>

    </header>

    <div class="banner">
      <h1>Support Design & Development</h1>
    </div>

    <div class="items">
      <div class="row">
        <a href="{{ route('create-project-request') }}" class="col col-4" id="survey-request"><span class="item-title">Survey Theme Request</span></a>
        <a href="{{ route('create-project-request') }}" class="col col-4" id="kinesis"><span class="item-title">Kinesis Community Request</span></a>
        <a href="{{ url('/survey/themes') }}" class="col col-4" id="survey-themes"><span class="item-title">Survey Themes</span></a>
      </div>

      <div class="row">
        <a href="{{ url('/survey/styleguide') }}" class="col col-4" id="survey-style"><span class="item-title">Survey Theme Style Guide</span></a>
        <a href="{{ url('/currentwork') }}" class="col col-4" id="blog"><span class="item-title">Work In Progress</span></a>
      </div>
    </div>

  </body>
</html>
