<?php
namespace Models;

/**
 * Now that we have created our namespace, we can use it by using the use keyword, followed by the name of our namespace name.
 * 
 * In order for our namespace to work, we still need to require our class file.
 * 
 * You might be thinking that this is actually less convenient than before, and you would be right.
 * That's why people do what is called "autoloading" and create class which automatically loads all of their classes into their files when a new object of that class is created.
 */

use \Utilities\Sanitizer;
use \Models\Model as BaseModel;

class Elephant extends BaseModel {
  protected $name;
  protected $age;
  protected $image;
  protected $image_files = [
    'bananas.jpg',
    'beach.jpg',
    'big-ball.jpg',
    'birds.jpg',
    'dog.jpg',
    'feed.jpg',
    'massage.jpg',
    'peek.jpg',
    'run.jpg',
    'small-ball.jpg',
    'tub.jpg'
  ];

  public function __construct(array $input_values) {
    $this->set_name($input_values['name']);
    $this->set_age($input_values['age']);
    $this->set_image($input_values['image']);
  }

  public function set_name(string $value) {
    $this->name = Sanitizer::format_name($value);
  }

  public function set_age($value) {
    $this->age = Sanitizer::filter_number($value);
  }

  public function set_image(string $value) {
    $this->image = Sanitizer::filter_file($value, $this->image_files);
    if (empty($this->image)) {
      $this->image = $this->image_files[0];
    }
  }
}
