<?php
if(isset($_POST["submit"])){
    $uname = $_POST["uname"];
    $psw = $_POST["psw"];

    require_once 'connect.php';
    require_once 'fnc.db.php';
    
    if(login($uname,$psw) !== false){
       header("Location:../include/login.php?error=emptyinput");
           exit();
    }
    
    if (loginAdmin($connect, $uname, $psw)) {
        // Đăng nhập thành công, chuyển hướng đến trang dành cho admin
        header("Location: ../admin/dashboard.php");
        exit();
    } else if (loginUser($connect, $uname, $psw)) {
        // Đăng nhập thành công, chuyển hướng đến trang nào đó cho người dùng thông thường
        header("Location: ../include/product.php");
        exit();
    } else {
        header("Location: ../include/login.php?error=wronglogin");
        exit();
    }
} else {
    header("Location: ../include/login.php");
    exit();
}