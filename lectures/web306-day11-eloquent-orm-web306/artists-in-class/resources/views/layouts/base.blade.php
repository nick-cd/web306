<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initila-scale=1.0">
    {{-- 
    We can echo variables which we have passed to our Blade templates using our Controller by simply wrapping them in double curly braces.
     --}}
    <title>{{ $title }}</title>
    {{--
    Because of Laravel's folder structure, it can not read regular relative links to static files such as CSS files, JS files or image files.
    In order to properly link to these files, it is necessary to use the url() function where the parameter is the path to the folder which contains the static asset.
    --}}
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body>
    <header>
        <h1>{{ $title }}</h1>
        {{-- 
        Blade provides a stucture called sections. Sections can be created in parent templates using the yield() function which is used as placeholders for content which could be different for every page and then referenced in child templates. Use a name for the section as the parameter of this function.
         --}}
         @yield('navigation')
    </header>

    <div class="content-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>

    {{-- 
    Blade automatically does HTML escaping using htmlentities() for us so it is not necessary for us to do escaping manually.
    If we don't want Blade to do HTML escaping then we need to use curly braces with two exclaimation points instead.
     --}}
     <footer>
        <p><small>Copyright &copy; {!! date('Y') !!} Artist App</small></p>
     </footer>
</body>
</html>