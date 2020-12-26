<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 3</title>
  </head>
  <body>

    <header>
      <h1>Web306 Assignment 3</h1>

      <p>My Information:</p>

      <ul>
        <li>Name: Nicholas Defranco</li>
        <li>Email: ndefranco@myseneca.ca</li>
      </ul>
    </header>

    <main>
      @foreach($answers as $answer)
        {!! $answer !!}
      @endforeach
    </main>

  </body>
</html>
