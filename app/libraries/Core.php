<?php

/*
  App core class
  creates URL & loads Core controller
  URL format /controller/method/params
*/

class Core {
  protected
    $currentController = 'Pages',
    $currentMethod = 'index',
    $params = [];

  public function __construct() {
    // print_r($this->getUrl());
    $url = $this->getUrl();

    $this->setCurrentController($url);
    // unset 0 index
    unset($url[0]);
    
    $this->setCurrentMethod($url);
    // unset 1 index
    unset($url[1]);

    $this->setParams($url);
  }

  private function setParams($url) {
    $this->params = $url ? array_values($url) : [];
    
    // call a callback with this array of params
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    return $this;
  }

  private function setCurrentMethod($url) {
    // check for the second part of the url
    if (isset($url[1]) && method_exists($this->currentController, $url[1])) {
      $this->currentMethod = $url[1];  
    }

    return $this;
  }

  private function setCurrentController($url) {
    // look in controller for first value
    if (isset($url[0]) && file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
      // if exists then set as controller
      $this->currentController = ucwords($url[0]);
    }

    // require the controller
    require_once '../app/controllers/'.$this->currentController.'.php';

    // instantiate controller class
    $this->currentController = new $this->currentController;

    return $this;
  }

  public function getUrl() {
    if (isset($_GET['url'])) {
      return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
  }

}