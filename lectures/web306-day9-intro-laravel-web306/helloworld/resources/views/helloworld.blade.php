{{-- 
Now that we have a route which loads a Blade template, the next step is to create a very simple Blade template.
Blade templates are saved in the /resources/views folder and must be saved in the format viewname.blade.php.
--}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{ $title }}</title>
    </head>
    <body>
        <h1>{{ $title }}</h1>
    </body>
</html>