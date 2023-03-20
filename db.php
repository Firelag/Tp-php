<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = 'mblog';

    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset-utf8',$user,$pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

?>