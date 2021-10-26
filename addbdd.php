<?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
}
catch(Exception $e)
 {
    die('Erreur : ' .$e->getMessage());

}


//$bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) 
//VALUES (\'Flyff\', \'Patrick\', 0, 200, \'Un MMORPG au style manga\')');
// echo 'Le jeu a bien été ajouté';


// Requête préparée : ajout bdd 

$req =$bdd->prepare('INSERT INTO jeux_video (nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
 VALUES (:nom,:possesseur,:console,:prix,:nbre_joueurs_max,:commentaires)');

echo 'Le jeu a bien été ajouté';
 