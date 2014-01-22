<?php

class AdminController extends BaseController
{
  protected $layout = 'admin.template';

  public function __construct() {
    $this->beforeFilter('@filterRequests');
  }

  public function filterRequests($route, $request) {
    if(Session::get('logged_in') != true && $route->uri() != 'admin/login'){
      return Redirect::to('admin/login');
    }
  }

  public function get_index() {
    $this->layout->content = View::make('admin.index');
  }

	public function get_logout() {
    Session::forget('logged_in');

    return Redirect::to('admin/login');
  }

  public function get_login($data = null) {
    if(!is_null($data)) {
      $this->data = $data;
    } else {
      $this->data['username'] = '';
    }

    return View::make('admin.login', $this->data);
	}

	public function post_login() {
    $d = [];

		$d['username'] = Input::get('username');
    $d['password'] = Input::get('password');

    $d['error'] = 'Wrong username and/or password.';

    Session::set('logged_in', false);

    if($d['username'] !== Config::get("app.admin.username") && $d['username'] !== Config::get("app.admin.email")) {
      return $this->get_login($d);
    }

    if($d['password'] !== Config::get("app.admin.password")) {
      return $this->get_login($d);
    }

    Session::set('logged_in', true);

    return Redirect::to('admin');
	}
}
