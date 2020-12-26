{{-- 
To specify a parent template to base a child template on, use the extends() function with a string with the path to the parent template as a parameter.
 --}}
 @extends('layouts.base')

{{-- 
In the child template you can use sections with the same names as any of the yields from the parent.
Any content which is included inside of these sections will oeverwrite the yields in the parent template.
--}}
@section('navigation')
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Artists</a></li>
            <li><a href="{{ url('/add') }}" class="current">Add Artist</a></li>
        </ul>
    </nav>
@endsection

@section('content')
    {{-- 
    If, if else and if else if statements use a different syntax in Blade templates.
    They require an @ symbol at the beginning and a closing tag.
    We can check for errors using the $errors->any() method and then loop through error messages using the $errors->all() method.
     --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            {{--
            All loops can be used in Blade template using a slightly different syntax. 
             --}}
             @foreach ($errors->all() as $error)
                 {{ $error }}<br>
             @endforeach
        </div>
    @elseif( session('succcess') )
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- 
    All Laravel forms must have a CSRF (Cross-Site-Request-Forgery) token using the @csrf statement
    A CSRF token is a unique randomized number which is generated each time  the form is submitted and is stored both in the submitted form data and in a cookie which is stored in the user's browser.
    The CSRF token from the form data is then checked against the CSRF token in the user's browser to ensure that an outside party can not access thje data submitted from the form.
     --}}
     {{-- <form action="{{ url('/store') }}" method="post">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" value="" id="name">

        <label for="image">Name:</label>
        <select name="image" id="image">
            @foreach ( $images as $name => $value )
                <option value="{{ $value }}">{{ $name }}</option>
            @endforeach
        </select>

        <label for="styles">Name:</label>
        <textarea name="styles" rows="3" id="styles"></textarea>

        <button type="submit" class="btn">Add Artist</button>
     </form> --}}

     {!! Form::open(['url' => '/store', 'files' => true]) !!}
        {{-- 
        Laravel Collective automatically assumes that we want to include a CSRF token in our form so it is not necessary to explicitly include it.
         --}}
         <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            {!! Form::label('image', 'Upload Image:') !!}
            {!! Form::file('image', ['class' => 'btn btn-dark']) !!}
         </div>
         <div class="form-group">
            {!! Form::label('styles', 'Styles:') !!}
            {!! Form::textarea('styles', null, ['class' => 'form-control', 'rows' => 5]) !!}
         </div>
     {!! Form::close() !!}
@endsection