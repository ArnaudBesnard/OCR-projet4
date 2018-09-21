<?php
$manager = new CmtManager($bdd);
$comments = $manager->getList($id );
foreach($comments as $comment){
?>
    <div class="comment">
        <?php echo("<div class='titreComment'>" .$comment->title() . "</div><div class='contenuComment'>" . $comment->comment() ."</div><div class='commentAuthor'>" . $comment->author() ."</div>"); ?>
    </div>
<?php } ?>