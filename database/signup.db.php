<?php
require 'connect.php';
require 'fnc.db.php';
if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["tel"];
    $psw = $_POST["psw"];
    $pswRepeat = $_POST["psw-repeat"];
    
    if (emptyInputSignup($fname, $email,$phoneNumber, $psw, $pswRepeat) !== false) {
        header('location:../include/signup.php?error=emptyinput');
        exit();
    }

    // if (invalidUid($fname) !== false) {
    //     header('location:../include/signup.php?error=invalidname');
    //     exit();
    // }

    if (invalidEmail($email) !== false) {
        header('location:../include/signup.php?error=invalidemail');
        exit();
    }

    if (pwdMatch($psw, $pswRepeat) !== false) {
        header('location:../include/signup.php?error=passworddontmatch');
        exit();
    }

    if (uidExists($connect,$email,$phoneNumber) !== false) {
        header('location:../include/signup.php?error=usernametaken');
        exit();
    }

    createUser($connect, $fname, $email, $phoneNumber, $psw);
} else {
    header("location:../include/signup.php");
}