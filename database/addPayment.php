<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<?php 
    include "../database/connect.php";

    session_start();
    function showProduct($connection){
        $total_Last = 0;
        $total_Qnt = 0;
        if($_SESSION['myCart'] > 0){
            foreach($_SESSION['myCart'] as $key=>$val){
                $total_Qnt += $val['productQnt'];
            }
        }
        echo '
            <div class="payment_body-cart">
                <div class="payment_body-cart-header">Shopping Cart</div>
                <div class="payment_body-cart-qnt">'.$total_Qnt.'</div>
            </div>
            ';
        echo '<div class="payment_body-item">';

        if(isset($_SESSION['myCart']) && is_array($_SESSION['myCart']) && count($_SESSION['myCart']) > 0){
            foreach($_SESSION['myCart'] as $key=>$val){
                $query = $connection->query("SELECT * FROM product WHERE product_id='$key'")->fetch_array();
                $total = $query['discount']*$val['productQnt'];
                $total_Last += $total;
                echo '
                <div class="payment_body-item__detail">
                    <div class="payment__detail-text">
                        '.$query['title'].'<br> <span>'.$query['discount'].' x '.$val['productQnt'].'</span>
                    </div>
                    <div class="payment__detail-money">
                        '.$total.' đ
                    </div>
                </div>
                ';
            }
            echo '</div>';
            echo '
            <div class="payment_body-item__detail payment__total" style="border: none">
                <div class="payment__detail-text total">Subtotal</div>
                <div class="payment__detail-total">'.$total_Last.'</div>
            </div>
            ';

            echo '
            <div class="payment_body_sales">
                <input type="text" placeholder="Discount code or gift card">
                <input type="button" value="Apply" id="btn_payment-sale">
            </div>';
        }
    }

    function addProduct($connection){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('H:i d/m/Y');

        $name = $_POST['namekh'];
        $email = $_POST['emailkh'];
        $phone = $_POST['sdtkh'];
        $address = $_POST['addresskh'];
        $note = $_POST['notekh'];
        
        $qntP = $_POST['qntP'];
        $money = $_POST['totalMoneyP'];

        if(isset($_POST['methodkh'])) $method = $_POST['methodkh'];
        else $method = 'Cash';
        
        $query = $connection->query("INSERT INTO orders(fullname,email,phone_number,address,order_date,quantity,price,note,payment_method) VALUES('$name','$email','$phone','$address','$date','$qntP','$money','$note','$method')");
        if($query == true) echo '<script>showPaymentSuccess();</script>';
        else echo "<p style='color:red'>Thất bại !!!!!</p>";

        $order_id = mysqli_insert_id($connection);//lấy id vừa nhập

        if(isset($_SESSION['myCart']) > 0){
            foreach($_SESSION['myCart'] as $key=>$val){
                $row = $connection->query("SELECT * FROM product WHERE product_id='$key'")->fetch_array();
                $productQnt = $val['productQnt'];
                $price = $productQnt * $row['price'];
                $namesp = $row['title'];

                $connection->query("INSERT INTO giaodich(order_id,title, price, quantity,date_giaodich,order_status,product_id) VALUES ('$order_id','$namesp','$price','$productQnt','$date','2','$key')");
            }
        }
        unset($_SESSION['myCart']);
    }
?>

<?php 
    if(isset($_POST['action'])){
        $action = $_POST['action'];
        if($action == 'showProduct') showProduct($connect);
        elseif($action == 'addProduct') addProduct($connect);
    }

?>