<?php $title = 'Billet'; ?>

<?php ob_start(); ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-8 blog-main">
        <div class="blog-post">
          <p class="blog-post-meta">
            <?= $post['creation_date_fr'] ?>
          </p>
          <p>
            <?= html_entity_decode($post['content']) ?>
          </p>
        </div> <!-- blog-post -->

        <h2>Commentaires</h2>
        <form class="log" action="index.php?action=addComment&amp;id=<?= $_GET['id'] ?>" method="post">
          <div>
            <div class="containElmForm"><label for="author">Auteur</label><br /></div>
            <div class="containElmForm"><input type="text" id="author" name="author" /></div>
          </div>
          <div>
            <div class="containElmForm"><label for="comment">Commentaire</label><br /></div>
            <div class="containElmForm"><textarea id="comment" name="comment"></textarea></div>
          </div>
          <div>
            <div class="containElmForm submit"><input type="submit" /></div>
          </div>
        </form>

        <div class= "comments">
        <?php
          while ($comment = $comments->fetch()) {
        ?>
          <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
          <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
          <form class = "signaler" action="index.php?action=report&amp;id=<?= $comment['id'] ?>&amp;postId=<?= $post['id'] ?>" method="post">
            <div> 
          <?php
            if ($comment['reported'] == 1) {
          ?>
              <div class="containElmForm"><input id ="report-button" type="submit" value="signaler" style="display:none"/></div>
          <?php
            } else {
          ?>
              <div class="containElmForm"><input id ="report-button" type="submit" value="signaler"/></div>
          <?php
            }
          ?>
            </div>
          </form>

        <?php
          }
        ?>
        </div>
      </div> <!-- blog-main --> 

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
        </div><!--sidebar-module-->
        <div class="sidebar-module">
          <h4>Réseaux sociaux</h4>
          <ol class="list-unstyled">
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div><!--sidebar-module-->
        <p><a href="index.php?action=login">Accès auteur</a></p>
      </div><!-- /.blog-sidebar -->
    </div><!-- /.row -->
  </div><!-- /.container -->


  <footer class="blog-footer">
    <p><a href="#">Haut de la page</a></p>
  </footer>

<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>