<?php include_once 'header.php'; ?>

<div id="product_detail-content">
    <!-- first block - product block -->
    <div id="product-block">
        <!-- sản phẩm Chi tiết ở đây -->

    </div>
    <!-- end of first block -->

    <!-- second block - overall review -->
    <div id="overview-comment-block" style="text-align: center; ">
        <!-- from our customer -->
        <h2 id="heading2">From our customers</h2>

        <!-- overall rating -->
        <div id="overall-rating">
            <!-- left division of overall rating -->
            <div id="left-div-overall">
                <!-- top sub div -->
                <div style="display: flex; align-items:end;">
                    <?php
                    require_once '../database/fnc.db.php';
                    require_once '../database/connect.php';
                    loadStar($connect,5,0);
                ?>
                    <p style="margin: 0px; margin-left: 5px;">5.00 out of 5</p>
                </div>
                <!-- bottom sub div -->
                <div style="margin: 0px; text-align: left;">
                    Based on 46 reviews
                </div>
            </div>

            <!-- middle vertical line -->
            <div id="vertical-line"></div>

            <!-- right division -->
            <div id="right-div-overall" style="margin-left: 40px;">
                <!-- 5 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect,5,0) ?>

                    <div class="showing-star-rating"></div>

                    <p class="quantity-review">134</p>
                </div>
                <!-- 4 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect,4,1) ?>

                    <div class="showing-star-rating" style="background-color: #EFEFEF;"></div>

                    <p class="quantity-review">0</p>
                </div>
                <!-- 3 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect,3,2) ?>

                    <div class="showing-star-rating" style="background-color: #EFEFEF;"></div>

                    <p class="quantity-review">0</p>
                </div>
                <!-- 2 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect,2,3) ?>

                    <div class="showing-star-rating" style="background-color: #EFEFEF;"></div>

                    <p class="quantity-review">0</p>
                </div>
                <!-- 1 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect,1,4) ?>

                    <div class="showing-star-rating" style="background-color: #EFEFEF;"></div>

                    <p class="quantity-review">0</p>
                </div>
                <!-- 0 stars -->
                <div class="quantity-star-rating-div">
                    <?php loadStar($connect,0,5) ?>

                    <div class="showing-star-rating" style="background-color: #EFEFEF;"></div>

                    <p class="quantity-review">0</p>
                </div>
            </div>
        </div>
        <hr>
        <div id="double-recognition-img">
            <img src="https://judgeme-public-images.imgix.net/judgeme/medals-v2/auth/diamond.svg?auto=format" alt=""
                class="recog-img">
            <img src="https://judgeme-public-images.imgix.net/judgeme/medals-v2/tran/gold.svg?auto=format" alt=""
                class="recog-img">
        </div>
        <hr>
    </div>
    <!-- end of second block -->

</div>
<script src="../assets/js/addsession_myCart.js"></script>
<script>
// Hàm tự động cập nhập chi tiết sản phẩm
$(document).ready(function() {
    $("#product-block").empty();
    var name = localStorage.getItem("nameProductDetail")
    $.ajax({
        url: "../database/addDetail.php",
        type: "POST",
        data: {
            nameDetail: name,
        },
        success: function(respond) {
            $("#product-block").append(respond);
        },
    });
})
</script>
<?php include_once 'footer.php';?>