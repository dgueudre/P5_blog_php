<?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
}
catch(Exception $e)
 {
    die('Erreur : ' .$e->getMessage());

}

/* Sans variable :
$reponse = $bdd->query('SELECT * FROM jeux_video');
while($donnees = $reponse->fetch()) {
    ?>

<p> Le jeu <?php echo $donnees['nom'];?>
 appartient à <?php echo $donnees['possesseur'];?> </p>

<?php
 }
$reponse->closeCursor(); // Ne pas oublier à la fin
*/

$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = ? AND prix <= ? ORDER BY prix');
$req->execute(array($_GET['possesseur'],$_GET['prix_max']));

// Autre manière de faire :

// $req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prixmax ORDER BY prix');
// $req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max']));;

while($donnees=$req->fetch()) { ?>
<ul><li> <?php echo $donnees['nom']  . ' coute ' . $donnees['prix'] . ' euros'; ?></li> </ul>
<?php
}

$req->closeCursor(); 
?> 