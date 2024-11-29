<?php
// controllers/PostController.php

require_once 'models/PostModel.php';

class PostController {
    private $postModel;

    public function __construct() {
        $this->postModel = new PostModel();
    }

    public function index() {
        $posts = $this->postModel->getAllPosts();
        require_once 'views/post/index.php';
    }

    public function detail($id) {
        $post = $this->postModel->getPostById($id);
        require_once 'views/post/detail.php';
    }
}
?>