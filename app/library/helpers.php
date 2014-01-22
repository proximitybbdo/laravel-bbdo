<?php

class Helpers
{
  public static function clean_segments() {
    $segments = Request::segments();

    if(count($segments) > 0 && is_dir(app_path() . '/lang/' . $segments[0])) {
      $segments = array_splice($segments, 1);
    }

    $uri_keys = array_keys(array_flip($segments));

    foreach($uri_keys as $key => $value) {
      if((preg_match('/[A-Za-z]/', $value) && preg_match('/[0-9]/', $value)) || is_numeric($value)) {
        unset($uri_keys[$key]);
      }
    }

    return implode('/', $uri_keys);
  }
}

