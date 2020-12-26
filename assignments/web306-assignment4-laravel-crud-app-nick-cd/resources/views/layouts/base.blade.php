<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/app.css" type="text/css" />

    <title>{{ $title }}</title>
  </head>
  <body>
    <header class="container">
      <div class="row">
        <h1 class="col-md-offset-3">{{ $title }}</h1>
      </div>
      <nav class="row">
        @yield('navigation')
      </nav>
      @if($errors->any())
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
            {{ $error }}
          </div>
        @endforeach
      @elseif(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
    </header>

    <main class="container">
      @yield('content')
    </main>
  </body>
</html>
