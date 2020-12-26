<?php
namespace Controllers;

use \eftec\bladeone\BladeOne;

abstract class Controller {
    private $root;
    private $views;
    private $cache;
    private $blade;

    public function __construct() {
        $this->root = realpath(__DIR__ . '/..');
        $this->views = $this->root . '/views';
        $this->cache = $this->root . '/storage/views';
        $this->blade = new BladeOne($this->views, $this->cache, BladeOne::MODE_AUTO);
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}