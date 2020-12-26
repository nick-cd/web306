<?php
/**
 * Utility classes or helper classes are classes which are used as libararies for grouping related methods and properties together to be used by other classes or sometimes client code.
 * 
 * These are normally classes which contain only static properties and methods which are known as "static classes." Static classes would be used when you have a class which is used fiarly commonly accross your program by other classes or outside code but is not reliant on an isntance of a class.
 * 
 * You would want to use static classes somewhat sparingly outside of utility classes.
 * 
 * To keep things more organized and to keep responsibilities seperated, we're going to keep our filtering and santization methods in a seperate class.
 */
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
