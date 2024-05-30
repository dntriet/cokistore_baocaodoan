<?php include '../database/session.php'?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/payment.css">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Tilt+Neon&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Payment</title>
</head>
<!-- js -->

<body>
    <!-- Khối thông tin thanh toán -->
    <div class="payment_head">
        <!-- note: sửa link a -->
        <a href="product.php"><i class="fa-solid fa-cart-shopping" title="back to product"></i></a>
        <img src="../assets/img/coki-logo.png" alt="">
        <div></div>
    </div>

    <div class="payment_body">

        <div class="payment_body-infor">
            <div class="payment_checkout">Express checkout</div>
            <div class="payment_way">
                <button id="btnS"><img src="../assets/img/Shopay.png" title="Shop pay"></button>
                <button id="btnA"><img src="../assets/img/amazon.png" title="Amazon pay"></button>
                <button id="btnG"><img src="../assets/img/G.png" title="Google pay"></button>
            </div>

            <div class="payment_line">
                <hr><span>OR</span>
                <hr>
            </div>
            <div class="payment_info-header">Customer infomation</div>
            <?php if(isset($_SESSION['useruid']) && isset($_SESSION['username'])){
                    $email = $_SESSION['useruid'];
                    $name = $_SESSION['username'];
                ?>

            <div class="payment_info-name">
                <label for="">Name</label><br>
                <input type="text" name="name" id="kh_ten" value="<?php echo  $name ?>" disabled>
            </div>
            <div class="payment_info-email">
                <label for="">Email</label><br>
                <input type="email" name="email" id="kh_email" value="<?php echo  $email ?>" disabled>
            </div>
            <?php
                } 
                ?>
            <div class="payment_info-address">
                <label for="">Address</label><br>
                <input type="text" name="addr" id="kh_diachi" placeholder="your address">
            </div>
            <div class="payment_info-phone">
                <label for="">Phone</label><br>
                <input type="text" name="phone" id="kh_dienthoai" placeholder="your phone numbers">
            </div>
            <div class="payment_info-note">
                <label for="">Note</label>
                <input type="text" name="note" id="kh_note">
            </div>

            <div class="payment_info-header">Payment method</div>
            <div class="payment_method-img">
                <img src="../assets/img/pay1.png" alt="">
                <img src="../assets/img/pay2.png" alt="">
                <img src="../assets/img/pay3.png" alt="">
                <img src="../assets/img/pay4.png" alt="">
                <img src="../assets/img/pay5.png" alt="">
                <img src="../assets/img/pay6.png" alt="">
            </div>
            <div class="raio_method-payment">
                <input type="radio" name="method" id="" value="Cash" checked> Cash <br><br>
                <input type="radio" name="method" id="" value="Internet banking"> Internet banking <br><br>
                <input type="radio" name="method" id="" value="Ship OCD"> Ship OCD <br><br>
            </div>
            <button type="button" name="submit" id="btn-payment_info">Pay now</button>
            <div class="notification"></div>

            <!-- <hr> -->

            <hr color="#EFEFEF">
            <div class="payment_info--policy">
                <a href="">Refund policy</a>
                <a href="">Privacy policy</a>
                <a href="">Terms of policy</a>
            </div>
        </div>

        <!-- Khối chi tiết sản phẩm -->
        <div class="payment_body-detai--Product">
            <!-- thông tin đơn hàng -->
            <!-- Tổng tiền -->
            <!-- discount -->
        </div>

    </div>
</body>
<script src="../assets/js/addPayment.js"></script>

</html>