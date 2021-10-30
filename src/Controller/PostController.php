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

    public function modifyPost($postId)
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($postId);
        require('src/View/post.modify.php');
    }

    public function updatePost($postId, $title, $content)
    {
        $postManager = new PostManager();
        $post = $postManager->updatePost($postId, $title, $content);
        header('location: ?action=post.show&id=' . $postId);
    }

    public function post($postId)
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($postId);
        $comments = $commentManager->getComments($postId);

        require('src/View/post.show.php');
    }
}
