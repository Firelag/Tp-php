<?php 
require_once 'db.php';

function ValidatePost($post){
    $errors = array();
    if(empty($post['author'])){
        array_push($errors,'Veillez écrire votre nom');
    }
    if(empty($post['title'])){
        array_push($errors,'Un titre est demandé');
    }
    if(empty($post['content'])){
        array_push($errors,'Le corps de l\'article est demandé');
    }
    return $errors;

}

function selectALL(){
    global $pdo;
    $results = $pdo -> query('SELECT * FROM posts ORDER BY created_at DESC LIMIT 0,3');
    $posts = $results -> fetchAll();
    return $posts;
}

function selectOne($id){
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM posts WHERE id= :post_id');
    $query-> execute(array('post_id'=>$id));
    $post = $query->fetch();
    return $post;
}

function create($author,$title,$content,$image){
    global $pdo;
    $query =$pdo->prepare('INSERT INTO posts(author,title,content,image,created_at) VALUES(:auteur,:titre,:contenu,:image,NOW())');
    $query->execute([
        'auteur'=>$author,
        'titre'=>$title,
        'contenu'=>$content,
        'image'=>$image
    ]);
}
?>