<?php

class BaseController extends Controller
{
  protected $layout = 'template';
  protected $data = [];

  protected function setupLayout() {
    if(!is_null($this->layout)) {
      $this->layout = View::make($this->layout);
    }
  }

  public function __construct() {
    $this->beforeFilter('@filterRequests');
  }

  public function filterRequests($route, $request) {
    $this->set_lang($route->getParameter('lang'));
  }

  protected function set_lang($param_lang) {
    if(!$param_lang) {
      return;
    }

    if(!is_dir(app_path() . '/lang/' . $param_lang)) {
      return Redirect::to('nl-BE');
    }

    App::setLocale($param_lang);
  }
}
