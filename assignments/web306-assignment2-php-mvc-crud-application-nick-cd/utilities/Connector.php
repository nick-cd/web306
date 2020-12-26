<?php

/**
 * Singleton connection class
 */

include_once 'vendor/autoload.php';

class Connector {
    private static $connection = null;
    private $pdo = null;

    private function __construct($db_host, $db_user, $db_password, $db_name) {
        $this->pdo = new PDO(
            'mysql:host=' . $db_host .
            ';dbname=' . $db_name,
            $db_user,
            $db_password,
            // https://stackoverflow.com/questions/8992795/set-pdo-to-throw-exceptions-by-default#8992933
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            )
        );
    }

    public static function get_connection() {
        if(self::$connection == null) {
            // https://blog.programster.org/php-dotenv
            $dotenv = new Symfony\Component\Dotenv\Dotenv();
            // https://stackoverflow.com/questions/8668776/get-root-directory-path-of-a-php-project#8668853
            $dotenv->load($_SERVER['DOCUMENT_ROOT'] . '/.env');
            self::$connection = new Connector($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
        }
        return self::$connection;
    }

    public function get_pdo() {
        return $this->pdo;
    }
}
