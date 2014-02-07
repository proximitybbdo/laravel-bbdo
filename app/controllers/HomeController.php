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

  public function get_contact() {
    $this->layout->content = View::make('contact', $this->data);
  }

  public function post_contact() {
    $rules = array(
      'firstname' => 'required',
      'lastname' => 'required',
    );

    $validator = Validator::make(Input::all(), $rules);

    if($validator->fails()) {
      return Redirect::to(Helpers::url_lang('contact#errors'))
        ->withErrors($validator)
        ->withInput();
    }

    $reg = new Registration;

    $reg->firstname = Input::get('firstname');
    $reg->lastname = Input::get('lastname');
    $reg->question = Input::get('question');
    $reg->company = '';
    $reg->email = '';

    $reg->save();

    return Redirect::to(Helpers::url_lang('contact_thanks'));
  }

  public function get_contact_thanks() {
    $this->layout->content = View::make('contact_thanks', $this->data);
  }

}
