<?php
//traitement de single
  $id='';
  if (isset($_GET['id']) && is_numeric($_GET['id'])){
    $id =$_GET['id'];
  }
  if (empty($_GET['id'])){
    die("L'article n'exsite pas");
  }

//sauvegarde d'un commentaire
if(isset($_POST['add-comment'])){
    if(!empty($_POST['auteur']) && !empty($_POST['comment'])){
      $author = $_POST['auteur'];
      $comment = $_POST['comment'];
      $id = $_POST['id'];

      saveComment($author,$id,$comment);
      header('Location:single.php?id='.$_POST['id']);
      exit();
    }
}
?>