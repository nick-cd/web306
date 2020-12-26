<?php
/**
 * Namespaces
 * 
 * Classes and objects are frequently used in third-party libraries because they allow code to be very modular, intuitive expandable and flexible due to OO principles. This presents a challenge because many libraries and projects need to use similar classes which could very easily have the same class names.
 * 
 * For instance, there are likely many libraries with classes like Database, Model, Controller etc.
 * 
 * In the case of a Car class, ther could be a database of vehicles whih might need a class for a Road Car and a Rail Car and they might conflict. People used to deal with t his by giving their class names a prefix to diffrentiate them like Road_Car and Rail_Car but this creates longer, more complex class names which are ugly and there's no way to predict what class names other developers might use.
 * 
 * PHP introduced a concept called "namespaces" to address these issues.
 * 
 * Namespaces are like file paths but aren't directly correclated with a file's path relative to a give file. They are used to give classes unique "vitual" addresses which can be used to access them.
 * 
 * To define a namespace, use the namespace keyword, followed by the name of your class' namespace.
 * 
 * Depending on how complex the needs of your project are or the number of libraries you use, you might have one or more sub-namespaces as well. To separate sub-namespaces from another namespace, use the backslash \.
 * Even though namespaces don't directly mirror file paths, it is still necessary for our class to be stored in a folder structure which roughly mirrors our namespace. The namespace MUST be the first line in your class file.
 */
namespace Utilities;

class Sanitizer {
  private static $name_chars = '/([^a-zA-Z\-. ]+)/';
  private static $file_chars = '/([^a-zA-Z0-9\-_.]+)/';

  public static function filter_input($string, $special_chars = '//') {
    $trim_space = trim($string);
    $strip_tags = strip_tags($trim_space);
    $remove_chars = preg_replace($special_chars, '', $strip_tags);
    return $remove_chars;
  }

  public static function format_name($name) {
    $filtered = self::filter_input($name, self::$name_chars);
    $lowercase = strtolower($filtered);
    $capitalized = ucwords($lowercase);
    return $capitalized;
  }

  public static function filter_file($input_file, $files_array) {
    $filtered = self::filter_input($input_file, self::$file_chars);
    $file_name = strtolower($filtered);

    foreach ($files_array as $item_name) {
      if ($item_name == $file_name) {
        return $file_name;
      }
    }
  }

  public static function filter_number($number) {
    $filter_int = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    return (int) $filter_int;
  }

  public static function escape_html($string) {
    $convert_charset = mb_convert_encoding($string, 'UTF-8', 'UTF-8');
    $encode_html = htmlspecialchars($convert_charset, ENT_QUOTES, 'UTF-8');
    return $encode_html;
  }
}
