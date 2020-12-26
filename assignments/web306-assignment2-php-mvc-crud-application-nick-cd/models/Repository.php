<?php

require '../utilities/Sanitizer.php';

class Repository {
    private $name;
    private $link;
    private $img;
    private $img_type; // Needed when displaying the image to the user

    // The client can optionally omit providing data from $_FILES
    // however it will expect that $_POST has 'img-orig' and 'type'
    // in its associative array
    public function __construct(array $data, array $files = null) {
        $this->set_name($data['name']);
        $this->set_link($data['link']);

        if($files !== null)
            $this->set_image($files['img']);
        else
            $this->set_image_contents($data);

    }

    // Subsequent modifier methods will call on the required
    // sanitization functions
    private function set_name($name) {
        $this->name = Sanitizer::sanitize_string($name);
    }

    private function set_link($url) {
        $this->link = Sanitizer::sanitize_url($url);
    }

    private function set_image($img) {
        Sanitizer::validate_image($img);
        $this->img = file_get_contents($img['tmp_name']);
        $this->img_type = $img['type'];
    }

    // Used when the user is not uploading a file and instead has just posted
    // the image contents
    private function set_image_contents($contents) {
        $this->img = $contents['img-orig'];
        $this->img_type = $contents['type'];
    }

    // https://www.php.net/manual/en/language.oop5.overloading.php#object.get
    public function __get($property) {
        return property_exists($this, $property) ? $this->$property : null;
    }
}

?>