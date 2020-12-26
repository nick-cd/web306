<?php
/**
 * 1. Classes
 * 
 * All objects are defined by a structure called a class
 * 
 * PHP class names are frequently capitalized using PascalCase
 * It is convention to give classes a dedicated file and to name the file after the class, using the exact same name as the class, including casing
 * 
 * It is also common to store PHP classes in a /classes folder but there are many folder structure conventions for classes depending on the context
 * 
 * Class files are treated like include files - they do not require a closing PHP tag and only include PHP code
 */
class Phone {
    /**
     * 2. Properties
     * Objects map data in key/value pairs known as properties which are variables that are defined inside of a class
     * 
     * You must write a keyword such as public before property names to define the scope of the property.
     */
    public $name = "Samsung Galaxy A7";
    public $os = "Android 8.0";
    public $weight = 168;
    public $memory = 128;

    /**
     * 3. Methods
     * Classes can perform actions which are represented by functions that are defined inside of a class and are called methods.
     */
    function call($contact) {
        echo '<h2>Calling ' . ucwords($contact) . '...</h2>';
        echo '<audio autoplay><source src="audio/call/' . strtolower($contact) . '.mp3"></audio>';
        echo '<img src="img/call/' . strtolower($contact) . '.gif" alt="' . ucwords($contact) . '">';
    }
}