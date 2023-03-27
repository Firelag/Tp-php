<?php 
require_once 'db.php';


//Test de validité des champs
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

//Selection de 3 article
function selectALL($noPage,$perPage){
    global $pdo;
    $results = $pdo -> query('SELECT * FROM posts ORDER BY created_at DESC LIMIT '. ($perPage*($noPage-1)).','.$perPage);
    $posts = $results -> fetchAll();
    return $posts;
}

//Selection d'un article
function selectOne($id){
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM posts WHERE id= :post_id');
    $query-> execute(array('post_id'=>$id));
    $post = $query->fetch();
    return $post;
}

//Selection de tous les articles
function pagination(){
    global $pdo;
    $query = $pdo->prepare('SELECT COUNT(*) as nbr_articles FROM posts');
    $query-> execute([]);
    $nombre = $query->fetch();
    return $nombre['nbr_articles'];

}

//Enregistrement d'un article grâce à son identifiant
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

//modifier un article
function updatePost($id,$author,$title,$content,$image){
    global $pdo;
    $query = $pdo->prepare('UPDATE posts SET author = :auteur, title=:titre, content=:content,
    image=:image WHERE id = :id');
    $query->execute([
        'auteur'=>$author,
        'titre'=>$title,
        'content'=>$content,
        'image'=>$image,
        'id'=>$id
    ]);
}

//supprimer un article
function deletePost($id){
    global $pdo;
    $query = $pdo->prepare('DELETE FROM posts WHERE id =:id');
    $query->execute(['id'=>$id]);

}

//sauvergarder un comentaire
function saveComment($auteur,$post_id,$comment){
    global $pdo;
    $query = $pdo->prepare('INSERT INTO comments(id_post,auteur,comment,created_at) 
    VALUES(:id_post,:auteur,:comment,NOW())');
    $query->execute([
        'id_post'=>$post_id,
        'auteur'=>$auteur,
        'comment'=>$comment
    ]);
}


//supprimer un commentaire
function deleteComment($id){
    global $pdo;
    $query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
    $query->execute(['id'=> $id]);

}
//recuperation des articles dans la base
function findAllComments($id_post){
    global $pdo;
    $query = $pdo->prepare('SELECT * FROM comments WHERE id_post= :post_id');
    $query->execute(['post_id' =>$id_post]);
    $comments = $query->fetchAll();
    return $comments;

}
?>