<?php

class Posts extends Controller {
  private 
    $postModel,
    $userModel;
  
  public function __construct() {
    if (!isLoggedIn()) {
      redirect('users/login');
    }

    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }

  public function index() {
    $posts = $this->postModel->getPosts();
    $data = [
      'posts' => $posts
    ];

    $this->view('posts/index', $data);
  }

  public function add() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_error' => '',
        'body_error' => ''
      ];
      
      if (empty($data['title'])) {
        $data['title_error'] = 'Please enter title';
      }

      if (empty($data['body'])) {
        $data['body_error'] = 'Please enter body text';
      }

      if (empty($data['title_error']) && empty($data['body_error'])) {
        if ($this->postModel->addPost($data)) {
          flash('post_message', 'Post added');
          redirect('/posts');
          return;
        }

        die('Something went wrong');

        return;
      }

      $this->view('posts/add', $data);

      return;
    }
    
    $data = [
      'title' => '',
      'body' => ''
    ];

    $this->view('posts/add', $data);
  }

  public function show($id) {
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);
    $data = [
      'post' => $post,
      'user' => $user
    ];
    $this->view('posts/show', $data);
  }

  public function edit($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_error' => '',
        'body_error' => ''
      ];
      
      if (empty($data['title'])) {
        $data['title_error'] = 'Please enter title';
      }

      if (empty($data['body'])) {
        $data['body_error'] = 'Please enter body text';
      }

      if (empty($data['title_error']) && empty($data['body_error'])) {
        if ($this->postModel->updatePost($data)) {
          flash('post_message', 'Post updated');
          redirect('/posts');
          return;
        }

        die('Something went wrong');

        return;
      }

      $this->view('posts/edit', $data);

      return;
    }

    $post = $this->postModel->getPostById($id);
    if ($post && $post->user_id != $_SESSION['user_id']) {
      redirect('posts');
    }
    
    $data = [
      'id' => $id,
      'title' => $post->title,
      'body' => $post->body
    ];

    $this->view('posts/edit', $data);
  }
}