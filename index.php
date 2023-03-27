<?php
 
  
  require_once 'refactoring.php';
  
  $perPage = 3;
  $nombreTotal= pagination() ;

  $noPage=1;
  $pages= ceil($nombreTotal/$perPage);

  if (isset($_GET['page'])){
    $noPage = $_GET['page'];
  }




  $posts = selectALL($noPage,$perPage); 
  


?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

 
  <link rel="stylesheet" href="css/style.css">

  <title>Mini-Blog</title>
</head>

<body>
   <?php include('inc/header.php'); ?> 

  <!-- Page Wrapper -->
  <div class="page-container">

    <!-- Post Slider -->
    <div class="posts">
      <h1 class="posts-title">Articles</h1>
      <div class="post-container">


            <?php foreach($posts as $post): ?>       
            <div class="post">
              <img src="<?php echo'images/'.$post['image'] ?>" alt="mon image" class="slider-image">
              <div class="post-info">
                <h4><a href="single.php?id=<?=$post ['id']  ?> "><?php echo $post['title']; ?></a></h4>
                <i > <?php echo $post['author'] ?></i>
                &nbsp;
                <i > <?php echo date('d F, Y',strtotime($post['created_at'])) ?></i>
              </div>
            </div>
            <?php endforeach ?>
              
          
      </div>
    </div>
    <!-- pagination -->

    <div class="pagination">
        <?php 
          for($i=1; $i<=$pages;$i++){?>
          <a href="index.php?page=<?=$i ?>" class="page<?= ($noPage == $i)?'active':'' ?>"><?=$i ?></a>

        <?php 
          }
        ?>

    </div>
    <!-- footer -->
    <?php include('inc/header.php'); ?> 
  <!-- // footer --> 
  <body>
  </html>