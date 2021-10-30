<?php

namespace App\Model;

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function createPost() {
        
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch(\PDO::FETCH_ASSOC);
        if ($post == false) {
            throw new \Exception('Le post n\'existe pas');
        }

        return $post;
    }

    public function updatePost($postId, $title, $content) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts
        SET title=?, content=?, creation_date = NOW()
        WHERE id = ?');
        $req->execute([$title, $content,$postId]);
        $post = $req->fetch(\PDO::FETCH_ASSOC);

        return $post;
    }
}
