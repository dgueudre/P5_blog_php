<?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
}
catch(Exception $e)
 {
    die('Erreur : ' .$e->getMessage());

}

$bdd->exec('INSERT INTO jeux_video (ID, nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
 VALUES ('Battlefield','Patrick', 'PC, 45, 50, \'2nde guerre mondiale\')');