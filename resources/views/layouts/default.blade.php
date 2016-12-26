<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FocusVision Support Design & Development</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/css/app.css"> 
  </head>
  <body>

    <header class="main-header">
      <div class="brand">
        <a href="{{ url('/') }}"><img src="{{ url('img/focusvision.png') }}" alt="FocusVision Logo" /></a>
      </div>
    </header>

    <!-- have menu go here -->

    <div class="container">
        @yield('content')
    </div>

  </body>
</html>
