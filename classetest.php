<?php
class PostManager {
    public $toto;
    public $tata;
    private function updatePost() {
        echo "Update post".$this->toto;
    }
    public function updatePost2() {
        $this->updatePost();
    }
}

echo "debut";
$postManager= new PostManager();
$postManager->toto='test';
$postManager2= new PostManager();
$postManager2->toto='test2';
$postManager->updatePost2();
var_dump($postManager);
echo "fin";