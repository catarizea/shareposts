<?php
class Pages extends Controller {
  public function __construct() {
  }

  public function index() {  
    $this->view('pages/index', [
      'title' => 'Share posts',
      'description' => 'Simple social network built on the Catalin MVC framework'
    ]);
  }

  public function about() {
    $this->view('pages/about', [
      'title' => 'About',
      'description' => 'App to share posts with other users'
    ]);
  }
}