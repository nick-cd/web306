<?php
/**
 * 1. Using Encapsulation and Abstraction in Classes
 * 
 * We can use encapsulation and abstraction in order to make our Car class more effecient
 */
class Car {
  /**
   * Private and protected property/method scope can keep our code more object-oriented by keeping the
   * data encapsualted inside of the object and to keep the processing of that data abstracted
   * from the user.
   * 
   * You would use private properties/methods for things you don't want the user to have direct access to
   */
  protected $name;
  protected $driver;
  protected $image;
  protected $honk;
  protected $top_speed;
  protected $current_speed;
  protected $gas;
  /**
   * 2. The static Keyword
   * 
   * Static properties aka "class properties," are properties which can be accessed without creating a new instance of a class
   * These propreties cannot be accesed from objects and are instead accessed using the class name itself
   */
  protected static $chars = '/([!@#$%^&*()[]{}<>:;])/';
  protected static $name_chars = '/([!@#$%^&*()[]{}<>:;0123456789])/';

  public function __construct($some_array) {
    $this->set_name($some_array['name']);
    $this->set_driver($some_array['driver']);
    $this->set_image($some_array['image']);
    $this->set_honk($some_array['honk']);
    $this->set_top_speed($some_array['top_speed']);
    $this->current_speed = 0;
    $this->gas = 100;
  }

  /**
   * Static methods process data which is not dependant on the creation of an instance of the class
   * 
   * Unlike static properties, static methods can be access from either the class name itself or from individual objects.
   * 
   * However, because static methods are not associated with a specific instance of a class and hold the same data regardless of how they're access, they do not have access to the $this keyword.
   * 
   * 3. Sanitization and Validation Methods
   * 
   * Our user input needs to be sanitized
   * 
   * The following terms tend to be used interchangeably but are generally used to describe:
   * 
   * 1. Filtering: Removing potentially malicious characters from user input
   * 
   * 2. Escaping: Converting potentially malicious characters to their escape sequencce code
   *    < to &lt; or & to &amp; so that they are read as plain text, not code
   * 
   * 3. Validation: The act of checking user input to ensure that it has been filled out, is of the correct data type and mateches the authorized characters and values
   * 
   * 4. Sanitization: The act of using filtering, escaping and validation or a combination to ensure that
   * user input is not malicious, will not provoke unwanted results or unauthorized behavior
   * 
   * It is best practice to separate these processes and perform them at different stages
   * 
   * User input should be validated and filtered when it is collected from a superglobal and escaped when it is retrieved from the database or file and displayed
   */
  public static function filter_input($string, $special_chars = '//') {
    // trim() removes space from beginning and end of string
    $trim_space = trim($string);
    $strip_tags = strip_tags($trim_space);
    $remove_chars = preg_replace($special_chars, '', $strip_tags);
    return $remove_chars;
  }

  /**
   * Because static properties and methods do not rely on an instance of the class, they are not access from objects, or the $this keyword, but the classname itself, when outside of a class.
   * 
   * When inside of a class the self keyword is used. The self keyword is equivalent to $this but in reference to the class name. The class name or self keyword is then followed by the scope resolution operator ::
   * 
   * This is comparable to the -> arrow which is used with instantiated classes.
   */

  public static function format_name($name) {
    $filtered = self::filter_input($name, self::$name_chars);
    $lowercase = strtolower($filtered);
    $capitalized = ucwords($lowercase);
    return $capitalized;
  }

  public static function filter_file($input_file, $files_array) {
    $filtered = self::filter_input($input_file, self::$chars);
    $file_name = strtolower($filtered);

    foreach ($files_array as $item_name) {
      if ($item_name == $file_name) {
        return $file_name;
      }
    }
  }

  public static function filter_number($number) {
    // Remove all characters except for numbers and arithmamtic operators
    $filter_int = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    // Convert the string into an integer
    return (int) $filter_int;
  }

