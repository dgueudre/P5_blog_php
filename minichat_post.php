<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
}
catch(Exception $e)
 {
    die('Erreur : ' .$e->getMessage());

}

$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES ( ?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

/*Revient à :

$req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES (:pseudo, :message)');
$req->execute(array(
    'pseudo'=>$_POST['pseudo'],
    'message'=>$_POST['message'],
)); */

header('Location: minichat.php');