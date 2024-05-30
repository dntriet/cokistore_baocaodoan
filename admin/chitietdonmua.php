<?php
	include('../database/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đơn hàng</title>
    <link href="../assets/css/boostrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="thongtinkhachhang.php">Khách hàng</a>
                </li>
                <li class=" nav-item">
                    <a class="nav-link" href="lichsugiaodich.php">Lịch sử giao dịch</a>
                </li>

            </ul>
            <div style="text-align:right">
                <a href="../include/login.php">Đăng xuất</a>
            </div>
        </div>
    </nav><br><br>
    <div class="">
        <div class="">
            <h4>Chi tiết đơn mua</h4>

            <?php
                if(isset($_GET['tg'])){
                    $tg = $_GET['tg'];
                    $sql_giaodich ="SELECT * FROM giaodich WHERE date_giaodich='$tg'";
                    $result_giaodich = mysqli_query($connect, $sql_giaodich);
				?>

            <h5 style="color :#557C55">Thời gian mua: <?php echo $tg?></h5>
            <table class="table table-bordered ">
                <tr>
                    <th>Thứ tự</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                </tr>
                <?php

					$i = 0;
					while($row_giaodich = mysqli_fetch_array($result_giaodich)){ 
						$i++;
					?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row_giaodich['title'] ?></td>
                    <td><?php echo $row_giaodich['quantity'] ?></td>
                    <td><?php echo number_format($row_giaodich['price']) ?></td>
                    <td><?php echo number_format(floatval($row_giaodich['quantity'])*floatval($row_giaodich['price'])) ?>
                    </td>
                    <td style="color :#557C55"> 
                    <?php   if($row_giaodich['order_status'] == 1){
                                echo "<span><i class='fa-regular fa-circle-check fa-xl' style='color: #36b300;'></i> Đã xác nhận</span>";
                            } else if($row_giaodich['order_status'] == 0){
                                echo "<span style='color:#ba1717'><i class='fa-solid fa-xmark fa-xl' style='color: #ba1717;'></i> Đã Hủy</span>";
                            } else if($row_giaodich['order_status'] == 2){
                                echo"<span  style='color:#FFB534'>Chưa xác nhận</span>";
                            }
                    ?>
                    </td>
                </tr>

                <?php
					}
                }
				?>
            </table>
        </div>
    </div>
</body>
</html>