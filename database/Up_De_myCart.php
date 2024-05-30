<?php 
    session_start();
    // Cập nhập số lượng sản phẩm trong giỏ hàng
    function UpdateQnt(){
        $productId = $_POST['idsp'];
        $productQnt = $_POST['qntsp'];
        $productName = $_POST['namesp'];

        $_SESSION["myCart"][$productId] = array("productId" => $productId, "productQnt" => $productQnt, "productName"=>$productName);
    }
    // Xóa sản phẩm khỏi giỏ hàng
    function DeleCart(){
        $productId = $_POST["productId"];
        unset($_SESSION["myCart"][$productId]);
    }
?>

<?php 
    if(isset($_POST['action'])){
        $action = $_POST['action'];
        if($action == 'UpdateQnt') UpdateQnt();
        elseif($action == "DeleteCart") DeleCart();
    }
?>

