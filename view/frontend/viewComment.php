<?php

$request = $bdd->query('select * from comments WHERE postId =' . $id . ' && statut = 1') or die(print_r($bdd->errorInfo()));
while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
    $comments = new Cmt();
    $comments->hydrate($donnees); ?>
<div class="comment">
    <?php echo("<div class='titreComment'>" .$comments->title() . "</div><div class='contenuComment'>" . $comments->comment() ."</div><div class='commentAuthor'>" . $comments->author() ."</div>"); ?>
</div>

<?php }; ?>

