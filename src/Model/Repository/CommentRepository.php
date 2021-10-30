<?php

namespace App\Model\Repository;

use App\Model\Entity\Comment;

class CommentRepository extends Repository
{
    public function getAllByPostId($postId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT id, post_id, author, comment, comment_date 
        /* DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr */
        FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $query->execute(array($postId));
        $comments=$query->fetchAll(\PDO::FETCH_CLASS, Comment::class);

        return $comments;
    }

    public function insert(Comment $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($comment->post_id, $comment->author, $comment->comment));
        return $affectedLines;
    }
}
