<?php $title = 'Supprimer un commentaire'; ?>

<?php ob_start(); ?>
<h1>Le commentaire a bien été supprimé</h1>
<a href="index.php?action=post.list">Retour à liste des posts</a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');
