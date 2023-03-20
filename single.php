<?php
  require_once 'refactoring.php';

  include_once('traitement.php');
  $post = selectOne($id);
  


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


  <header>
    <div class="logo">
      <h1 class="logo-text"><span>Ron</span>asdev</h1>
    </div>
    <ul class="nav">
      <li><a href="index.php">Accueil</a></li>
      <li><a href="#">A propos</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">S'inscrire</a></li>
      <li><a href="#">Se connecter</a></li> 
    </ul>
  </header>

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

        <!--
        <h1>Les commentaires</h1>
        <div class="comments">
          
            <div class="comment">
              <h3 class="auteur">Ecrit par Ronasdev : </h3>
              <p class="contenu" >J'apprecie beaucoup ta chaine.Continue à n ous faire du bien<br>
              <i class="far fa-calendar"> depuis 16 Mai 2021</i>
              <a class="sup" href="">Supprimer</a>
              </p>
              <br>
            </div>
        </div>
        <br>
        <form action="single.php"  method="post">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <div>
            <label>Votre Prenom:</label>
            <input type="text" name="author" class="text-input">
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
  -->
      <!-- // Main Content -->


  <!-- footer -->
  <div class="footer">
    <div class="footer-content">

      <div class="footer-section about">
        <h1 class="logo-text"><span>Ron</span>asdev</h1>
        <p>
          Ronasdev est un petit  blog conçu pour un objectif de tutoriel sur Youtube.
          Cependant un autre vrai blog est en cours de réalisation pour mes amis.
           </p>
        <div class="contact">
          <span><i class="fas fa-phone"></i> &nbsp; (+229) 60 93 48 17</span>
          <span><i class="fas fa-envelope"></i> &nbsp; ronasdev@gmail.com</span>
        </div>
        <div class="socials">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <div class="footer-section links">
        <h2>Liens rapides</h2>
        <br>
        <ul>
          <a href="#">
            <li>Evènements</li>
          </a>
          <a href="#">
            <li>Equipe</li>
          </a>
          <a href="#">
            <li>Mentoring</li>
          </a>
          <a href="#">
            <li>Gallerie</li>
          </a>
          <a href="#">
            <li>Termes et conditions</li>
          </a>
        </ul>
      </div>

      <div class="footer-section contact-form">
        <h2>Contacter nous</h2>
        <br>
        <form action="index.html" method="post">
          <input type="email" name="email" class="text-input contact-input" placeholder="Votre addresse e-mail...">
          <textarea rows="4" name="message" class="text-input contact-input" placeholder="Votre message..."></textarea>
          <button type="submit" class="btn btn-big contact-btn">
            <i class="fas fa-envelope"></i>
           Envoyer
          </button>
        </form>
      </div>

    </div>

    <div class="footer-bottom">
      &copy; ronasdev.com | Conçu par Robert
    </div>
  </div>
  <!-- // footer -->

</body>

</html>