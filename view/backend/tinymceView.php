<!DOCTYPE html>
  <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
      
    <link href="https://fonts.googleapis.com/css?family=ABeeZee" rel="stylesheet">

    <title>Editeur</title>

    <!-- Bootstrap core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public/css/style.css" rel="stylesheet">


      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
      <script>tinymce.init({ 
        selector:'textarea',
        language_url : 'public/js/tinymce/langs/fr_FR.js',
        language: 'fr_FR',
        plugins: "save",
        toolbar: "save"
      });</script>
    </head>

    <header id="header-editor">
      <h1 id="editor-title">Bienvenue Jean !</h1>
      <p class="editor-description">Inspiré aujourd'hui ?</p>
    </header>

    <body id="editor">
      <form action="index.php?action=sendText" method="post">
        <textarea name="content" id="content">Ecrivez votre texte ici</textarea>
      </form>
      <p id="editor-back"><a href="index.php">Retour au blog</a></p>     
  </body>
</html>