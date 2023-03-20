<?php require_once'../refactoring.php'; ?>
<?php 
$errors = array();
$title ='';
$author='';
$content='';
    if(isset($_POST['add-post'])){
        $errors = ValidatePost($_POST);
        if(!empty($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];
            $destination = "../images/$image_name";

            $result =   move_uploaded_file($_FILES['image']['tmp_name'],$destination);
            if ($result){
                $_POST['image'] = $image_name;
            }else{
                array_push($errors,'L\'enregistrement de l\'image a échoué');
            }

        }else{
            array_push($errors,'Une image est demandée');
        }
        if(count($errors)== 0){
            $_POST['content'] = nl2br(htmlentities($_POST['content']));
            create($_POST['author'],$_POST['title'],$_POST['content'],$_POST['image']);
            header('Location: index.php');
            exit();
        }else{
            $title = $_POST['title'];
            $author = $_POST['author'];
            $content = $_POST['content'];
        }


        

       
    }
    
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="../css/style.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="../css/admin.css">

        <title>Admin Section - Add Post</title>
    </head>

    <body>
    <?php include('../inc/header.php'); ?> 

        <!-- Admin Page Wrapper -->
        <div class="admin-container">

        
            <!-- // Left Sidebar -->


            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.html" class="btn btn-big">Ajout d'un article</a>
                    <a href="index.html" class="btn btn-big">Gestion des articles</a>
                </div>


                <div class="container">

                    <h2 class="page-title">Gestion des articles</h2>
                    <?php include 'formErrors.php'; ?>
                    <form action="create.php" enctype="multipart/form-data" method="post">
                        <div>
                            <label>Author</label>
                            <input type="text" name="author" value="<?=$author ?>" class="text-input">
                        </div>
                        <div>
                            <label>Title</label>
                            <input type="text" name="title" value="<?=$title ?>" class="text-input">
                        </div>
                        <div>
                            <label>Contenu</label>
                            <textarea cols="130", rows="10" name="content" <?=$content ?>  id="body"></textarea>
                        </div>
                        <div>
                            <label>Image</label>
                            <input type="file" name="image"  class="text-input">
                        </div>
                        
                        <div>
                            <button type="submit" name="add-post" class="btn btn-big">Ajout d'un article</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->
        <?php include('../inc/footer.php'); ?> 


   
    </body>

</html>