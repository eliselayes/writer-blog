<!DOCTYPE html>
<html>
<head>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ 
    selector:'textarea',
    language_url : 'public/js/tinymce/langs/fr_FR.js',
    language: 'fr_FR',
    plugins: "save",
    toolbar: "save"
   });</script>
</head>
<body>
  <form action="index.php?action=sendText" method="post">
    <textarea name="content" id="content">Ecrivez votre texte ici</textarea>

    <button type="submitbtn" value="Publier le billet" />
  </form>
  <p><a href="index.php">Retour au blog</a></p>

</body>
</html>