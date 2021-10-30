<?php

use App\Controller\CommentController;
use App\Controller\PostController;

require('vendor/autoload.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'post.list') {
            $controller = new PostController();
            $controller->listPosts();
        } elseif ($_GET['action'] == 'post.show') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
            $controller= new PostController();
            $controller->post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'post.modify') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
            $controller= new PostController();
            $controller->modifyPost();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'post.update') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller= new PostController();
                $controller->updatePost();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'comment.insert') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $controller= new CommentController();
                    $controller->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } else {
            throw new Exception('L\'action demandée n\'existe pas');
        }
    } else {
        $controller= new PostController();
        $controller->listPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
