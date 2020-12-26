<?php
/**
 * A singleton class is another type of utility class which is similar to a static class in that you do not need to create a new instance of the class every time you use it.
 * 
 * However, a singleton class does require an instance of a class. What makes a single class differemt is that a new instance of a class is defined with a private constructor method and is only defined once, inside of the class itself. This instance is then stored in a static property and static getter methods are used to access it.
 * 
 * The advantage of using singletons is that an object which needs to be referenced many times only needs to be instantiated once, which improves performance. Singletons are frequently used to connect to databases to avoid creating multiple database connections unnecessarily. We will create a singleton clas to connect to our database using PDO.
 * 
 * Our application will use a database table with two colimns. The first will be named "id" and will be an INT which will be set to AUTO_INCREMENT and will be defined as our PRIMARY KEY. The second column will hold serialized, encoded PHP objects and will be a BLOB which is named "object."
 */
class Connector {
    private static $instance = null;
    private $pdo;
    private $host;
    private $name;
    private $user;
    private $password;

    private function __construct() {
        $this->host = "localhost";
        $this->name = "elephants";
        $this->user = "root";
        $this->password = ""; // If using MAMP, you must have password

        $this->pdo = new PDO(
            'mysql:host=' . $this->host .
            ';dbname=' . $this->name,
            $this->user,
            $this->password
        );
    }

    public static function get_instance() {
        if (self::$instance == null) {
            self::$instance = new Connector();
        }
        return self::$instance;
    }

    public function get_pdo() {
        return $this->pdo;
    }
}