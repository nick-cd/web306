<?php
namespace Utilities;

/**
 * We will import our database credentials into the Connector class.
 * In order to do so we need to use the \Dotenv namespace to access the Dotenv class
 * 
 * Now that we are using autoloading it is also necessary for us to import PDO
 */

use \Dotenv\Dotenv;
use PDO;

class Connector {
  private static $instance = null;
  // We will create a new private property to hold our Dotenv object
  private $dotenv;
  private $pdo;
  private $host;
  private $name;
  private $user;
  private $password;

  private function __construct() {
    $this->dotenv = new Dotenv(__DIR__ . '/../');
    $this->dotenv->load();

    $this->host = getenv('DB_HOST');
    $this->name = getenv('DB_NAME');
    $this->user = getenv('DB_USER');
    $this->password = getenv('DB_PASSWORD');

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
