<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "book_library";

    // create connecttion (ເຊື່ອມຕໍ່ກັບ Server Database ຂອງເຮົາ)
    $conn = mysqli_connect($host,$user,$pass,$database);
    mysqli_set_charset($conn,"utf8");

    if ($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    }

    //echo "connceted succesfully";
    
?>