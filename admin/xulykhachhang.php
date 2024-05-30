<?php
	include('../database/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Khách hàng</title>
    <link href="../assets/css/boostrap.css" rel="stylesheet" type="text/css" media="all" />
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
                    <a class="nav-link" href="xulykhachhang.php">Lịch sử giao dịch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
                </li>

            </ul>
            <div style="text-align:right">
                <a href="../include/login.php">Đăng xuất</a>
            </div>
        </div>
    </nav><br><br>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <h4>Khách hàng</h4>
                <?php
				$sql="SELECT * FROM orders"; 
                $result = mysqli_query($connect,$sql);
				?>
                <table class="table table-bordered ">
                    <tr>
                        <th>Thứ tự</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Thời gian</th>
                        <th>Thao tác</th>

                    </tr>
                    <?php
					$i = 0;
					while($row_order  = mysqli_fetch_array($result)){ 
						$i++;
					?>
                    <tr>
                        <td><?php echo $i; ?></td>

                        <td><?php echo $row_order['fullname']; ?></td>
                        <td><?php echo $row_order['phone_number']; ?></td>
                        <td><?php echo $row_order['email'] ?></td>
                        <td><?php echo $row_order['address'] ?></td>
                        <td><?php echo $row_order['order_date'] ?></td>
                        <td><a href="../admin/xulydonhang.php?tg=<?php echo urlencode($row_order['order_date'])?>">Xem
                                giao
                                dịch</a></td>
                    </tr>
                    <?php
					} 
					?>
                </table>
            </div>

        </div>
    </div>

</body>

</html>