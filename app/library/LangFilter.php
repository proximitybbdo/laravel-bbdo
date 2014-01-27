<?php

class LangFilter
{
  public function filter() {
    $route = Route::current();
    $lang = $route->getParameter('lang');

    if(is_null($lang)) {
      return;
    }

    if(!is_dir(app_path() . '/lang/' . $lang)) {
      return Redirect::to(Config::get('app.locale'));
    }
  }
}

