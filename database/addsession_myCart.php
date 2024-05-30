<?php
    include "../database/connect.php";
    require_once 'session.php';
    error_reporting(E_ERROR | E_PARSE);

if(isset($_SESSION['useruid']) && isset($_SESSION['username'])){
    function addSession(){
        if(isset($_POST['idsp'])){
            $productId = $_POST['idsp'];
            $productQnt = $_POST['qntsp'];
            $productName = $_POST['namesp'];

            // Kiểm tra xem đã có sản phẩm không
            if(isset($_SESSION['myCart'][$productId])){
                // Cập nhập lại số lượng nến trùng SP
                $old_productQnt = $_SESSION['myCart'][$productId]['productQnt'];
                $_SESSION['myCart'][$productId] = array("productId"=>$productId, "productQnt"=>($old_productQnt+$productQnt), "productName"=>$productName);
            }
                // Nếu chưa có sản phẩm
            else{
                $_SESSION['myCart'][$productId] = array("productId"=>$productId, "productQnt"=>$productQnt, "productName"=>$productName);
            }
        }
        if(isset($_SESSION['myCart'])){
            $tong = 0;
            foreach($_SESSION['myCart'] as $key=>$value){
                $tong += $value['productQnt'];
            }
            echo $tong;
        }
        // unset($_SESSION['myCart']);
    }
    
    // Thêm sản phẩm vào giỏ hàng
    function showCart($connection){
        $total_Last = 0;
        echo '<div class="cart_container-detail">';
        if($_SESSION['myCart'] > 0){
            foreach($_SESSION['myCart'] as $key=>$val){
                $query = $connection->query("SELECT * FROM product WHERE product_id='$key'")->fetch_array();
                $total = $query['discount']*$val['productQnt'];

                $total_Last += $total;
                echo '
                    <div class="cart-detail_item">
                        <div class="car-detail_img"><img src="../assets/img/'.$query['thumbnail'].'" id="cart-product_img"></div>
                        <div class="car-detail-content">
                            <div class="cart-detail_del">
                                Remove <i class="fa-solid fa-x"></i>
                            </div>
                            <h3 id="cart-content__title">'.$query['title'].'</h3>
                            <!-- Chỉnh giá phụ thuộc trang sản phẩm -->
                            <p>
                                <span class="cart-content__money price_sales">'.$query['discount'].'</span>
                                <span class="cart-content__money price_ori">'.$query['price'].'đ</span>
                            </p>
                            <!--  -->
                            <div class="cart-detail_qnt">
                                <span><i class="fa-solid fa-minus" style="color: #000000;"></i></span>
                                <input type="text" name="" id="qnt_Product-cart" value="'.$val['productQnt'].'">
                                <span><i class="fa-solid fa-plus" style="color: #000000;"></i></span>
                                <input type="hidden" id="productID" value="'.$key.'">
                            </div>
                            <p id="cart__price-total">
                                <b style="font-weight: bolder">Total:</b>
                                <span id="totalMoney">'.$total.'</span>đ
                            </p>
                        </div>
                    </div>';
            }
            echo '</div>';
            echo '
            <div class="cart_container-payment">
                <p class="cart-payment_subtotal">
                    <span>Subtotal</span>
                    <span><span id="subtotal_money">'.$total_Last.'</span>đ</span>
                </p>
                <div class="cart-payment_info">
                    Interest free payments with Four Logo available on orders $30.00 - $1,000.00
                    <i class="fa-solid fa-info"
                        style="font-size: 10px; color: #000000; cursor:pointer; padding: 2px 4px; border: 1px solid #000000; border-radius: 50%"></i>
                </div>
                <p class="cart-payment_tax">Tax included and shipping calculated at checkout</p>
                <button class="cart-btn_checkout">
                    <i class="fa-solid fa-lock" style="color: #ffffff; margin-right: 10px"></i>
                    CHECKOUT
                </button>
                <div class="cart-continue">
                    <a href="product.php">CONTINUE SHOPPING</a>
                </div>
            </div>';
        }
        else{
            // echo '<script>$(document).ready(function(){$(".payment_body-detai--Product").empty();})</script>';
            echo '<div class="" style="width: 100%; text-align: center; color: blue; font-style: italic;">Hiện tại chưa có giỏ hàng</div>';
        }
        // unset($_SESSION['myCart']);
    }
}
// cần sửa
else{
    function addSession(){
        echo '
            <script>
                $(document).ready(function() {
                    window.location.href = "../include/login.php";
                })
            </script>
        ';
    }
}
?>

<?php 
    if(isset($_POST['action'])){
        $action = $_POST['action'];
        if($action == 'addSession') addSession();
        elseif($action == "showCart") showCart($connect);
    }
?>