<?php
    include "../database/connect.php";
    require_once 'session.php';
    error_reporting(E_ERROR | E_PARSE);
    // Thêm sản phẩm vào giỏ hàng
    function showCart($connection){
        $total_Last = 0;
        if($_SESSION['myCart'] > 0){
            foreach($_SESSION['myCart'] as $key=>$val){
                $query = $connection->query("SELECT * FROM product WHERE product_id='$key'")->fetch_array();
                $total = $query['discount']*$val['productQnt'];

                $total_Last += $total;
                echo '
                <div class="cart-detail_item cart-mini_item">
                    <div class="car-detail_img"><img src="../assets/img/'.$query['thumbnail'].'" id="cart-product_img"></div>
                    <div class="car-detail-content">
                        <p id="cart_mini-title">
                            '.$query['title'].'
                            <i class="fa-solid fa-x"></i>
                        </p>
                        <!-- Chỉnh giá phụ thuộc trang sản phẩm -->
                        <span>
                            <span class="cart-content__money price_sales">'.$query['discount'].'đ</span>
                            <span class="cart-content__money price_ori">'.$query['price'].'đ</span>
                        </span>
                        <!--  -->
                        <div class="cart-detail_qnt">
                            <span><i class="fa-solid fa-minus" style="color: #000000;"></i></span>
                            <input type="text" name="" id="" value="'.$val['productQnt'].'">
                            <span><i class="fa-solid fa-plus" style="color: #000000;"></i></span>
                        </div>
                    </div>
                </div>
                    ';
            }
            echo '
            <div class="cart_container-payment cart_mini-GtCart">
                <p class="cart-payment_subtotal">
                    <span>Subtotal</span>
                    <span><span>'.$total_Last.'</span>đ</span>
                </p>

                <p class="cart-payment_tax">Tax included and shipping calculated at checkout</p>
                <a href="../include/cart.php">
                    <input type="button" class="cart-btn_checkout" value="GO TO CART">
                </a>
            </div>
            ';
        }
        else{
            // echo '<script>$(document).ready(function(){$(".payment_body-detai--Product").empty();})</script>';
            echo '<div class="" style="width: 100%; text-align: center; color: blue; font-style: italic;">Hiện tại chưa có giỏ hàng</div>';
        }
        // unset($_SESSION['myCart']);
    }
?>

<?php 
    if(isset($_POST['action'])){
        $action = $_POST['action'];
        if($action == 'showMiniCart') showCart($connect);
    }
?>