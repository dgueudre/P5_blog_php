<?php

namespace App\Controller;

use App\Model\Entity\Comment;
use App\Model\Repository\CommentRepository;

class CommentController
{
    public function actionInsert($postId, $author, $comment)
    {
        $commentManager = new CommentRepository();
        $objet = new Comment();
        $objet->post_id = $postId;
        $objet->author = $author;
        $objet->comment = $comment;
        $affectedLines = $commentManager->insert($objet);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post.show&id=' . $postId);
        }
    }
}
