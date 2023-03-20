<?php 
require_once 'db.php';

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

function create($authore,$title,$content,$image){
    global $pdo;
    $query =$pdo->prepare('INSERT INTO posts(author,title,content,image,created_at) VALUES(:auteur,:titre,:contenu,:image,NOW())');
    $query->excute([
        'auteur'=>$author,
        'titre'=>$title,
        'contenu'=>$content,
        'image'=>$image
    ]);
}
?>