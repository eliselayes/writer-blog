<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>


<form action="index.php?action=register" method="post">
    <p>
    <label for="pseudo">Pseudo :</label><input type="text" name="pseudo" id="pseudo"><br />
    <label for="pass">Mot de passe :</label><input type="text" name="pass" id="pass" /><br />
    <label for="confirmPass">Retapez votre mot de passe :</label><input type="text" name="confirmPass" id="confirmPass" /><br />
    <label for="email">Adresse e-mail :</label><input type="text" name="email" id="email" /><br />

    <input type="submit" value="Envoyer" />
</p>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>