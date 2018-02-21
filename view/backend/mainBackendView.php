<?php $title = 'Page principale backend'; ?>

<?php ob_start(); ?>
<div class="container">
    
    <div class="row">
        <div class="col-sm-12" id="mainBackend">
            <div id="selectFlex">
                <div>
                    <div class="select select1"><a href="index.php?action=sendText">Rédiger mes épisodes</a></div>
                    <div class="select select2"><a href="index.php?action=seeReports">Commentaires signalés</a></div>
                </div>
                <div>
                    <div class="select select3"><a href="index.php?action=changePW">Changer le mot de passe</a></div>
                    <div class="select select4"><a href="index.php?action=editText">Gérer les articles</a></div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('./view/template.php'); ?>