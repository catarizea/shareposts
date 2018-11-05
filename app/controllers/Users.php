<?php

class Users extends Controller {
  public function __construct() {

  }

  public function register() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      return;
    }

    $data = [
      'name' => '',
      'email' => '',
      'password' => '',
      'confirm_password' => '',
      'name_error' => '',
      'email_error' => '',
      'password_error' => '',
      'confirm_password_error' => ''
    ];

    $this->view('users/register', $data);
  }

  public function login() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      return;
    }

    $data = [
      'email' => '',
      'password' => '',
      'email_error' => '',
      'password_error' => '',
    ];

    $this->view('users/login', $data);
  }
}