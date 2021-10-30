<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php foreach ($posts as $post) : ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post->title) ?>
            <em>le <?= $post->getPostDateFr() ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($post->content)) ?>
            <br />
            <em><a href="index.php?action=post.show&amp;id=<?= $post->id ?>">Commentaires</a></em>
            <em><a href="index.php?action=post.modify&amp;id=<?= $post->id ?>">Modifier</a></em>
        </p>
    </div>
<?php endforeach ?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>