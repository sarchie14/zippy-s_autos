<?php
    $dsn = 'mysql:host=dno6xji1n8fm828n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=snkrop5gy2i66hxr';
    $username = 'vhecb5c090crntkx';
    $password = 'f07hxwwgfeu5yrbw';
    
    try {
        $db = new PDO($dsn, $username, $password);
    }catch(PDOExeption $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>