<?php
$title = "Flow Control";

$body_margin = "0";
$body_font_family = "Arial, sans-serif";
$header_bg = "navy";
$header_color = "white";
$header_padding = "50px";
$text_class = ".text-center";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $title ?></title>
    <style media="screen">
      body {
        margin: <?php echo $body_margin; ?>;
        font-family: <?php echo $body_font_family; ?>;
      }
      header, footer{
        background: <?php echo $header_bg; ?>;
        color: <?php echo $header_color; ?>;
        padding: <?php echo $header_padding; ?>;
      }
      <?php echo $text_class; ?> {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <header>
      <h1 class="text-center"><?php echo $title ?></h1>
    </header>

    <div class="container text-center">
      <?php
        // 1. Conditionals
        // Conditionals are used to perform different actions depending on one or more given conditions

        $elephant = true;
        $name = "Dumbo";
        $can_fly = true;

        // 1.1 Comparison Operators
        // == the double equals sign is used as an evaluator of equality
          // 7 == "7" will equal true
        // === the triple equals sign is used as an evalator of equality but ALSO checks the data type
          // 7 === "7" will equal false
        // != not equal
        // < less than
        // > greater than
        // <= less than or equal to
        // >= greater than or equal to
        // <=> known as "spaceship", returns 0 if equal, -1 if A is less than B, 1 if A is greater than B

        // 1.2 Logical Operators
        // && and
        // || or
        // ! not

        // 1.3 If Statements
        // If statements are a way of checking if a set of conditions are true or false
        if ( $elephant == true ) {
          // If true, run this, if false do nothing
          echo "<p>There is an elephant!</p>";

          if ($name == "Dumbo") {
            echo "<p>His name is Dumbo!</p>";

            if ($can_fly == true) {
              echo "<p>Dumbo can fly!</p>";
            }
          }
        }

        // 1.4 If Else Statements
        // If else statements are used to check if one condition is true or false and THEN to set a default behavior if the condition is false
        if ( $elephant == true ) {
          // If true, run this, if false do nothing
          echo "<p>There is an elephant!</p>";
        } else {
          // If false run else code
          echo "<p>There are no elephants!</p>";
        }

        // 1.5 If Else IF Statements
        // If else if statements are used to check if two or more conditions are true or false
        if ( $elephant == true && $name == "Dumbo" && $can_fly == true) {
          // If true, run this, if false do nothing
          echo "<p>There is an elephant named Dumbo who can fly!</p>";
        } else if ( $elephant == true && $name == "Dumbo") {
          // If true, run this, if false do nothing
          echo "<p>There is an elephant named Dumbo!</p>";
        } else if ( $elephant == true ) {
          // If true, run this, if false do nothing
          echo "<p>There is an elephant!</p>";
        } else {
          // If false run else code
          echo "<p>There are no elephants!</p>";
        }

        if ( $elephant == true && $name == "Dumbo" && $can_fly == true):
          // If true, run this, if false do nothing
          echo "<p>There is an elephant named Dumbo who can fly!</p>";
        elseif ( $elephant == true && $name == "Dumbo"):
          // If true, run this, if false do nothing
          echo "<p>There is an elephant named Dumbo!</p>";
        elseif ( $elephant == true ):
          // If true, run this, if false do nothing
          echo "<p>There is an elephant!</p>";
        else:
          // If false run else code
          echo "<p>There are no elephants!</p>";
        endif;

        // 1.6 Switch Statements

        // Switch statements are used to check one variable which could have many values
        switch ($name) {
          case 'Dumbo':
            echo '<p>Hi Dumbo!</p>';
          break;
          case 'Babar':
            echo '<p>Hi Babar!</p>';
          break;
          case 'Horton':
            echo '<p>Hi Horton!</p>';
          break;
          default:
            echo '<p>Who is this?</p>';
        }

        switch ($name):
          case 'Dumbo':
            echo '<p>Hi Dumbo!</p>';
          break;
          case 'Babar':
            echo '<p>Hi Babar!</p>';
          break;
          case 'Horton':
            echo '<p>Hi Horton!</p>';
          break;
          default:
            echo '<p>Who is this?</p>';
        endswitch;

        // 1.7 Try Catch Statements
        // Try catch statements are used to customize error messages so that they are phrased in a way that your useer will understand the problem
        // Try catch statements try to run some code
        try {
          // Inside you would specify certain conditions under which error messages should be thrown

          if ($can_fly == false) {
            throw new Exception('Dumbo can not fly!');
          }
        } catch (Exception $e) {
          // The errors messages are then "caught" and sent to the catch statement where you specify how you want the errors messages to be shown
          // The getMessage() function is a preset function which is store in our $e parameter
          echo $e->getMessage();
        }

        // 2. Arrays
        // 2.1 Basic Arrays
        $fruits = ['apple', 'banana', 'pear', 'peach', 'grapes'];
        $fruits2 = array('apple', 'banana', 'pear', 'peach', 'grapes');

        // You can not echo out arrays
        // Instead you must use var_dump() to test them
        var_dump($fruits);

        // To select a single array item write the variable and then in square braces, the index number
        // Lists start at index 0
        echo $fruits[1];

        // 2.2 Associative Arrays
        // An associative array is a way of creating an array with labels for all list items
        // The labels are referred to as "keys"
        // Asssociative arrays use the => arrows
        // Technically EVERY array in PHP is an associtive array
        // If you don't specify a key, the key is an index number
        $elephant = array(
          'name' => 'Dumbo',
          'age' => 3
        );

        var_dump($elephant);

        // To select items from associative arrays write the variable name and then, in square brackets write the name of the key
        echo '<p>' . $elephant['name'] . ' is ' . $elephant['age'] . ' years old!</p>';

        $elephants = array(
          array(
            'name' => 'Dumbo',
            'age' => 3
          ),
          array(
            'name' => 'Babar',
            'age' => 60
          ),
          array(
            'name' => 'Horton',
            'age' => 24
          )
        );

        var_dump($elephants);

        // To get data from a nested array just keep adding square braces
        echo '<p>' . $elephants[1]['name'] . '</p>';

        // The count() function is used to count array items
        echo count($elephants); // 3

        // 3. Loops

        // 3.1 For Loops
        // For loops repeat the same action for x times
        for ($iteration = 0; $iteration < count($fruits); $iteration++) {
          echo '<p>' . $fruits[$iteration] . '</p>';
        }

        // Loops can also be bracketless
        for ($iteration = 0; $iteration < count($fruits); $iteration++):
          echo '<p>' . $fruits[$iteration] . '</p>';
        endfor;

        // 3.2 For Each Loops
        // Foreach loops repeat the same action for each item in a set of items
        foreach ($elephant as $key => $value) {
          echo '<p>' . $value . '</p>';
        }

        foreach ($elephant as $key => $value):
          echo '<p>' . $value . '</p>';
        endforeach;

        // 3.3 While Loops
        // While loops will check for a condition and continue to loop through the code while the condition remains true
        $iteration = 0;
        // While this is true, run this code
        while ($elephants[$iteration]['age'] < 60) {
          echo '<p>' . $elephants[$iteration]['name'] . ' is young</p>';
          $iteration++;
        }

        $iteration = 0;
        // While this is true, run this code
        while ($elephants[$iteration]['age'] < 60):
          echo '<p>' . $elephants[$iteration]['name'] . ' is young</p>';
          $iteration++;
        endwhile;
        
        // 3.4 Do While Loops
        // Do while loops are very similar to while loops but check the condition at the end of each iteration instead of the beginning
        $iteration = 0;
        // While this is true, run this code
        do {
          echo '<p>' . $elephants[$iteration]['name'] . ' is young</p>';
          $iteration++;
        } while ($elephants[$iteration]['age'] < 60);
        // This means, the code being looped always runs at least once regardless of whether the condition is true
      ?>
    </div>

    <footer>
      <?php
      // 4. Functions

      // 4.1 Defining Functions
      // Functions are like mini programs
      // They allow us to save code in chunks which can be used and reused
      function flying_elephant($elephant_name = "Dumbo") {
        echo "<p>{$elephant_name} is flying!</p>";
      }

      // 4.2 Parameters
      // Parameters allows us to change the way functions work by acting like variables which only exist inside of the function
      // They act as placeholders for real values which will be added once the function is called
      // Parameters can have default values set as a fallback in case no value is set when function is called

      // 4.3 Calling Functions
      // Functions do not actually do anything until we call them

      flying_elephant(); // If nothing, Dumbo is flying!
      flying_elephant("Babar"); // Babar is flying!

      // 4.4 Premade Functions
      // The date() function gets the date
      ?>
      <p class="text-center"><small>Copyright <?php echo date('Y') ?> Someone</small></p>
      <?php
      // isset() checks if a value is set or null
      $a_null_value = null;

      // If a value is null it will return false
      var_dump(isset($a_null_value)); // false

      $a_set_value = 'This value is set!';
      
      var_dump(isset($a_set_value)); // true

      // If we add an ! in front of it then it will return true if the value is NOT set
      var_dump(!isset($a_set_value)); // false

      // empty() checks if a value empty
      // This means that it will return true for null values
      var_dump(empty($a_null_value)); // true

      // It will ALSO return true if a string is empty
      $an_empty_value = '';

      var_dump(empty($an_empty_value)); // true

      // If a string is full it will return false
      $a_full_value = 'This is full!';

      var_dump(empty($a_full_value)); // false

      var_dump(!empty($a_full_value)); // true

      // String Manipulation
      // Change ALL characters to lowercase
      echo '<p>' . strtolower("AN UPPERCASE STRING") . '</p>';
      
      // Change ALL characters to uppercase
      echo '<p>' . strtoupper("a lowercase string") . '</p>';
      
      // Capitalize the first letter of every word
      echo '<p>' . ucwords("a lowercase string") . '</p>';
      
      // Capitalize the first letter of the string
      echo '<p>' . ucfirst("a lowercase string") . '</p>';

      // 4.4 Combinging Functions
      // Functions can be called inside other functions and can even call themselves

      // Sanitizing Form Data
      // Hackers could insert HTML or JavaScript code into a form and hijack it
      // To prevent this it is important to sanitize form data before displaying it

      // Function to sanitize any form data we use
      function sanitize_string($string, $special_characters) {
        // Remove white space from the beginning and end of the string
        $string_trim = trim($string);
        // TRY to strip HTML tags from user input to avoid hacking
        // This function MAY miss some things
        $string_strip_tags = strip_tags($string_trim);
        // Remove these special characters and replace them with an empty string
        $string_remove_chars = preg_replace($special_characters, '', $string_strip_tags);
        // Convert any remaining HTML or special characters into plain text
        $string_sanitized = htmlspecialchars($string_remove_chars, ENT_QUOTES, 'UTF-8');
        // Export sanitized string
        return $string_sanitized;
      }

      // Formatting form data

      function format_name($name) {
        // Change ALL characters to lowercase
        $name_lowercase = strtolower($name);
        // Capitalize words
        $name_capitalized = ucwords($name_lowercase);
        // Export formatted string
        return $name_capitalized;
      }

      $processed_name = format_name(sanitize_string('<p>dUmBo@#$%^&</p>', '/([<>!@#$%^&])/'));

      echo $processed_name;
      ?>
    </footer>
  </body>
</html>
