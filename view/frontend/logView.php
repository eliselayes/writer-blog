<?php $title = 'Mon blog'; ?>

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
            <h2>Connexion</h2>
            <p><a href="index.php">Retour à l'accueil du blog</a></p>

            <form class="log" action="index.php?action=sendText" method="post">
                <label for="pseudo">Pseudo :</label><input type="text" name="pseudo" id="pseudo" /><br />
                <label for="pass">Mot de passe :</label><input type="text" name="pass" id="pass" /><br />
                
                <input id="login" type="submit" value="Se connecter" />
            </form>
            
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>