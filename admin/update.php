<?php require_once '../refactoring.php'; ?>
<?php 
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

?>