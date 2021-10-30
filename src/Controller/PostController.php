<?php

namespace App\Controller;

use App\Model\CommentManager;
use App\Model\PostManager;

class PostController
{

    public function actionList()

    {
        $postManager = new PostManager();
        $posts = $postManager->getAll();

        require('src/View/post.list.php');
    }

    public function actionModify($postId)
    {
        $postManager = new PostManager();
        $post = $postManager->get($postId);
        require('src/View/post.modify.php');
    }

    public function actionUpdate($postId, $title, $content)
    {
        $postManager = new PostManager();
        $post = $postManager->update($postId, $title, $content);
        header('location: ?action=post.show&id=' . $postId);
    }

    public function actionShow($postId)
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->get($postId);
        $comments = $commentManager->getAllByPostId($postId);

        require('src/View/post.show.php');
    }
}
