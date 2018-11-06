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
    $params = [],
    $url;

  public function __construct() {
    $this->getUrl()->setCurrentController()->setCurrentMethod()->setParams();
  }

  private function setParams() {
    $this->params = $this->url[2] ? [$this->url[2]] : [];
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  private function setCurrentMethod() {
    if (isset($this->url[1]) && method_exists($this->currentController, $this->url[1])) {
      $this->currentMethod = $this->url[1];  
    }

    return $this;
  }

  private function setCurrentController() {
    if (isset($this->url[0]) && file_exists('../app/controllers/'.ucwords($this->url[0]).'.php')) {
      $this->currentController = ucwords($this->url[0]);
    }

    require_once '../app/controllers/'.$this->currentController.'.php';
    $this->currentController = new $this->currentController;

    return $this;
  }

  private function getUrl() {
    if (isset($_GET['url'])) {
      $this->url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }

    return $this;
  }

}