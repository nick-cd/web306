<?php
/**
 * 5. Advanced Classes
 * 
 * Most classes would allow for the properties of the class to be dynamically defined each time an instance of the class os created instead of hardcoding values into the class.
 * 
 */
class Car {
    /**
     * 6. Property Scope
     * When defining a property you would only give it a value if it will be constant and never change
     * Otherwise it is just way of defining the scope and the name of the property and the value would be defined at a later point
     * 
     * Properties are given a scope of either public, private or protected
     * A public property is a property which can be accessed outside of a class
     */
    public $name;
    public $driver;
    public $image;
    public $honk;
    public $top_speed;
    /**
     * A private property is a property which can only be accessed inside of a class
     */
    private $current_speed;
    /**
     * A protected property is only accessible in the current class, as well as parent and child classes of the class
     * 
     * Propeties are almost always private or protected
     */
    protected $gas;
    /**
     * 7. Method Scope
     * Like propeties methods also have a scope which is defined as either public, private or protected to determine whether they can be accessed outside of a class or not
     * 
     * Methods are much more likely to be public
     * 
     * 8. Magic Methods
     * 
     * Magic methdos are methdos that perform special actions automatically
     * All magic methods are named with two underscores before the function name so avoid nameing your own methods using this practice
     * 
     * There are many magic methods but one is more important than the rest
     * 
     * 9. The Constructor Method
     * Most classes will have a type of magic method which is known as a constructor method and is called __construct()
     * 
     * This magic method is used to defined the properties of a new instance of a class which results in an object
     * 
     * It uses parameters to define the properties of the class and runs automatically whenever a new instance of the class is created.
     * 
     * This class will have a public __construct() method which is going to take a parameter which will be defined by an array
     */
    public function __construct($some_array) {
        /**
         * 10. The $this Variable
         * PHP uses a variable called $this which acts as a placeholder for an instance of this class
         * The -> arrow is used to define and access properties and methods of $this
         */
        $this->name = $some_array['name'];
        $this->driver = $some_array['driver'];
        $this->image = $some_array['image'];
        $this->honk = $some_array['honk'];
        $this->top_speed = $some_array['top_speed'];
        // We can also set specific values for properties for every instance of this object and all objects will start with those properties until they are redefined
        $this->current_speeed = 0;
        $this->gas = 100;
    }

    /**
     * 11. Additional Methods
     * We can create as many additional methods for our class as we like
     */
    public function start($speed) {
        /**
         * Because we defoined our object's properties earlier we can use them in our secondary methods
         * We can also redefined previously defined properties to have new values
         */
        if ($speed > 0 && $speed < $this->top_speed) {
            $this->current_speed = $speed;
        } else if ($speed < 1) {
            $this->current_speed = 1;
        } else if ($speed > $this->top_speed) {
            $this->current_speed = $this->top_speed;
        }
    
        // Set the gas to $gas minus 10
        $this->gas = $this->gas - 10;
    
        // Display the Car's current speed and the amount of gas
        echo '<p><span class="fa fa-tachometer-alt"></span> ' . $this->current_speed . ' <span class="fa fa-battery-half"></span> ' . $this->gas . '</p>';
        // Display an image of the Car driving
        echo '<p><img src="img/start/' . $this->image . '" alt="' . $this->name . '"></p>';
    }
}