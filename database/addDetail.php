<?php 
    include '../database/connect.php';
    include_once '../database/fnc.db.php';
?>

<?php 
    function addDetail($connect){
        $name = $_POST['nameDetail'];
        $query_detail = "SELECT * FROM product WHERE title='$name'";
        $row = mysqli_query($connect, $query_detail);
        while($result = mysqli_fetch_array($row)){
        echo "
        <div id='left-image-div' style='margin-right: 30px;'>
            <!-- div contains main image -->
            <div>
                <img src='../assets/img/$result[5]' alt='' id='main-image'>
            </div>
        
        </div>

        <!-- right division -->
        <div id='right-description-div'>
            <h1 style='color: #d88f71; font-size: 50px;' class='product_detail detail_name'>$result[2]</h1>
            <!-- có sửa tí -->
            <p style='font-size: 20px;' class='product_detail'>$result[3]đ <del style='color:#8C8B8B; margin-left: 6px;'>$result[4] đ</del></p>

        <!-- div contains quantity button, buy butotn -->
        
            <div id='quantity-and-buy-product' style='display: flex; align-items: center;'>
                <div id='quantity'>
                    <button class='modify-quantity-btn' onclick='descreaseQuantity()'>-</button>
                    <input type='text' id='productQnt' value='1' onkeypress='return isNumberKey(event)' name='qntP'>
                    <button class='modify-quantity-btn' onclick='increaseQuantity()'>+</button>
                </div>
                <input type='button' value='ADD TO CART' id='btnATC'>
                <input type='hidden' id='productID' value='$result[0]'>
                <input type='hidden' id='productName' value='$result[2]'>
            </div>
        
            <p style='margin-top: 40px; font-size: 20px;'>$result[6]</p>
        
            <!-- hr tag -->
            <hr>
            <!-- hr tag -->
        
            <!-- tab block: just the facts -->
            <div class='tab-bl' onclick='changeTheFacts()'>
                <h3 class='tab-title'>Just the facts</h3>
                <div class='icon-container'>
                    <i id='plus-icon-facts' class='fa-sharp fa-solid fa-plus fa-xl' style='color: #c8cbd0;'></i>
                </div>
            </div>
            <!-- tab content -->
            <ul class='tab-content facts '>
                <li class='my-li '>Materials: Shell - GOTS Certified Premium Organic Cotton</li>
                <li class='my-li'>Filling - Hypoallergenic poly-fill made from recycled bottles. Learn more.</li>
                <li class='my-li'>Height: 15.7” / 40 cm</li>
                <li class='my-li'>Length: 6.6” / 17 cm</li>
                <li class='my-li'>Width: 4.3”/ 11 cm</li>
                <li class='my-li'>Age: 0-onwards</li>
                <li class='my-li'>Meets EU EN 71 Safety Requirements.</li>
                <li class='my-li'>Comes ready to gift in a cotton pouch and a card with the name of the artisan
                    mother who madeit.</li>
            </ul>

            <hr style='border: 2px solid #EFEFEF;'>

        <!-- tab block: change impacts -->
            <div class='tab-bl' onclick='changeImpacts()'>
                <h3 class='tab-title'>Your Impacts</h3>
                <div class='icon-container'>
                    <i id='plus-icon-impacts' class='fa-sharp fa-solid fa-plus fa-xl' style='color: #c8cbd0;'></i>
                </div>
            </div>
        <!-- tab content -->
            <ul class='tab-content impacts'>
                <p class='my-li'>This toy was hand-crocheted in Istanbul, Turkey by a mother in need.</p>
                <p class='my-li'>Your purchase allows us to pay a fair trade wage that helps lift families out of
                    poverty.</p>
                <a href=''>Learn more</a>
            </ul>
            <!-- hr -->
            <hr>
            <!-- hr -->
        </div>";
        }
    }

    addDetail($connect);
?>