  public static function escape_html($string) {
    // Convert all characters to the UTF-8 character set
    $convert_charset = mb_convert_encoding($string, 'UTF-8', 'UTF-8');
    $encode_html = htmlspecialchars($convert_charset, ENT_QUOTES, 'UTF-8');
    return $encode_html;
  }

  /**
   * 4. Getters and Setters
   * If we are following the encapsulation and abstraction principles strictly
   * and have made all of our properties private or protected then that means
   * that we can not currently access or alter any of them outside of the class
   * 
   * This is the goal of encapsulation and abstraction as it means that the data ca not
   * be directly altered by the user and they can not use it incorrectly
   * 
   * Sometimes it is necessary to allow users to access and alter properties outside of
   * our class
   * 
   * The common solution to this is to create methods which are dedicated to accessing and
   * defining properties
   * 
   * These are called getters (accessing) and setters (setting/defining properties)
   */
  public function get_name() {
    return $this->name;
  }

  public function set_name(string $value) {
    $this->name = self::format_name($value);
  }

  public function get_driver() {
    return $this->driver;
  }

  public function set_driver(string $value) {
    $this->driver = self::format_name($value);
  }

  public function get_image() {
    return $this->image;
  }

  public function set_image(string $value) {
    $image_names = ['car.gif', 'homer.gif', 'mcqueen.gif', 'studebaker.gif'];

    $this->image = self::filter_file($value, $image_names);

    if (empty($this->image)) {
      $this->image = $image_names[0];
    }
  }

  public function get_honk() {
    return $this->honk;
  }

  public function set_honk(string $value) {
    $mp3_names = ['honk.mp3', 'homer.mp3', 'kermit.mp3', 'wow.mp3'];

    $this->image = self::filter_file($value, $mp3_names);

    if (empty($this->honk)) {
      $this->honk = $mp3_names[0];
    }
  }

  public function get_top_speed() {
    return $this->top_speed;
  }

  public function set_top_speed($value) {
    if (is_numeric($value)) {
      $this->top_speed = (int) $value;
    } else {
      $this->top_speed = self::filter_number($value);
    }
  }

  /**
   * Private or protected methods would be used for internal data processing within a class
   * in the case of private methods, or a class hierarchy in the case of protected ones
   * 
   * They are good for repeated code inside of a class
   */
  protected function dashboard() {
    // Display the Car's current speed and the amount of gas
    echo '<p><span class="fa fa-tachometer-alt"></span> ' . $this->current_speed . ' <span class="fa fa-battery-half"></span> ' . $this->gas . '</p>';
  }

  protected function show($folder) {
    // Display an image of the Car driving
    echo '<p><img src="img/' . $folder . '/' . $this->image . '" alt="' . $this->name . '"></p>';
  }

  public function start($speed) {
    // Set the current speed of this car to a value between 1 and the $top_speed
    if ($speed > 0 && $speed < $this->top_speed) {
      $this->current_speed = $speed;
    } else if ($speed < 1) {
      $this->current_speed = 1;
    } else if ($speed > $this->top_speed) {
      $this->current_speed = $this->top_speed;
    }

    // Set the gas to $gas minus 10
    $this->gas = $this->gas - 10;

    $this->dashboard();
    
    $this->show('start');
  }

  // Let's create a method to honk the horn
  public function honk() {
    // Echo an audio tag set to autoplay with a source tag with a src attribute
    // which is set to the value of $honk
    echo '<audio autoplay><source src="audio/honk/' . $this->honk . '"></audio>';
  }

  // Let's create a method to make the Car do doughnuts
  public function doughnuts() {
    // Set the current speed to the top speed
    $this->current_speed = $this->top_speed;
    // Set the gas to the gas minus 20
    $this->gas = $this->gas - 20;

    $this->dashboard();
    
    $this->show('doughnuts');
  }

  // Let's make a method to fill up our Car's gas
  public function fill_up() {
    // Stop the car by setting the current speed to 0
    $this->current_speed = 0;
    // Set the gas back to 100
    $this->gas = 100;

    $this->dashboard();
  }
}
