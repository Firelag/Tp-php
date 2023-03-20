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
?>