<?php
/**
 * Abstract Classes
 * 
 * Abstract classes are classes which are not supposed to be and cannot be instantiated, meaning that you can not create a new instance of them.
 * 
 * Abstract classes are used as parent classes which would have child classes extended fro them.
 * 
 * THose child classes could then be instantiated.
 */
namespace Models;

use Utilities\Connector;

abstract class Model {
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}