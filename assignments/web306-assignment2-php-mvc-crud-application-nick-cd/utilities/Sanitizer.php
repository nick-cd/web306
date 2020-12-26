<?php

// https://www.dreamhost.com/blog/php-security-user-validation-sanitization/

class Sanitizer {

    // https://www.php.net/manual/en/features.file-upload.errors.php
    // Helpful array created by user Viktor
    // There does not seem to be a built-in function to return an error message based on an error code
    private static $err = array(
        '1' => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        '2' => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        '3' => 'The uploaded file was only partially uploaded',
        '4' => 'No file was uploaded',
        '6' => 'Missing a temporary folder',
        '7' => 'Failed to write file to disk.',
        '8' => 'A PHP extension stopped the file upload.',
    );

    private static function sanitize($var) {

        // https://www.php.net/manual/en/class.invalidargumentexception.php
        if(!isset($var))
            throw new InvalidArgumentException($fieldname . ' is required!');

        // https://www.php.net/manual/en/filter.filters.sanitize.php
        // NOTE: filter_input never trims
        $var = trim($var);

        // strip tags + removal of characters < 32 and > 127 in the ASCII table
        $var = filter_var($var, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);

        return $var;
    }

    public static function sanitize_string($str) {
        return ucwords(strtolower(self::sanitize($str)));
    }

    public static function sanitize_url($url) {
        $url = self::sanitize($url);

        $url = filter_var($url, FILTER_SANITIZE_URL);

        // TODO: possibly verify the link is actually valid
        
        return $url;
    }

    public static function validate_image($img) {

        // https://www.php.net/manual/en/function.image-type-to-mime-type.php
        // https://www.thesoftwareguy.in/single-multiple-image-validation-and-upload-in-php/
        if($img['name'] === "" || $img['error'] <> 0)
            throw new InvalidArgumentException('Error uploading image: ' . self::$err[$img['error']]);

        // https://www.php.net/manual/en/function.strpos.php
        if (strpos($img['type'], 'image/') === false)
            throw new InvalidArgumentException('File is not an image!');

    }

    public static function filter_number($number) {
        // Useful reference
        // https://www.youtube.com/watch?v=r3EtWLhiSvI
        $filter_int = filter_var($number, FILTER_SANITIZE_NUMBER_INT);

        if(empty($number) || !filter_var($filter_int, FILTER_VALIDATE_INT))
            throw new InvalidArgumentException('Invalid number');

        return (int) $filter_int;
    }

    // Used before displaying data to the user
    public static function escape_html($string) {
        // Convert to UTF-8 encoding to ensure we do not miss any unwanted characters
        $string = mb_convert_encoding($string, 'UTF-8', 'UTF-8');

        // Escape html characters such as: '"<>&
        // recommended by: https://www.esecurityplanet.com/browser-security/prevent-web-attacks-using-input-sanitization.html
        $string = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);

        return $string;
    }

}