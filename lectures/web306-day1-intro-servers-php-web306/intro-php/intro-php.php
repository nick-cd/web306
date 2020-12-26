<!--
============================================================================
1. PHP Files and Tags
============================================================================

1.1 PHP Files ==============================================================
To use PHP with any HTML page, just resave that page as a .php file

1.2 PHP Tags ===============================================================
The biggest advantage of using PHP over other server-side languages is
that we can mix PHP code with our HTML code without using another
templating language

To use PHP we need to use special PHP tags in our HTML

PHP tags look like this:
-->
<?php
// These tags don't work like link tags for CSS
// We just insert them wherever we want our PHP in our HTML code

// You can write PHP code wherever you want!

// 1.3 PHP Comments ========================================================

// Inline PHP comments look like this and take up a single line

/*
Block PHP comments
look like this and can
take up multiple lines
*/

/*==========================================================================
2. Variables and Data Types
==========================================================================*/

// 2.1 Variables ===========================================================

// The $ symbol is used to define variables
$title = "Intro to PHP";

/*
Variable naming rules in PHP:
  1. Variable names must start with a letter or an underscore, not a number
  2. After the first character, characters can be either letters, numbers or underscores
  3. Variable names can only contain alpha-numeric characters and underscores (A-z, 0-9 and _)
  4. Names are case-sensitive: $some_variable, $SOME_VARIABLE and $Some_Variable
     are all different variables
  5. When naming variables in PHP there are two naming conventions which people
     tend to follow:
      Lower snake case: $snake_case_looks_like_this
      Lower camel case: $camelCaseLooksLikeThis
Snake case is most popular in PHP so that is what we will use
*/

// 2.2 Data Types ==========================================================

// There are 10 primitive data types in PHP
// However there are 7 common data types

// 1. String
// A string is a chunk of plain text with no predefined meaning

// 1.1 Double Quoted Strings
// Strings are defined using quotes
$description = "A description for this page.";
$body_margin = "0";
$body_font_family = "Arial, sans-serif";
$header_bg = "darkorchid";
$header_color = "white";
$header_padding = "50px";
$text_class = ".text-center";

// 1.2 Single Quoted Strings
// You can also write strings with single quotes
$name = 'Tim';
// We can insert HTML into strings
$some_html = '<p class="text-center">Hello World!</p>';
// One difference between using double or single quotes is that
// you can use single quotes/apostrophes inside of double quoted strings and
// double quotes inside of single quoted strings
// PHP developers usually use single quotes for strings
// because there are so many double quotes in HTML

// 1.3 Escaping Characters
// The backslash can be used to escape special characters in strings to ensure
// that they are read as part of the string instead of being read as code
// The most common example of this would be when you need to use the same type
// of quotes inside of your quotes without ending a string
$double_quotes = "This is how you ignore \"double quotes\"";
$single_quotes = 'That\'s how you\'d ignore single quotes';

// 2. Integer
// Whole numbers are called integers
// Numbers are only read as integers if they are outside of quotes
// Otherwise they would be considered strings
$age = 24;

// 3. Float
// Numbers with decimals are their own data type called floats
$average = 4.365;

// 4. Boolean
// Booleans are just a way of creating switches that can turn settings on or off
// They can only be either true or false
$teaching = true;
$on_break = false;

// 5. Array
// Arrays are lists of multiple types of data which are stored in 1 variable
// They are written as comma separated lists
// Defined using []
$data_list = [$age, $average, $teaching]; // Array items can be different types

$data_list = array($age, $average, $teaching); // Array items can be different types

// 6. Objects
// We will have a whole class on these!

// 7. Null
// A null is a totally empty and meaningless value
// A null either hasn't been set yet or indicates an empty state or something not applicable
$nothing = null;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- PHP can be used in the title tag -->
    <title><?php echo $title ?></title>
    <!-- PHP can be used in meta tags -->
    <meta name="description" content="<?php echo $description ?>">
    <style media="screen">
      body {
        margin: <?php echo $body_margin; ?>;
        font-family: <?php echo $body_font_family; ?>;
      }
      header, footer{
        /* You can even use PHP in style tags */
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

    <div class="container">
      <?php
      // 3. Testing and Displaying Data

      // echo is how we insert data into HTML with PHP
      echo $name;

      // If we echo strings with HTML then it will be read as HTML
      echo $some_html;

      // var_dump() is a function for testing variables
      var_dump($name);
      var_dump($age);

      // 4. Concatenation, Interpolation and Operators
      // Concatenation is the act of linking data together in a series
      // We can strings and connect them together with other strings, variables etc.
      // In PHP concatenation is done with the . symbol
      echo '<p class=text-center">Hello ' . $name . '</p>';
      
      // Interpolation is the insertion of data into other data
      // You MUST use double quotes for strings in order to use interpolation in PHP
      // In order to interpolate variables into strings we need to wrap them in {}
      echo "<p class=\"text-center\">Hello {$name}</p>";

      // Arthmetic Operators
      echo 5 + 2; // addition
      echo 5 - 2; // subtraction
      echo 5 * 2; // multiplication
      echo 5 / 2; // division
      echo 5 % 2; // modulus: devide two numbers and give the remainder

      // The Concatenation Operator
      // The concatenation operator is used to assign the value of a variable as whatever the variable was previously with a new value concatenated onto the end
      $last_name = ' Lai';

      $name .= $last_name;

      echo '<p>' . $name . '</p>';
      ?>
    </div>
  </body>
</html>
