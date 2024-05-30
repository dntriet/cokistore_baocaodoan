<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/style-homepage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Tilt+Neon&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Coki</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="../include/Homepage.php" class="navbar-brand">
                <img style="width: 160px; height: 68px; margin-top: 20px; margin-left: 50px;"
                    src="../assets/img/coki-logo.png"></a>
            <div class="navbar-collapse mr-auto">
                <ul class="navbar-nav homepage-navbar-buttons">
                    <li class="nav-item" style="margin-left: 200px"><a href="./product.php"
                            class="nav-link">Categories<i class="bi bi-chevron-down"></i>
                            <!-- <div class="dropdown">    
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> -->
                        </a></li>
                    <li class="nav-item"><a href="./about_us.php" class="nav-link">About COKI</a></li>
                    <li class="nav-item"><a href="./contact.php" class="nav-link">Contact Us</a></li>
                    <li class="nav-item homepage-search">
                        <div class="input-group mb-3 homepage-search">
                            <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item homepage-login">
                        <a class="nav-link" href="./login.php"><i class="bi bi-person"></i>Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section style="overflow: hidden;">
        <div id="carousel-entrance" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" style="margin-top: 0px; margin-left: 0px">
                <a class="carousel-control-prev" href="#carousel-entrance" role="button" data-slide="prev">
                    <i class='bx bx-chevron-left' style="font-size: 70px; color: black;"></i>
                </a>
                <a class="carousel-control-next" href="#carousel-entrance" role="button" data-slide="next">
                    <i class='bx bx-chevron-right' style="font-size: 70px; color: black;"></i>
                </a>
                <div class="carousel-item active" id="slide-1">
                    <img src="https://bebemoss.com/cdn/shop/files/site_slides_5ba6c32e-ea8b-489e-b053-c1adc2e8512d_1800x.png?v=1682502100"
                        alt="">
                    <div class="carousel-caption in-image-caption-entrance-slide">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        <a href="product.php">
                            <button class="homepage-button" id="homepage-entrance-slide-button">Explore</button>
                        </a>
                    </div>
                </div>
                <div class="carousel-item" id="slide-2">
                    <img src="https://bebemoss.com/cdn/shop/files/1_176eb1bd-ad82-4461-8d1b-5bd9206f1a7a_1800x.png?v=1656147681"
                        alt="">
                    <div class="carousel-caption in-image-caption-entrance-slide">
                        <h5>Second slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        <a href="product.php">
                            <button class="homepage-button" id="homepage-entrance-slide-button">Explore</button>
                        </a>
                    </div>
                </div>
                <div class="carousel-item" id="slide-3">
                    <img src="https://bebemoss.com/cdn/shop/files/site_slides_1_1800x.png?v=1685692466" alt="">
                    <div class="carousel-caption in-image-caption-entrance-slide">
                        <h5>Third slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        <a href="product.php">
                            <button class="homepage-button" id="homepage-entrance-slide-button">Explore</button>
                        </a>

                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ol class="carousel-indicators homepage-entrance-indicators">
                    <li data-target="#carousel-entrance" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-entrance" data-slide-to="1"></li>
                    <li data-target="#carousel-entrance" data-slide-to="2"></li>
                </ol>
            </nav>
        </div>
        <section class="homepage-best-sellers-con">
            <div class="homepage-title-best-sellers">Our Best Sellers</div>
            <div class="homepage-best-sellers">
                <div class="homepage-best-sellers-data">
                    <div style="width: 400px; height: 400px">
                        <img src="https://bebemoss.com/cdn/shop/products/orlando-the-whale-teal-handmade-organic-cotton-toy-37829125112028_5000x.jpg?v=1663070138"
                            alt="">
                        <p>Ca voi xanh</p>
                        <p>1.009.000 đ</p>
                    </div>
                    <div style="width: 400px; height: 400px">
                        <img src="https://bebemoss.com/cdn/shop/products/patty-the-flamingo-handmade-organic-cotton-stuffed-animal-30348963446977_5000x.jpg?v=1627983524"
                            alt="">
                        <p>Hong hac</p>
                        <p>1.345.909 đ</p>
                    </div>
                    <div style="width: 400px; height: 400px">
                        <img src="https://bebemoss.com/cdn/shop/products/azalea-the-mermaid-blonde-handmade-organic-cotton-stuffed-animal-38096470737116_5000x.jpg?v=1666175675"
                            alt="">
                        <p>Nguoi ca</p>
                        <p>1.567.000 đ</p>
                    </div>
                    <div style="width: 400px; height: 400px">
                        <img src="https://bebemoss.com/cdn/shop/products/rex-the-dino-handmade-organic-cotton-toy-30361444057281_5000x.jpg?v=1627980292"
                            alt="">
                        <p>Khung long xanh</p>
                        <p>1.000.000 đ</p>
                    </div>
                </div>
                <div class="homepage-best-sellers-data">
                    <div style="width: 400px; height: 400px">
                        <img src="https://bebemoss.com/cdn/shop/products/seth-the-seagull-handmade-organic-cotton-toy-37828798873820_5000x.jpg?v=1663066359"
                            alt="">
                        <p>Chu chim nho</p>
                        <p>1.409.000 đ</p>
                    </div>
                    <div style="width: 400px; height: 400px">
                        <img src="https://bebemoss.com/cdn/shop/products/rose-the-unicorn-handmade-organic-cotton-stuffed-animal-37657168085212_5000x.jpg?v=1660471118"
                            alt="">
                        <p>Ky lan trang</p>
                        <p>1.845.909 đ</p>
                    </div>
                    <div style="width: 400px; height: 400px">
                        <img src="https://bebemoss.com/cdn/shop/products/oliver-the-cat-light-blue-handmade-organic-cotton-toy-30358894903489_5000x.jpg?v=1627965698"
                            alt="">
                        <p>Meo xanh xanh</p>
                        <p>1.967.000 đ</p>
                    </div>
                    <div style="width: 400px; height: 400px">
                        <img src="https://bebemoss.com/cdn/shop/products/willy-the-penguin-handmade-organic-cotton-toy-37631376785628_5000x.jpg?v=1660058019"
                            alt="">
                        <p>Chim canh cut</p>
                        <p>1.630.000 đ</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="homepage-button-container"><a href="product.php"><button class="homepage-button">SHOP THE WHOLE
                    COLLECTION</button></a></div>
        <div class="homepage-text-discover">
            <p style="margin-top: 50px; font-size: 30px; color: #E7BAA0;">Discover our Mini collection!</p>
            <br>
            <p>Introducing our adorable collection of hand-crocheted animals made with the softest, organic cotton
                yarns. These super cute stuffed animals are miniature versions of our bestsellers, measuring about 8
                inches. Perfectly sized for little hands, these charming creatures make the ideal companion for children
                of all ages.</p>
            <p>Super cute, sustainable, made with ethically-sourced materials, and produced in fair working conditions.
            </p>
            <p> Bring a touch of whimsy and joy to your home with these delightful crochet animals, knowing that you are
                supporting a community of skilled artisans and promoting a more ethical, sustainable future.</p>
        </div>
        <div id="multi-slide-carousel" class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col">
                            <img src="https://bebemoss.com/cdn/shop/products/willy-the-penguin-handmade-organic-cotton-toy-37631376785628_5000x.jpg?v=1660058019"
                                alt="">
                            <p>Chim canh cut</p>
                            <p>1.630.000 đ</p>
                        </div>
                        <div class="col">
                            <img src="https://bebemoss.com/cdn/shop/products/rose-the-unicorn-handmade-organic-cotton-stuffed-animal-37657168085212_5000x.jpg?v=1660471118"
                                alt="">
                            <p>Ky lan trang</p>
                            <p>1.845.909 đ</p>
                        </div>
                        <div class="col">
                            <img src="https://bebemoss.com/cdn/shop/products/seth-the-seagull-handmade-organic-cotton-toy-37828798873820_5000x.jpg?v=1663066359"
                                alt="">
                            <p>Chu chim nho</p>
                            <p>1.409.000 đ</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col">
                            <img src="https://bebemoss.com/cdn/shop/products/darla-the-sheep-white-handmade-organic-cotton-stuffed-animal-22311675472_400x.jpg?v=1601553554"
                                alt="">
                            <p>Cuu xinh xinh</p>
                            <p>1.000.500 đ</p>
                        </div>
                        <div class="col">
                            <img src="https://bebemoss.com/cdn/shop/products/oliver-the-cat-light-blue-handmade-organic-cotton-toy-30358894903489_5000x.jpg?v=1627965698"
                                alt="">
                            <p>Meo xanh xanh</p>
                            <p>1.967.000 đ</p>
                        </div>
                        <div class="col">
                            <img src="https://bebemoss.com/cdn/shop/products/patty-the-flamingo-handmade-organic-cotton-stuffed-animal-30348963446977_5000x.jpg?v=1627983524"
                                alt="">
                            <p>Hong hac</p>
                            <p>1.345.909 đ</p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#multi-slide-carousel" role="button" data-slide="prev">
                <i class='bx bx-chevron-left' style="font-size: 70px; color: black;"></i>
            </a>
            <a class="carousel-control-next" href="#multi-slide-carousel" role="button" data-slide="next">
                <i class='bx bx-chevron-right' style="font-size: 70px; color: black;"></i>
            </a>
        </div>
        <div class="homepage-quote">
            <div class="homepage-quote-title">Your purchase makes an immediate impact</div>
            <div class="homepage-quote-container">
                <div class="homepage-quote-container-sub">
                    <div><img
                            src="https://bebemoss.com/cdn/shop/files/1_3e517ed8-724f-4884-a152-9acdee53e2a6_400x.png?v=1638545509">
                    </div>
                    <div>Our toys are crocheted entirely by hand, helping to preserve traditional crafting practices. We
                        use locally sourced, GOTS certified organic cotton yarn and hypoallergenic polyfill made from
                        recycled bottles. We meet rigorous standards for safety and quality.</div>
                </div>
                <div class="homepage-quote-container-sub">
                    <div><img
                            src="https://bebemoss.com/cdn/shop/files/2_ca5bea82-ebe6-4ca8-a47b-42c10434c65b_400x.png?v=1638545543">
                    </div>
                    <div>We employ over 120 women-in-need, including refugees from Syria & Afghanistan and impoverished
                        women in Turkey. We pay fair trade wages to all our employees, lifting families out of poverty
                        and keeping children in school.</div>
                </div>
                <div class="homepage-quote-container-sub">
                    <div><img
                            src="https://bebemoss.com/cdn/shop/files/3_ede0165e-5efc-4cff-ace0-b3b1e8baf013_400x.png?v=1638545564">
                    </div>
                    <div>We work to erase structural barriers that shut mothers out of the workforce. Our workers set
                        their own schedules with the flexibility to work from home. Our studio has a play area for women
                        in need of child care and we offer job training for those new to crocheting.</div>
                </div>
            </div>
        </div>
        <div class="homepage-button-container"><a href="product.php"><button class="homepage-button">BUY A TOY
                    CHANGE A LIFE</button></a></div>
        <!-- ZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZ -->
        <div class="homepage-review-header">
            <p>What our customer say</p>
            <a style="font-size: 30p"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                    class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></a>
            <p style="margin-top: 15px; font-size: 20px">from 10 billions customers</p>
        </div>
        <div id="multi-slide-carousel-homepage-review" class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row homepage-review-row">
                        <div class="col homepage-review-col">
                            <a style="font-size: 30p"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                    class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></a>
                            <img src="../assets/img/bua-dap-tho-1.png" alt="">
                            <p>Cay bua</p>
                            <p>San pham ban chay</p>
                        </div>
                        <div class="col homepage-review-col">
                            <a style="font-size: 30p"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                    class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></a>
                            <img src="../assets/img/hoaqua.png" alt="">
                            <p>Hoa qua</p>
                            <p>San pham chat luong nhieu mau sac</p>
                        </div>
                        <div class="col homepage-review-col">
                            <a style="font-size: 30p"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                    class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></a>
                            <img src="https://bebemoss.com/cdn/shop/products/darla-the-sheep-white-handmade-organic-cotton-stuffed-animal-22311675472_400x.jpg?v=1601553554"
                                alt="">
                            <p>Cuu xinh xinh</p>
                            <p>San pham de thuong cho be</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row homepage-review-row">
                        <div class="col homepage-review-col">
                            <a style="font-size: 30p"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                    class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></a>
                            <img src="../assets/img/gau1.png" alt="">
                            <p>Gau de thuong</p>
                            <p>San pham mem min cho be</p>
                        </div>
                        <div class="col homepage-review-col">
                            <a style="font-size: 30p"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                    class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></a>
                            <img src="../assets/img/hubert.png" alt="">
                            <p>Cao do tuoi</p>
                            <p>San pham tuyet voi cho be</p>
                        </div>
                        <div class="col homepage-review-col">
                            <a style="font-size: 30p"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                    class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></a>
                            <img src="../assets/img/khi_giohang.png" alt="">
                            <p>Ton ngo khong</p>
                            <p>San pham Tay Du Ky</p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#multi-slide-carousel-homepage-review" role="button"
                data-slide="prev">
                <i class='bx bx-chevron-left' style="font-size: 70px; color: black;"></i>
            </a>
            <a class="carousel-control-next" href="#multi-slide-carousel-homepage-review" role="button"
                data-slide="next">
                <i class='bx bx-chevron-right' style="font-size: 70px; color: black;"></i>
            </a>
        </div>

        <div class="homepage-text-subcribe">
            <p style="margin-top: 50px; font-size: 30px; color:  black;">We love making new friends!</p>
            <br>
            <p>Join our community and subscribe to our e-mail list to receive our latest
                news, promotions and product launches. We promise we won't spam your mailbox and you can unsubscribe at
                any time</p>
        </div>
    </section>
    <!-- <div class="footer-follow-us">
            <a href="https://www.facebook.com/CoKiStore2023" target="_blank" class="facebook-contact"><i
                    class="fa-brands fa-facebook" title="Facebook"></i></a>
            <a href="troll.php" target="_blank" class="insta-contact"><i class="fa-brands fa-instagram"
                    title="Instagram"></i></a>
            <a href="troll.php" target="_blank" class="tiktok-contact"><i class="fa-brands fa-tiktok"
                    title="Tiktok"></i></a>
            <a href="troll.php" target="_blank" class="X-twitter-contact"><i class="fa-brands fa-twitter"
                    title="Twitter"></i></a>
        </div> -->
    <footer>
        <div class="homepage-footer-container">
            <div class="homepage-footer-list">
                <h6>About</h6>
                <ul class="homepage-footer-item">
                    <li><a href="">Our Story</a></li>
                    <li><a href="">Impact</a></li>
                    <li><a href="">Meet the makers moms</a></li>
                    <li><a href="">Blog</a></li>
                </ul>

            </div>
            <div class="homepage-footer-list">
                <h6>Help</h6>
                <ul class="homepage-footer-item">
                    <li><a href="">FAQs</a></li>
                    <li><a href="">Shipping</a></li>
                    <li><a href="">Exchanges and Returns</a></li>
                    <li><a href="">Terms of Service</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>

            </div>
            <div class="homepage-footer-list">
                <h6>Shop</h6>
                <ul class="homepage-footer-item">
                    <li><a href="">Soft Toy</a></li>
                    <li><a href="">Nursery prints</a></li>
                    <li><a href="">Request a Custom Order</a></li>
                    <li><a href="">Wholesale</a></li>
                </ul>

            </div>
            <div class="homepage-footer-list">
                <a href="#">
                    <img src="../assets/img/coki-logo.png" alt="" class="homepage-footer-img">
                </a>
                <p class="homepage-footer-coki-thanks">We are committed to continuously improving the quality of our
                    service,
                    ensuring that every transaction
                    on our website goes smoothly and securely. Our customer care team is always ready to assist and
                    address
                    any inquiries you may have, ensuring the best online shopping experience possible.</p>
                <p class="homepage-footer-learn-more" title=" co cc gi nua dau ma learn">Learn more</p>
            </div>
        </div>
        <div class="homepage-more-and-more">
            <div>
                <p>Developed by 6TL</p>
                <span>Copyright © 2023 / All Right Reserved</span>
            </div>

            <div class="homepage-footer-follow-us">
                <a href="https://www.facebook.com/CoKiStore2023" target="_blank" class="facebook-contact"><i
                        class="fa-brands fa-facebook" title="Facebook"></i></a>
                <a href="troll.php" target="_blank" class="insta-contact"><i class="fa-brands fa-instagram"
                        title="Instagram"></i></a>
                <a href="troll.php" target="_blank" class="tiktok-contact"><i class="fa-brands fa-tiktok"
                        title="Tiktok"></i></a>
                <a href="troll.php" target="_blank" class="X-twitter-contact"><i class="fa-brands fa-twitter"
                        title="Twitter"></i></a>
            </div>
        </div>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger intent="WELCOME" chat-title="ChatBox_CoKi" agent-id="4b8ee4d4-d925-409f-8945-8836708143bf"
    language-code="en"></df-messenger>

</html>