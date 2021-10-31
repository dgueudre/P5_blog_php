<?php

namespace App\Controller;

use App\Model\Repository\CommentRepository;

class CommentController
{
        public function actionInsert($postId, $author, $comment)
        {
            $commentManager = new CommentRepository();
    
            $affectedLines = $commentManager->insert($postId, $author, $comment);
    
            if ($affectedLines === false) {
                throw new \Exception('Impossible d\'ajouter le commentaire !');
            } else {
                header('Location: index.php?action=post.show&id=' . $postId);
            }
        }
    }
