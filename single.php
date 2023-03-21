<?php
  require_once 'refactoring.php';

  include_once('traitement.php');
  $post = selectOne($id);
  $comments = findAllComments($id);
  


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="css/style.css">

  <title>Article </title>
</head>

<body>


<?php include('inc/header.php'); ?> 

  <!-- Page Wrapper -->
  <div class="page-container">

    <!-- Content -->
    <div class="container">

      <!-- Main Content Wrapper -->
      <div class="">
        <div class="main-content single">
          <h1 class="post-title"><?= $post['title']?></h1>
          <div class="post-image">
              <img src="images/<?= $post['image']?>" alt="" >
          </div>
          
          <div class="post-content">
          <?= $post['content']?>
          </div>
          <small><?= $post['author']?> : publié le <?= $post['created_at']?></small>
        </div>

        
        <h1>Les commentaires</h1>
        <div class="comments">
          <?php foreach($comments as $comment): ?> 
            <div class="comment">
              <h3 class="auteur">Ecrit par <?= $comment['auteur']; ?> </h3>
              <p class="contenu" > <?= $comment['comment']; ?> <br>
              <i class="far fa-calendar"><?= date('d F,Y', strtotime($comment['created_at'])); ?> </i>
              <a class="sup" href="">Supprimer</a>
              </p>
              <br>
            </div>
            <?php endforeach; ?> 
        </div>
        <br>
        <form action="single.php?id=<?=$id ?>"  method="post">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <div>
            <label>Votre Prenom:</label>
            <input type="text" name="auteur" class="text-input">
          </div>
          <div>
            <label>Body:</label>
            <textarea name="comment" id="body" cols="130" rows="15"></textarea>
          </div><br>
          <div>
              <button type="submit" name="add-comment" class="btn btn-big">Commentez</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
  
      <!-- // Main Content -->


  <!-- footer -->
  <?php include('inc/footer.php'); ?> 
  <!-- // footer -->

</body>

</html>