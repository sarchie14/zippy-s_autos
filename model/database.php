<?php
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';
    $password = 'kait0930';
    
    try {
        $db = new PDO($dsn, $username, $password);
    }catch(PDOExeption $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>