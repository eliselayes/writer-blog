<?php $title = 'Se connecter'; ?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 connexion">
            <h2>Connexion</h2>
            <form class="log" action="index.php?action=mainBackend" method="post">
                <div class="containElmForm"><label for="pseudo">Pseudo :</label><input type="text" name="pseudo" id="pseudo" /></div>
                <div class="containElmForm"><label for="pass">Mot de passe :</label><input type="text" name="pass" id="pass" /></div>
                <div class="containElmForm submit"><input id="login" type="submit" value="Se connecter" /></div>
            </form>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>