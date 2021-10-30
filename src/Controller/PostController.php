<?php

namespace App\Controller;

use App\Model\CommentManager;
use App\Model\PostManager;

class PostController
{

    public function listPosts()

    {
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        require('src/View/post.list.php');
    }

    public function modifyPost()
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        require('src/View/post.modify.php');
    }

    public function updatePost()
    {
        $postManager = new PostManager();
        $post = $postManager->updatePost($_GET['id']);
        header('location: ?action=post&id=' . $_GET['id']);
    }

    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require('src/View/post.show.php');
    }

}
