<?php
  
  
  require_once 'refactoring.php';
  $posts = selectALL();

    


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
  <header>
    <div class="logo">
      <h1 class="logo-text"><span>Ron</span>asdev</h1>
    </div>
    <ul class="nav">
      <li><a href="index.html">Accueil</a></li>
      <li><a href="#">A propos</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">S'inscrire</a></li>
      <li><a href="#">Se connecter</a></li> 
    </ul>
  </header>

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
        &copy; codingpoets.com | Designed by Awa Melvine
      </div>
    </div>
  <!-- // footer --> 
  <body>
  </html>