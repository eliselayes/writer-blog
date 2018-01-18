<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
    <div class="container">
      <div class="row">

        <div class="col-sm-12 blog-header">
          

            <h1 class="blog-title">Le blog de Billet simple pour l'Alaska</h1>
            <p class="lead blog-description">Roman-feuilleton</p>
        </div>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
        
        <?php
        while ($data = $posts->fetch())
        {
        ?>

          <div class="blog-post">
            <p class="blog-post-meta">
              <?= $data['creation_date_fr'] ?>
            </p>
            <p>
              <?= nl2br(htmlspecialchars($data['content'])) ?>
            </p>
          </div>
          <?php
        }
        $posts->closeCursor();
        ?>
          <nav>
            <ul class="pager">
              <li><a href="#">Précédent</a></li>
              <li><a href="#">Suivant</a></li>
            </ul>
          </nav>
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
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Réseaux sociaux</h4>
            <ol class="list-unstyled">
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->


    <footer class="blog-footer">
      <p>
        <a href="#">Haut de la page</a>
      </p>
      <p><a href="index.php?action=login">Accès auteur</a></p>
    </footer>


    




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>