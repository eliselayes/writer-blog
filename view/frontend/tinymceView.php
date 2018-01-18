<!DOCTYPE html>
<html>
<head>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
  <form action="index.php?action=sendText" method="post">
    <textarea name="content" id="content">Ecrivez votre texte ici</textarea>

    <input type="submit" value="Publier le billet" />
  </form>

</body>
</html>