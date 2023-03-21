<?php require_once '../refactoring.php'; ?>
<?php 
$errors=array();
$id='';
$author='';
$title='';
$content='';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $post = selectOne($id);

        if(!$post){
            header('location:index.php');
            exit();
        }

        $author = $post['author'];
        $title = $post['title'];
        $content = $post['content'];
    }

    if(isset($_POST['update-post'])){
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
            $id = $_POST['id'];
            $_POST['content'] = nl2br(htmlentities($_POST['content']));
            updatePost($id,$_POST['author'],$_POST['title'],$_POST['content'],$_POST['image']);
            header('Location: index.php');
            exit();
        }else{
            $author=$_POST['author'];
            $title=$_POST['title'];
            $content=$_POST['content'];
        }
    }
    if(isset($_GET['delete_id'])){
        deletePost($_GET['delete_id']);
        header('Location:index.php');
        exit();
    }

?>