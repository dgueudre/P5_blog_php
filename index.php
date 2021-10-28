<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<h1>Mon Super Blog !</h1>
<p>Derniers billets du blog</p>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
}
catch(Exception $e)
 {
    die('Erreur : ' .$e->getMessage());
}

$reponse = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%m/%Y %Hh%imin%ss") AS date FROM posts ORDER BY ID DESC LIMIT 0,5');
while($donnees = $reponse->fetch()) {
    echo $donnees['title'] .'' . $donnees['date'] . '<p>' . $donnees['content']. '</p>' ?>
    <p><a href ="commentaires.php?post=<?php echo $donnees['id']?>">Commentaires</a></p><?php
}
$reponse->closeCursor();
?>

</body>
</html>