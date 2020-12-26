<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
  </head>
  <body>
    <!--
      (From the week 1 notes) Note: Examples of Semantic Markup Tags:
        - Header and Footer tags
        - Nav tag
        - Main tag

      There is nothing that enforces that these tags are used correctly. Hence the name.
    -->
    <header>
      <h1>
        Assingment 1 - PHP Written Answers
      </h1>

      <p>My Information:</p>

      <ul>
        <li>Name: Nicholas Defranco</li>
        <li>Email: ndefranco@myseneca.ca</li>
      </ul>

    </header>

    <main>
    <?php 

      require __DIR__ . '/vendor/autoload.php';

      $answers = [];

      // https://github.com/erusev/parsedown
      $parsedown = new Parsedown();

      // https://stackoverflow.com/questions/3977500/how-can-i-list-all-files-in-a-directory-sorted-alphabetically-using-php#3977514
      foreach (glob(__DIR__ . '/answers/' . "*") as $file) {
        $text = file_get_contents($file);
        $answers[$file] = $text;
      }

      foreach ($answers as $ans) {
        echo '<section>' . $parsedown->text($ans) . '</section>';
      }

    ?>

    </main>
  </body>
</html>