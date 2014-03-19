<?php

class HomeController extends BaseController
{
  public function __construct() {
    $this->beforeFilter('@filterRequests');
  }
  
  public function get_lang() {
    return Redirect::to('/' . Config::get('app.locale'));
  }

  public function get_index() {
    $this->layout->content = View::make('index', $this->data);
  }
}
