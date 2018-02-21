<?php $title = 'Articles par mois'; ?>

<?php ob_start(); ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-8 blog-main">  
        <?php
          while ($data = $postsPerMonth->fetch()) {
        ?>
          <div class="blog-post">
            <p class="blog-post-meta">
              <?= $data['creation_date_fr'] ?>
            </p>
            <p>
              <?=html_entity_decode($data['short_content']); ?>
            </p>
            <a href="index.php?action=seeOnePost&amp;id=<?= $data['id'] ?>">  lire la suite... </a>
          </div>
 
        <?php
          } 
        $postsPerMonth->closeCursor();
        ?>
        </div>
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>Jean Forteroche</h4>
            <img src="public/images/photo.jpg" alt="portrait">
            <p>Chercheur en littérature contemporaine à l'Université d'Auvergne, je suis passionné par la littérature et les voyages. Je pars en janvier 2018 de New-York en direction de l'Alaska avec mon sac à dos, et je compte m'inspirer de mon aventure pour publier un roman épisode par épisode.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
            <?php
              while ($data = $months->fetch()) {
            ?>
                <li><a href="index.php?action=seePostsPerMonth&amp;m=<?= $data['m'] ?>"><?= $data['mois']; ?> <?= $data['y']; ?></a></li>
            <?php
            }
            $months->closeCursor();
            ?>
            </ol>  
          </div>
          <div class="sidebar-module">
            <h4>Réseaux sociaux</h4>
            <ol class="list-unstyled">
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
          <p><a href="index.php?action=login">Accès auteur</a></p>
        </div><!-- /.blog-sidebar -->
      </div><!-- /.row -->
    </div><!-- /.container -->


    <footer class="blog-footer">
      <p><a href="#">Haut de la page</a></p>
    </footer>


    




<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>