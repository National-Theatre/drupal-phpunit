<?php

namespace NT\Drupal\Testing\Fixtures;

/**
 *
 */
class fixture_helper {

  protected static $instance;
  protected $object_list = array();

  /**
   *
   */
  protected function __construct() {}

  /**
   *
   */
  protected function __clone() {}

  /**
   *
   */
  public static function getInstance() {
    if (!isset(self::$instance)) {
      self::$instance = new fixture_helper();
    }
    return self::$instance;
  }

  /**
   *
   */
  public static function setup($fixture, $type = NULL) {
    if (!empty($fixture)) {
      $class = str_replace(' ', '_', strtolower($fixture));
      if ($type) {
        $classPath = 'NT\\Test\\Fixtures\\' . $type . '\\' . $class;
      }
      else {
        $classPath = 'NT\\Test\\Fixtures\\' . $class;
      }
      if (!class_exists($classPath)) {
        die($classPath . "\n\n");
      }
      else {
        $ob_str = $classPath;
      }

      $helper = fixture_helper::getInstance();

      $fixture_obj = new $ob_str();
      $helper->add_object($fixture_obj);
      return $fixture_obj->run();
    }
    else {
      return FALSE;
    }
  }

  /**
   *
   */
  public static function clear($fixture = NULL) {
    $helper = fixture_helper::getInstance();
    if (isset($fixture)) {
      $fixture = str_replace(' ', '_', strtolower($fixture));
    }
    $helper->remove_object($fixture);
  }

  /**
   *
   */
  public function add_object($obj) {
    $this->object_list[] = $obj;
  }

  /**
   *
   */
  public function remove_object($fixture = NULL) {
    foreach ($this->object_list as $key => $obj) {
      if (isset($fixture)) {
        if ($obj instanceof $fixture) {
          $obj->reset();
          unset($this->object_list[$key]);
        }
      }
      else {
        $obj->reset();
        unset($this->object_list[$key]);
      }
    }
  }

}
