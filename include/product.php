<?php
    include_once 'header.php';
?>

<div class="product-main-container">
    <div class="product-name-page">
        <h2><span class="magic">
                <span class="magic-star">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                    </svg>
                </span>
                <span class="magic-star">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                    </svg>
                </span>
                <span class="magic-star">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                    </svg>
                </span>
                <a href="#" class="magic-text">HOME</a>
                <span style="color:blueviolet"> / </span>
                <a href="" class="magic-text">PRODUCTS</a>
            </span>
        </h2>
    </div>

    <div class="product-list-product">
        <!-- sản phẩm -->
    </div>
    <!-- LOADMORE -->
    <div class="loadmore" style="width: 100%; text-align: center">
        <button class="btn-loadmore-product"><span style='margin-right:4px;'><i
                    class="fa-solid fa-arrow-turn-down fa-bounce"></i></span>More</button>
    </div>


    <!-- end product -->
    <!-- show img of product -->
    <div class="gallery__carousel">
        <div class="product-best-sell">
            <h3>Signatures</h3>
        </div>
        <div class="carousel-list-img">
            <?php
            require_once '../database/connect.php';
            $limit =5;
            $sql = "SELECT * FROM product LIMIT $limit";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo"<div class='carousel-img-item'>
                    <div data-fancybox='images' class='image' href='../assets/img/$row[5]'>
                            <img src='../assets/img/$row[5]' style='width: 200px; height: 200px' alt='' />
                    </div>
                        <a href='#' class='signature-detail'>
                            <p>$row[2]</p>
                            <span>$row[4] đ <del style='color:#8C8B8B;margin-left: 6px;font-size:12px'>$row[3]đ</del></span>
                        </a>
                </div>
                ";
            }
            ?>

        </div>
    </div>
    <!-- commning soon -->
    <div class="product-coming-soon">
        <div class="coming-soon">
            <h3>Coming Soon</h3>
        </div>
        <div class="carousel" data-flickity='{ "autoPlay": true }'>
            <div class="carousel-cell" style="background-image: url('../assets/img/khi_giohang.png');">
                <div class="product-coming-soon-detail">
                    <p>Trần Quang Khánh</p>
                    <p>18,000,000 đ</p>
                </div>

            </div>
            <div class="carousel-cell" style="background-image: url('../assets/img/big-friend-fox.png');">
                <div class="product-coming-soon-detail">
                    <p>Trần Quang Khánh</p>
                    <p>18,000,000 đ</p>
                </div>
            </div>
            <div class="carousel-cell" style="background-image: url('../assets/img/hubert.png');">
                <div class="product-coming-soon-detail">
                    <p>Trần Quang Khánh</p>
                    <p>18,000,000 đ</p>
                </div>
            </div>
            <div class="carousel-cell" style="background-image: url('../assets/img/owl.png');">
                <div class="product-coming-soon-detail">
                    <p>Trần Quang Khánh</p>
                    <p>18,000,000 đ</p>
                </div>
            </div>
            <div class="carousel-cell" style="background-image: url('../assets/img/big-friend-fox.png');">
                <div class="product-coming-soon-detail">
                    <p>Trần Quang Khánh</p>
                    <p>18,000,000 đ</p>
                </div>
            </div>
            <div class="carousel-cell" style="background-image: url('../assets/img/missy-fox.png');">
                <div class="product-coming-soon-detail">
                    <p>Trần Quang Khánh</p>
                    <p>18,000,000 đ</p>
                </div>
            </div>
            <div class="carousel-cell" style="background-image: url('../assets/img/big-friend-fox.png');">
                <div class="product-coming-soon-detail">
                    <p>Trần Quang Khánh</p>
                    <p>18,000,000 đ</p>
                </div>
            </div>
            <div class="carousel-cell" style="background-image: url('../assets/img/big-friend-fox.png');">
                <div class="product-coming-soon-detail">
                    <p>Trần Quang Khánh</p>
                    <p>18,000,000 đ</p>
                </div>
            </div>
            <div class="carousel-cell" style="background-image: url('../assets/img/big-friend-fox.png');">
                <div class="product-coming-soon-detail">
                    <p>Trần Quang Khánh</p>
                    <p>18,000,000 đ</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/addProduct.js"></script>
<script src="../assets/js/addsession_myCart.js"></script>
<?php
    include_once'footer.php';
?>