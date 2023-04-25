<?php

/*
1. Инсталирайте composer на вашата машина
2. Създайте нов празен проект
3. Използвайте автоматично генерирания autoloader за
да организирате кода си от предната задача.
Оформете го като пакет и го публикувайте на
packagist.org
*/

require_once '../../../vendor/autoload.php';

class PHP_library implements ArrayAccess {

  private static $superglobals = [
    'get' => Get::class,
    'post' => Post::class,
    'session' => Sessions::class
  ];

  public function __construct() {}

  public function offsetExists($offset): bool {
    foreach (static::$superglobals as $key => $val) {
      if (isset($GLOBALS[$key][$val])) {
        return true;
      }
    }
    return false;
  }

  public function offsetGet($offset) {
      foreach (static::$superglobals as $key => $val) {
        if (isset($GLOBALS[$key][$offset])) {
          return $GLOBALS[$key][$offset];
        }
      }
      return false;
  }

  public function offsetSet($offset, $value): void {
      foreach (static::$superglobals as $key => $val) {
        if (isset($GLOBALS[$key])) {
          $GLOBALS[$key][$offset] = $value;
        }
      }
    }

  public function offsetUnset($offset): void {
    foreach (static::$superglobals as $key => $val) {
      if (isset($GLOBALS[$key][$offset])) {
        unset($GLOBALS[$key][$offset]);
      }
    }
  }

  // magic methods
  public function __set($offset, $value) {
    foreach (static::$superglobals as $key => $val) {
      if (isset($GLOBALS[$key])) {
        $GLOBALS[$key][$offset] = $value;
      }
    }
  }

  public function __get($offset) {
    foreach (static::$superglobals as $key => $val) {
      if (isset($GLOBALS[$key][$offset])) {
        return $GLOBALS[$key][$offset];
      }
    }
    return false;
  }

  public function __isset($offset) {
    foreach (static::$superglobals as $key => $val) {
      if ($offset == $key && isset($GLOBALS[$val])) {
        return true;
      }
    }
    return false;
  }

  public function __unset($offset) {
    foreach (static::$superglobals as $key => $val) {
      if (isset($GLOBALS[$key][$offset])) {
        unset($GLOBALS[$key][$offset]);
      }
    }
  }
}