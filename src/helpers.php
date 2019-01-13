<?php

if (!function_exists('str_contains')) {
  /**
   * Determine if a given string contains a given substring.
   *
   * @param  string  $haystack
   * @param  string|array  $needles
   * @return bool
   */
  function str_contains($haystack, $needles)
  {
    foreach ((array) $needles as $needle) {
      if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
        return true;
      }
    }

    return false;
  }
}

if (!function_exists('ends_with')) {
  /**
   * Determine if a given string ends with a given substring.
   *
   * @param  string  $haystack
   * @param  string|array  $needles
   * @return bool
   */
  function ends_with($haystack, $needles)
  {
    foreach ((array) $needles as $needle) {
      if (substr($haystack, -strlen($needle)) === (string) $needle) {
        return true;
      }
    }
    return false;
  }
}