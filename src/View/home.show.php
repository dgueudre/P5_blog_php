<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<h1>Bienvenue sur mon blog personnel !</h1>
<h2>Medjek Naime</h2>
<ul>
    <li>une photo et/ou un logo</li>
    <li>Naime Medjek, développeur pour toutes vos applications !</li>
    <li>un formulaire de contact </li>
    <li>CV au format PDF</li>
    <li>Mes réseaux sociaux où l’on peut me suivre</li>
</ul>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');
