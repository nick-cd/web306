<?php
/**
 * When working in an include file, it is not necessary to use a closing PHP tag and is even discouraged
 * 
 * 2. Variable Scope
 * Variable scope determines which parts of your code your variables can be accessed from
 * 
 * If you try to use a variable which is NOT available within thte current scope of a block of code, it will result in an error
 * 
 * Depending on where variables are declared they are given different scopes
 * 
 * There are 2 scopes: global and local
 * 
 * 2.1 Global Scope
 * Variables which are defined OUTSIDE of a function or other block of code have a global scope and by default, can only be accessed OUTSIDE of a function
 * 
 * Variables with global scope are acccessible accross required/include files as well
 */
$special_chars = '/([<>1@#$%^&])/';

/**
 * 2.2 Local Scope
 * Variables which are defined inside of a function have a local scope and can only be accessed inside of that function
 * 
 * Parameters of functions are also considered local
 */
function sanitize_string($string, $special_characters = null) {
    // Remove white space from the beginning and end of the string
    $string_trim = trim($string);
    // TRY to strip HTML tags from user input to avoid hacking
    // This function tries its best but might miss some stuff
    $string_strip_tags = strip_tags($string_trim);
    // Remove these special characters and replace them with an empty string
    $string_remove_chars = preg_replace($special_characters, '', $string_strip_tags);
    // Convert any remaining HTML or special characters into plain text
    $string_sanitized = htmlspecialchars($string_remove_chars, ENT_QUOTES, 'UTF-8');
    // Export sanitized string
    return $string_sanitized;
  }

  /**
   * 2.3 The global Keyword
   * The global keyword is used to allow functions to access global variables from within the function
   * 
   * To use it simply preface a variable with the keyword
   */
  function format_name($name) {
    // import global variable to function
    global $special_chars;

    $sanitized = sanitize_string($name, $special_chars);
    // Change ALL characters to lowercase
    $name_lowercase = strtolower($name);
    // Capitalize words
    $name_capitalized = ucwords($name_lowercase);
    // Export formatted string
    return $name_capitalized;
  }

  /**
   * 2.3 The static keyword
   * Normally after a function is executed its local variables are deleted from the program's memory
   * 
   * The static keyword is used when you want the value of a variable to be stored in the program's memory the next time the funcion is used
   */
  function counter() {
      static $x = 0;
      echo $x; // next time, 1
      $x++;
  }