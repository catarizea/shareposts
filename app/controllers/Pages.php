<?php
class Pages extends Controller {
  public function __construct() {
  }

  public function index() {  
    $this->view('pages/index', [
      'title' => 'Share posts'
    ]);
  }

  public function about() {
    $this->view('pages/about', [
      'title' => 'About'
    ]);
  }
}