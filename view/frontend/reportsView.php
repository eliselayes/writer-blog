<?php $title = 'Page principale backend'; ?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">

        <div class="col-sm-12 blog-header">
            <h1 class="blog-title">Le blog de Billet simple pour l'Alaska</h1>
            <p class="lead blog-description">Roman-feuilleton</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 col-sm-offset-4">
            <p><a href="index.php">Retour à l'accueil du blog</a></p>

            <?php
            while ($comment = $repoComments->fetch()) {
            ?>

                <p><strong><?= htmlspecialchars($comment['id']) ?></p>

            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>