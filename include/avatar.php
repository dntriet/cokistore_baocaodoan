<?php include "../database/addavatar.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../assets/css/avatar.css">
    <link rel="stylesheet" href="../assets/css/payment.css">

    <title>Thông tin cá nhân</title>
</head>

<body>
    <div class="payment_head">
        <!-- note: sửa link a -->
        <div>
            <a href="product.php">
                <img src=" ../assets/img/coki-logo.png" alt="" title="Back to product page">
            </a>
        </div>
    </div>

    <div class="container">
        <div class="container">
            <div class="row profile">
                <div class="col-md-3">
                    <div class="profile-sidebar">
                        <div class="profile-userpic">
                            <img src="../assets/img/admin.png" class="img-responsive" alt="Thông tin cá nhân">
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"></div>
                        </div>

                        <div class="profile-usertitle">
                            <div class="profile-usertitle-job">Phát triển ứng dụng Web</div>
                        </div>

                        <div class="profile-userbuttons">
                            <button type="button" class="btn btn-success btn-sm">Trang chủ</button>
                        </div>
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li>
                                    <a class="profile_link">
                                        <i class="glyphicon glyphicon-info-sign"></i>
                                        Thông tin cá nhân
                                    </a>
                                </li>

                                <li>
                                    <a class="bill_link">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                        Quản lý đơn hàng
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="profile-content">
                        <!-- show profile -->

                    </div>
                    <!-- change password -->
                    <div class="change_pwd_container">
                        <form class="change_pwd_form" method="post" action="changePassord">
                            <label for="name">Mật khẩu cũ:</label>
                            <input type="password" id="passO" name="old_password">

                            <label for="name">Mật khẩu mới:</label>
                            <input type="password" id="passN" name="new_password">
                            <input type="button" value="Thay Đổi" name="change_pwd" class="change_pwd">
                        </form>
                    </div>
                    <!-- bill -->
                    <div class="bill-content">
                        <div class="myBill">Đơn hàng của tôi</div>
                        <table class="tbl-mybill"></table>

                        <table class="mydetail_Bill"></table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <!-- <div id="chat-icon">
    <div class="coki-help">
        <img src="../assets/img/communication (1).png" alt="Chat Icon">
    </div>

</div>

<div id="chat-box">

    <div id="chat-header">
        <p id="chat-title">Chat with CoKi</p>
    </div>
    <div id="chat-body">
        <div class="coki-chat">
            <img src="../assets/img/customer-service.png" alt="">
            <p>CoKi giúp bạn nhé?</p>
        </div>
        <div class="user-chat">
            <input type="text" placeholder="Chat with CoKi ...">
            <button></button>
        </div>

    </div>
</div> -->

</body>

<script>
var avatar = localStorage.getItem("avatar");
$(".profile-userpic").find("img").attr("src", `../assets/img/${avatar}`);
</script>

<script src="../assets/js/avatar.js"></script>
<!-- <script src="../assets/js/chatbox.js"></script> -->

</html>