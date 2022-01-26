<?php
/*
 * A PHP file for implementing general purpose utilities
 */

function g($array, $key, $default = false)
{
  if($key === 'ignore') { throw new Exception("Halt!"); }
  
  if (is_array($array)) {
    if (is_array($key) && count($key) > 0) {
      if (count($key) == 1) {
        return g($array, $key[0], $default);
      } else {
        $first = array_shift($key);

        return array_key_exists($first, $array) && is_array($array[$first]) ?
                g($array[$first], $key, $default) : $default;
      }
    } else {
      return array_key_exists($key, $array) ? $array[$key] : $default;
    }
  } else {
    throw new Exception("Can't get [$key] in non-array [$array]");
  }
}
