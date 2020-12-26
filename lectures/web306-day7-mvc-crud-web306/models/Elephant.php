<?php
/**
 * The first thing we need to do to create an MVC app is create a class for our Model which will represent the data we using in our app.
 * 
 * We will be making an elephant database so we will make an Elephant class.
 * 
 * We will want to do sanitization for our properties so we will require the Sanitizer class we made earlier.
 */

require '../utilities/Sanitizer.php';

class Elephant {
    protected $name;
    protected $age;
    protected $image;
    protected $image_files = [
        'bananas.jpg',
        'beach.jpg',
        'big-ball.jpg',
        'birds.jpg',
        'dog.jpg',
    ];

    // In order to keep our properties encapsulated we will want to use private or protected properties with getters and setters
    public function __construct(array $input_values) {
        $this->set_name($input_values['name']);
        $this->set_age($input_values['age']);
        $this->set_image($input_values['image']);
    }

    // The __get() magic method is used as a universal getter method which gets the value of any private or protected property. Like the __construct() method it is not necessary to call the __get() magic method so you can use private and protected properties as if they are public.

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    // There is also a __set() magic method but we won't use it as we want to do unique sanitization and validation for each of our  propeties using setter methods.
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