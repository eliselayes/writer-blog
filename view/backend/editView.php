<?php $title = 'Accueil gestion des articles'; ?>

<?php ob_start(); ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 blog-main">
        <?php
          while ($data = $posts->fetch()) {
        ?>
          <div class="blog-post">
            <p class="blog-post-meta">
              <?= $data['creation_date_fr'] ?>
            </p>
            <p>
              <?= html_entity_decode($data['short_content']); ?>...
            </p>
            <form action="index.php?action=deletePost&amp;id=<?= $data['id'] ?>" method="post">
                <input type="submit" value="Supprimer">
            </form>
            <form action="index.php?action=displayPostToBeUpd&amp;id=<?= $data['id'] ?>" method="post">
                <input type="submit" value="Modifier">
            </form>
          </div>
        <?php
          }
        $posts->closeCursor();
        ?>

        <nav class="pager">
          <?php
            if($cPage != 1) {
              $prev=$cPage-1;
          ?>
              <form action="index.php?action=changePageBack&amp;page=<?= $prev ?>" method="post">
                <input type="submit" value="Précédent">
              </form>
          <?php
            }
            if($cPage < $totalPages) {
              $next=$cPage+1;
          ?>
            <form action="index.php?action=changePageBack&amp;page=<?= $next ?>" method="post">
              <input type="submit" value="Suivant">
            </form>
        
          <?php
            }
          ?>
        </nav>
          
      </div>
        
    </div><!-- /.row -->
  </div><!-- /.container -->


  <footer class="blog-footer">
    <p><a href="#">Haut de la page</a></p>
  </footer>


<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>