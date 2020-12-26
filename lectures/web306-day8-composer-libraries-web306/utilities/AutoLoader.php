<?php
/**
 * Autoloading
 * 
 * In order for our namespaces to work we need to create a class with a method which will ensure that whenever create a new object our object's class will be automatically loaded ino a given file so that we don't need to require it.
 * 
 * This class will be a singleton so it will need to define a private static variable which is set to null.
 */
class Autoloader {
    private static $loader = null;

    public static function class_loader($namespace_class_name) {
        /**
         * We're going to take our namespace and our class name and convert them into a file path.
         * 
         * Use the str_replace() function to replace the backslashes \ in our namespace and class name with forward slashes so that we can convert our namespace into a file path.
         * 
         * Then concatenate .php onto the end to complete the file name.
         */
        $class_path = str_replace('\\', '/', $namespace_class_name) . '.php';
        /**
         * Use the realpath() function and use __DIR__ concatenated with '/../' in order to get the absolute (full) path name of our current file and go up one directory level to the root.
         * 
         * Then concatenate that with $class_path.
         */
        $full_class_path = realpath(__DIR__ . '/..') . '/' . $class_path;

        /**
         * We will then check to see if the corresponding PHP file exists and if so, require $full_class_path.
         */
        if (file_exists($full_class_path)) {
            require $full_class_path;
        }
    }

    /**
     * Because this is a singleton, we need a get_loader() method which creates a new instance of the class and returns it.
     */
    public static function get_loader() {
        if (self::$loader == null) {
            self::$loader = new Autoloader();
        }
        /**
         * Unlike our previous singleton, in order to have this class automatically load our classes it is necessary to use the spl_autoload_register function before returning the instance.
         * 
         * This function takes an array as the first parameter which holds the class name of an autoloading method we want to call, followed by the method name.
         */
        spl_autoload_register(array('Autoloader', 'class_loader'), true, false);
        /**
         * The second and third parameters are boolean values. The first specifies whether the function should throw exceptions (errors) if the class_loader() method can not be registered and should be set to true.
         * 
         * The second specifies that this autoloader method should be moved to the top of the queue if there are multiple autoloaders and should beset to false as we will want this autoloader to come after another autoloader we will be importing.
         */
        return self::$loader;
    }
}