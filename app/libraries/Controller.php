<?php

/*
  Base controller
  loads the models and views
*/

class Controller {
  // load model
  public function model($model) {
    require_once '../app/models/'.$model.'.php';
    
    // instantiate the model
    return new $model();
  }

  //load view
  public function view($view, $data = []) {
    // check the view file
    $viewPath = '../app/views/'.$view.'.php';
    
    if (file_exists($viewPath)) {
      require_once $viewPath;
    } else {
      die('View does not exist.');
    }
  }
}