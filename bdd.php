<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
}
catch(Exception $e)
 {
    die('Erreur : ' .$e->getMessage());

}

$reponse = $bdd->query('SELECT * FROM jeux_video');
while($donnees = $reponse->fetch()) {
    ?>


<p> Le jeu <?php echo $donnees['nom'];?>
 appartient à <?php echo $donnees['possesseur'];?>
 sur la console <?php echo $donnees['console'];?>
 il coute <?php echo $donnees['prix'];?>  euros </p>

<?php 
 }
$reponse->closeCursor();
?>