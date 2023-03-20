<?php
  
  
require_once '../refactoring.php';
$posts = selectALL();

    


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

        <title>Section Admin - Gestions des articles</title>
    </head>

    <body>
    <?php include('../inc/header.php'); ?> 

        <!-- Admin Page Wrapper -->
        <div class="admin-container">

            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.html" class="btn btn-big">Ajouter un article</a>
                    <a href="index.html" class="btn btn-big">Gérer des articles</a>
                </div>
                <div class="container">
                    <h2 class="page-title">Gestion des articles</h2>
                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                            <?php foreach($posts as $key=>$post): ?>
                                <tr>
                                    <td><?= $key+1; ?></td>
                                    <td><?= $post['title'] ?></td>
                                    <td><?= $post['author'] ?></td>
                                    <td><a href="" class="edit">edit</a></td>
                                    <td><a href="" class="delete">delete</a></td>  
                                </tr>
                               
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <?php include('../inc/footer.php'); ?> 


    </body>

</html>