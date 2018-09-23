<?php
$manager = new CmtManager($bdd);
$status = 1;
$comments = $manager->getList($id, $status);
foreach($comments as $comment){
?>
    <div class="comment">
        <?php echo("<div class='titreComment'>" .$comment->title() . "</div><div class='contenuComment'>" . $comment->comment() ."</div><div class='commentAuthor'>" . $comment->author() .' - Posté le '.$comment->posted(). "</div>"); ?>

        <div class="signalement"><a href="index.php?page=reporting&&id=<?= $comment->id(); ?>">Signaler</a></div></div>
<?php } ?>