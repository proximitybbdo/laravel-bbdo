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

  public static function url_lang($parts) {
    $path = '';

    if(is_array($parts)) {
      foreach($parts as $part) {
        $path .= '/' . $part;
      }
    } else if(!is_null($parts)) {
      $path = '/' . $parts;
    }

    return url(App::getLocale() . $path);
  }

  public static function active_class($check, $strict = true) {
    if(is_url($check, $strict)) {
      echo ' class="active" ';
    }
  }

  public static function is_url($check, $strict = true) {
    if($strict) {
      return $check == Helpers::clean_segments();
    }

    $check = strlen($check) === 0 ? '§' : $check;

    return strpos(Helpers::clean_segments(), $check) > -1;
  }
}

function active_class($check, $strict = true) {
  return Helpers::active_class($check, $strict);
}

function is_url($check, $strict = true) {
  return Helpers::is_url($check, $strict);
}

function url_lang($parts) {
  return Helpers::url_lang($parts);
}
