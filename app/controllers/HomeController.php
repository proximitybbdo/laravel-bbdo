<?php

class HomeController extends BaseController
{
  public function __construct() {
    $this->beforeFilter('@filterRequests');
  }

  public function get_index() {
    $this->layout->content = View::make('index', $this->data);
  }

  public function get_done() {
    $this->layout->content = View::make('done', $this->data);
  }
}
