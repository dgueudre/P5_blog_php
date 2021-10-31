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

    public function insert($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }


    public function get($postId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('SELECT id, author, comment, creation_date
        FROM comments WHERE id = ?');
        $query->execute(array($postId));
        $comment = $query->fetchAll(\PDO::FETCH_CLASS, Comment::class);
        if (!isset($comment[0])) {
        throw new \Exception('Le commentaire n\'existe pas');
        }
       return $comment[0];
    }

    public function update($author, $comment, $postId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE comments
        SET author=?, comment=?, creation_date = NOW()
        WHERE id = ?');
        $query->execute([$author, $comment, $postId]);
        $comment = $query->fetch(\PDO::FETCH_ASSOC);

        return $comment;
    }
}
