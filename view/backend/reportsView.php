<?php $title = 'Liste des articles signalés'; ?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">

            <?php
                while ($comment = $repoComments->fetch()) {
            ?>
                <div class="commentsRep">
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong></p>
                <p><?= htmlspecialchars($comment['comment']) ?></p>
                <div class="comments">
                    <form action="index.php?action=keepComment&amp;id=<?= $comment['id'] ?>" method="post">
                        <div> <input type="submit" value="conserver"/></div>    
                    </form>
                    <form action="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>" method="post">
                        <div class="supp">
                            <input type="submit" value="supprimer"/>
                        </div>
                    </form>
                </div>
                </div>

            <?php
                }
            ?>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>