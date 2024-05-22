<?php
session_start();
require "connect_db.php";
$minlenght = 8;
if (isset($_POST['register'])) {
    $firtname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $cardno = $_POST['cardno'];
    $username = $_POST['email'];
    $password = $_POST['pass'];
}
if (strlen($password) < $minlenght) {
    $_SESSION["error"] = "Please enter a valid password";
    header("location: register.php");
    
}
 else {
    $checkusername = $pdo->prepare("select count(*) from tbl_member where username= ?");
    $checkusername->execute([$username]);
    $userNameExist = $checkusername->fetchColumn();
    if ($userNameExist) {
        $_SESSION["error"] = "Username already exist";
        header("location: register.php");
    } else {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("insert into tbl_member(firstname,lastname,gender,tel_number,card_id,username,passwd,member_active) values(?,?,?,?,?,?,?,?)");
            $stmt->execute(([$firtname, $lastname, $gender, $phone, $cardno, $username, $hashPassword, "no"]));
            $_SESSION["success"] = "Register Successfully";
            header("location: login.php");
        } catch (PDOException $e) {
            $_SESSION["error"] = "Something went wrong, please try again";
            echo"Register failled ".$e->getMessage();
            header("location: register.php");

        }
    }
}
