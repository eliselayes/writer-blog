<?php $title = 'Modification du mot de passe'; ?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-5 col-sm-offset-4">
            <h2>Modification du mot de passe</h2>

            <form class="log" action="index.php?action=changePW" method="post">
                <label class="containElmForm" for="pass">Nouveau mot de passe :</label><input type="text" name="pass" id="pass" /><br />
                <input class="containElmForm"id="pass" type="submit" value="Enregistrer" />
            </form>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>