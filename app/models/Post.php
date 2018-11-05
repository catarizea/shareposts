<?php

class Post {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function getPosts() {
    $this->db->query(
      "SELECT *, posts.id AS postId, users.id AS userId, posts.created_at AS postCreatedAt, users.created_at AS userCreatedAT  
      FROM posts 
      INNER JOIN users ON users.id=posts.user_id 
      ORDER BY posts.created_at DESC");
    
    return $this->db->resultSet();
  }
}