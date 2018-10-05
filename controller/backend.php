<?php
//Admin acces
function administration(){
    $manager = new PostManager();
    $posts = $manager->getList();
    require('view/backend/adminManager.php');
}
//Users Functions
function createUser(){
    require('view/backend/addUser.php');
}

function addUser(){
    $pwd = $_POST['password'];
    $pwd2 = $_POST['confirm_password'];
    if ($pwd === $pwd2){
    $addUser = new User;
    $addUser->setLogin($_POST['login']);
    $addUser->setLastname($_POST['lastname']);
    $addUser->setFirstname($_POST['firstname']);
    $addUser->setEmail($_POST['email']);
    $addUser->setPassword($_POST['password']);
    $addUser->setCreateDate($_POST['createDate']);
    $addUser->setRole($_POST['role']);

    $manager = new UserManager();
    $manager->add($addUser);
    }
    else{
        echo('<center>Les mots de passes ne correspondent pas ! Veuillez ressayer</center>');
        header("Refresh: 3; URL=index.php?action=register" );
    }
}

//Posts admin
function formAddPost(){
    require('view/backend/addPost.php');
}

function addPost(){
    $dateAjout = date("Y-m-d");
    $billet = new Post;
    $billet->setTitre($_POST['titre_chapitre']);
    $billet->setContenu($_POST['contenu']);
    $billet->setDateAjout($dateAjout);
    $billet->setAuteur($_POST['auteur']);
    $billet->setPostImg($_FILES['postImage']['name']);
    if (!$_FILES ["postImage"]["error"]){
        upload();
    }
    $manager = new PostManager($bdd);
    $manager->add($billet);
    echo ('<center>Les données ont été ajoutées, vous allez êtes redirigé vers la page d\'administration</center>');
    header("Refresh: 3; URL=index.php?action=administration" );
}

function upload(){
    //début upload image
    if (isset($_FILES['postImage']))
        $file=$_FILES['postImage']['name'];
        $size=$_FILES['postImage']['size'];
        $tmp=$_FILES['postImage']['tmp_name'];
        $type=$_FILES['postImage']['type'];
        list($width,$height)=getimagesize($tmp);
    if (is_uploaded_file($tmp))
    {
        if ($type=="image/jpeg" || $type=="image/png" && $size<=1000000 && $width<=800 && $height<=400 )
        {
            $file = preg_replace ("` `i","",$file);
            if (file_exists('./uploads/'.$file))
            {
                $finalName= preg_replace("`.jpeg`is",date("U").".jpeg",$file);
            }
            else {
                $finalName=$file;
            }
            //on déplace l'image dans le répertoire final
            move_uploaded_file($tmp,'public/uploads/'.$finalName);
            echo "<center>L'image a été uploadée avec succès</center><br/>";
        }
        else {
            echo '<center>Votre image a été rejetée (poids, taille ou type incorrect)</center>';
        }
    }
}

function deletePost(){
    $billetId = $_GET['id'];
    $manager = new PostManager();
    $manager->delete($billetId);
    echo("<center>Le billet avec l'id n°" . $billetId . " a bien été supprimé, vous allez êtes redirigé vers la page d'administration</center>");
    header("Refresh: 3; URL=index.php?action=administration");
}

function editPost(){
    $id = $_GET['id'];
    $action = "index.php?action=updatePost";
    $manager = new PostManager();
    $post = $manager->get($id);
    $id = $post->id();
    $titre = $post->titre();
    $contenu = $post->contenu();
    $auteur = $post->auteur();
    $dateAjout = $post->dateAjout();
    $postImg = $post->postImg();
    require('view/backend/editPost.php');
}

function updatePost(){
    $billet = new Post;
    $billet->setId($_POST['id']);
    $billet->setTitre($_POST['titre_chapitre']);
    $billet->setContenu($_POST['contenu']);
    $billet->setDateAjout($_POST['dateAjout']);
    $billet->setAuteur($_POST['auteur']);
    if (!$_FILES ["postImage"]["error"]){
        $billet->setPostImg($_FILES['postImage']['name']);
        upload();
    }
    else {
        $billet->setPostImg($_POST['image']);
    }
    $manager = new PostManager();
    $manager->update($billet);
    echo('<center>Les données ont été modifiées, vous allez êtes redirigé vers la page d\'administration</center>');

    header("Refresh: 3; URL=index.php?action=administration" );
}
//Comments admin
function adminComment(){
    require('view/backend/adminComment.php');
}

function validComment(){
    $id = $_GET['id'];
    //Passer le statut du commentaire à 1
    $manager = new CmtManager($bdd);
    $manager->valid($id);
    echo '<br /><center>Le commentaire a bien été ajouté </center>';
    header("Refresh: 2; URL=index.php?action=adminComment");
}

function deleteComment(){
    $id = $_GET['id'];
    $manager = new CmtManager($bdd);
    $manager->delete($id);
    echo '<br /><center>Le commentaire a bien été supprimé </center>';
    header("Refresh: 2; URL=index.php?action=adminComment");
}
//Reports admin
function viewReport(){
    require('view/backend/viewReport.php');
}

function cancelReport(){
    $id = $_GET['id'];
    //Passer le statut du commentaire à 1
    $manager = new CmtManager($bdd);
    $manager->cancelReport($id);
    echo '<br /><center>Le signalement a bien été supprimé </center>';
    header("Refresh: 2; URL=index.php?action=viewReport");
}



