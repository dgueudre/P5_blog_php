<?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
}
catch(Exception $e)
 {
    die('Erreur : ' .$e->getMessage());

}

$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ? AND prix <= ? ORDER BY prix');
$req->execute(array($_GET['possesseur'],$_GET['prix_max'])); 

while($donnees=$req->fetch()) { ?>
<ul><li> <?php echo $donnees['nom']  . ' coute ' . $donnees['prix'] . ' euros'; ?></li> </ul>
<?php
}

$req->closeCursor(); 
?> 