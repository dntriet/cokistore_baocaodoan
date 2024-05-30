<?php
include('../database/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đơn hàng</title>
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
            <h4>Liệt kê đơn hàng</h4>
            <?php
            // Set transaction isolation level
            mysqli_query($connect, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
            // Lock the table
            //mysqli_query($connect, "LOCK TABLES giaodich WRITE");
            if(isset($_GET['tg']) && isset($_GET['stt'])){
                $tg = $_GET['tg'];
                $stt = $_GET['stt'];
                $sql_update = "UPDATE giaodich SET order_status='$stt' WHERE date_giaodich='$tg'";
                $result_update = mysqli_query($connect,$sql_update);
                $result_giaodich = mysqli_query($connect,"SELECT * FROM giaodich WHERE date_giaodich='$tg'");
                $row_giaodich = mysqli_fetch_array($result_giaodich);
                $result_donhang = mysqli_query($connect,"SELECT * FROM orders WHERE order_date='$tg'");
                ?>
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
                    while($row_donhang = mysqli_fetch_array($result_donhang)){
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row_giaodich['title'] ?></td>
                            <td><?php echo $row_donhang['quantity'] ?></td>
                            <td><?php echo number_format($row_donhang['price']) ?></td>
                            <td><?php echo number_format(floatval($row_donhang['quantity'])*floatval($row_donhang['price'])) ?>
                            </td>
                            <?php
                            if($row_giaodich['order_status'] == 1){
                                echo "<td><span style='color:green'>Đã xác nhận</span></td>";
                            }
                            else if($row_giaodich['order_status'] == 0){
                                echo "<td><span style='color:red'>Đã Hủy</span></td>";
                            }
                            else{
                                echo "<td><span style='color:red'>Đang chờ . . .</span></td>";

                            }
                            ?>

                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <?php
    // Unlock the table
    //mysqli_query($connect, "UNLOCK TABLES");
    ?>
</body>

</html>
