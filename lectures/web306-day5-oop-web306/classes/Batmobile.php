<?php
/**
 * 5. Creating Child Classes
 * 
 * We can create child classes which inherit all of the properties and methods of the parent
 * Child classes should represent subcategories of a class which would share all the
 * properties/methods of that class but introduce some unique ones
 */
class Batmobile extends Car {
    /**
     * Inheriting Parent Properties and Methods
     * 
     * All public and protected properties and methods of the parent class are automatically
     * inherited by the child class
     * 
     * You would also want to declare any properties which you want to be inherited into the child class as protected in the parent class instead of private
     * 
     * You would declare any new properties which are unique to the child class in the child
     */
    private $bat_tech;

    /**
     * This class would have its own __construct() method which would overrid the parent method
     * 
     * Polymorphism describes a scenario where a child class has a method with the same name as a method from the parent class and overrids that method to behave in a different way
     * 
     * Our child constructor will have the same parameters as the parent class, but could have additional parameters
     */
    public function __construct($bat_array) {
        /**
         * 7. The parent Keyword
         * 
         * The parent keyword acts as a placeholder for the parent class
         * 
         * This means that we can use it to access properties and methods of the parent class
         * 
         * This includes the parent class' __construct() constructor method which we can use to define
         * the parameters of the child method
         * 
         * When we define those parameters, they will then set the properties of the object to map to the parameters as specified in the parent class' __construct() method
         */
        parent::__construct($bat_array);

        $this->set_bat_tech($bat_array['bat_tech']);
    }

    /**
     * 8. Polymorphic Methods
     * 
     * Plymorphism allows us to use the same methods to achieve different results depending on the context
     */

    public function set_image(string $value) {
        $image_names = ['batmobile.gif', 'tumbler.gif', 'animated.gif', 'lego.gif'];

        $this->image = parent::filter_file($value, $image_names);

        if (empty($this->image)) {
            $this->image = $image_names[0];
        }
    }

    public function set_honk(string $value) {
        $mp3_names = ['holy.mp3', 'lego.mp3'];

        $this->image = parent::filter_file($value, $mp3_names);

        if (empty($this->honk)) {
        $this->honk = $mp3_names[0];
        }
    }

    public function get_bat_tech() {
        return $this->bat_tech;
    }

    public function set_bat_tech(string $value) {
        $this->bat_tech = parent::filter_input($value);
    }
}