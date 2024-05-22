<?php 
    $host="localhost";
    $dbname="book_library";
    $username="root";
    $password="";
    
    try {
        $pdo = new PDO("mysql:host=$host; dbname=$dbname",$username,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failled ".$e->getMessage();
    }

?>