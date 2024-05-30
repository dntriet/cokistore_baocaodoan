<?php
include '../database/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- fancyapp -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <!-- flickity -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- link file js -->
    <!-- <link rel="stylesheet" href="../assets/js/chatbox.js">
    <link rel="stylesheet" href="../assets/js/showminicart.js">
    <link rel="stylesheet" href="../assets/js/productdetail.js">
    <link rel="stylesheet" href="../assets/js/homepage.js"> -->
    <link rel="stylesheet" href="../assets/js/contact.js">

    <!-- link file css -->
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="../assets/css/about_us.css">
    <link rel="stylesheet" href="../assets/css/payment.css">
    <link rel="stylesheet" href="../assets/css/contact.css">
    <link rel="stylesheet" href="../assets/css/productdetail.css">
    <link rel="stylesheet" href="../assets/css/style-login.css">
    <link rel="stylesheet" href="../assets/css/style-restore.css">
    <link rel="stylesheet" href="../assets/css/style-signup.css">

    <!-- <link rel="stylesheet" href="../assets/css/boostrap.css"> -->
    <!-- link google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Tilt+Neon&display=swap"
        rel="stylesheet">

    <!-- header inserted by Tho: start -->

    <!-- header inserted by Tho: end  -->
    <title>CoKi</title>
</head>

<body>
    <header>
        <div id="login-cart">
            <div class="login">

                <?php
                // Sua NEW
                    if(isset($_SESSION['useruid']) && isset($_SESSION['username'])){
                        $getName =$_SESSION['username'];
                        $getEmail =$_SESSION['useruid'];
                        echo " <span style='color:red' class='avatar_user' title='Your profile'>Hello $getName</span>
                        <a href='../database/logout.db.php' class='testMail'>
                            <i class='fa-regular fa-user fa-xl' style='color: #3b413e;'></i>
                            <span class='login-text'>Log out</span>
                            <input type='hidden' class='avatar_email' value='$getEmail'>
                        </a> " ;
                    }
                    else{
                        echo"<a href='login.php'>
                        <i class='fa-regular fa-user fa-xl' style='color: #3b413e;'></i>
                        <span class='login-text'>Log in</span>
                    </a>";
                    }
                ?>
            </div>

            <a href="../include/cart.php" class="cart">
                <button class="btn_show-cart">
                    <i class="fa-solid fa-cart-shopping fa-xl" style="color: #3b413e;"></i>
                    <?php 
                        if(isset($_SESSION['myCart'])){
                            $tong = 0;
                            foreach($_SESSION['myCart'] as $key=>$value){
                                $tong += $value['productQnt'];
                            }
                        }else $tong = 0;
                    ?>
                    <span class="cart-number"><?php echo $tong; ?></span>
                </button>
                <!-- <input type='hidden' value='0' name='qntP'> -->
            </a>

        </div>
        <!-- show mini cart -->
        <div class="cart_mini-main">
            <!-- Show mini cart -->
        </div>
        <!-- end login and cart -->

        <!-- start navigation section -->
        <div class="container-nav">
            <div class="logo">
                <a href="../include/Homepage.php" class="logo-coki">
                    <img src="../assets/img/coki-logo.png" alt="CoKi">
                </a>
            </div>
            <div class="menu">
                <div class="product-type">
                    <a href="product.php" class="showAllP"><span>Categories</span></a>
                    <p class="icon-chevron-down"><i class="fa-solid fa-chevron-down fa-xs" style="color: #3b413e;"></i>
                    </p>

                    <form method="post">
                        <ul class="list-option">
                            <!-- Danh mục -->
                        </ul>
                    </form>
                </div>
                <div class=" about-us">
                    <a href="about_us.php"><span>About COKI</span></a>
                </div>
                <div class="contact-us">
                    <a href="contact.php"><span>Contact Us</span></a>
                </div>
            </div>
            <div class="search">
                <input type="text" class="header-my-input" placeholder="Search">
                <span>
                    <i class="fa-solid fa-magnifying-glass btn_search" style="color: #3b413e;"></i>
                </span>
            </div>
        </div>
    </header>
    <div class="sale-ten-percent">
        <p>SAVE 10%</p>
    </div>


    <!-- Hàm hiện danh mục sản phẩm -->
    <script>
    $(document).ready(function() {
        $.ajax({
            url: "../database/addProduct.php",
            type: "POST",
            data: {
                action: 'showCate'
            },
            success: function(respond) {
                $(".list-option").append(respond);
            },
        });
    })
    </script>

<script>
    $(".avatar_user").click(function() {
        var nameUser = $(this).text().substring(6);
        var email = $(this).parent().find(".testMail").find(".avatar_email").val();

        localStorage.setItem("nameUser", nameUser);
        localStorage.setItem("email", email);

        window.location.href = "avatar.php";
    })
</script>

<script>
    $(document).ready(function(){
        $.ajax({
            url: "../database/addminiCart.php",
            type: "POST",
            data: {
                action: 'showMiniCart'
            },
            success: function(respond) {
                $(".cart_mini-main").append(respond);
            },
        });
    })
</script>