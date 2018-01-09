<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>


<form action="connexion_post.php" method="post">
    <p>
    <label for="pseudo">Pseudo :</label><input type="text" name="pseudo" id="pseudo" /><br />
    <label for="pass">Mot de passe :</label><input type="text" name="pass" id="pass" /><br />
    

    <input type="submit" value="Se connecter" />
</p>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>