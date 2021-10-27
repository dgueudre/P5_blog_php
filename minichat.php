<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minichat</title>
</head>
<body>

 <form action="minichat_post.php" method="post">
     <p>Pseudo :</p>
     <input type="text" name="pseudo" id="pseudo"/>
    <p>Message :</p> 
    <input type="text" name="message" id="message"/> </br>
    <input type="submit" value="Envoyer"/>
 </form> 

 <?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
}
catch(Exception $e)
 {
    die('Erreur : ' .$e->getMessage());
}


$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID LIMIT 0,10');
while($donnees= $reponse->fetch()) {
    echo  '<ul>' . htmlspecialchars($donnees['pseudo']) . ': ' . htmlspecialchars($donnees['message']) . '</ul>';
}

$reponse->closeCursor(); 

?>


</body>
</html>