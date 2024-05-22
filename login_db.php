<?php
session_start();     
require "connect_db.php";
if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $passwd = $_POST['passwd'];
    $role=$_POST['role'];  

    if($role=='user'){
        try {
            $stmt = $pdo->prepare("Select * from tbl_member where username=? and member_active ='yes'");
            $stmt->execute([$user]);
            $userData = $stmt->fetch();
        
            if ($userData && password_verify($passwd, $userData["passwd"])) {
                $_SESSION['user_id'] = $userData['member_id'];
                header("location:index.php");
            } else {
                $_SESSION['error'] = "Invalid email or password";
                header("location: login.php");
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Something when wrong, please try again";
            header("location: login.php");
        }
        
    }
}
