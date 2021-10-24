<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>

<?php
if (!isset($_POST['pass'])) {

     echo 
     '<p>Entrez le mot de passe pour accéder au site : </p>
     <form action="tp1.php" method="post" >
         <input type="password" name="pass">
         <input type="submit" value="Valider">
     </form>' ; 

}elseif(isset($_POST['pass']) AND $_POST['pass'] !="123"){
    echo 'Mot de passe incorrect' . '<a href="tp1.php">  Réessayez ici</a>';

}else{
    echo "Bravo vous avez réussi à accéder au site !";
}  
?>



</body>
</html>