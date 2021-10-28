<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Commentaires</title>
</head>
<body>

<h1>Mon Super Blog !</h1>
<a href="index.php">Retour à l'accueil</a>

<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
}
catch(Exception $e)
 {
    die('Erreur : ' .$e->getMessage());
}

$req= $bdd->prepare('SELECT id,title, content, 
DATE_FORMAT(creation_date, "%d/%m/%Y %Hh%imin%ss") AS date FROM posts WHERE id = ?');
$req->execute(array($_GET['post']));
while($donnees = $req->fetch()){
        echo $donnees['title'] . '' . $donnees['content'] . '' . $donnees['date'];
};

$req->closeCursor();

$req= $bdd->prepare('SELECT id,author, comment, 
DATE_FORMAT(comment_date, "%d/%m/%Y %Hh%imin%ss") AS date FROM comments WHERE post_id = ?');
$req->execute(array($_GET['post']));
while($donnees = $req->fetch()) {
echo $donnees['author'] . '' . $donnees['comment'] . '' . $donnees['date'];
}

$req->closeCursor();
?>

</body>
</html>