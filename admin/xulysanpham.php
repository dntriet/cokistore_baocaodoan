<?php
include('../database/connect.php');
?>

<?php
if (isset($_POST['themsanpham'])) {
    // Lock the table
    mysqli_query($connect, "LOCK TABLES product WRITE");

    // Set isolation level
    mysqli_query($connect, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    // Start transaction
    mysqli_query($connect, "START TRANSACTION");

    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $gia = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc = $_POST['danhmuc'];
    $mota = $_POST['mota'];
    $path = '../assets/img/';

    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $sql_insert_product = mysqli_query($connect, "INSERT INTO product (category_id, title, price, discount, thumbnail, description) VALUES ('$danhmuc','$tensanpham','$gia','$giakhuyenmai','$hinhanh','$mota')");
    move_uploaded_file($hinhanh_tmp, $path . $hinhanh);

    if ($sql_insert_product) {
        mysqli_query($connect, "COMMIT");
    } else {
        mysqli_query($connect, "ROLLBACK");
    }

    // Unlock the tables
    mysqli_query($connect, "UNLOCK TABLES");
} elseif (isset($_POST['capnhatsanpham'])) {
    // Lock the table
    mysqli_query($connect, "LOCK TABLES product WRITE");

    // Set isolation level
    mysqli_query($connect, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    // Start transaction
    mysqli_query($connect, "START TRANSACTION");

    $id_update = $_POST['id_update'];
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $gia = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc = $_POST['danhmuc'];
    $mota = $_POST['mota'];
    $path = '../assets/img/';

    if ($hinhanh == '') {
        $sql_update_image = "UPDATE product SET title='$tensanpham', description='$mota', price='$gia', discount='$giakhuyenmai', category_id='$danhmuc' WHERE product_id='$id_update'";
    } else {
        move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
        $sql_update_image = "UPDATE product SET title='$tensanpham', description='$mota', price='$gia', discount='$giakhuyenmai', thumbnail='$hinhanh', category_id='$danhmuc' WHERE product_id='$id_update'";
    }

    $update_result = mysqli_query($connect, $sql_update_image);
    if ($update_result) {
        mysqli_query($connect, "COMMIT");
    } else {
        mysqli_query($connect, "ROLLBACK");
    }

    // Unlock the tables
    mysqli_query($connect, "UNLOCK TABLES");
}

if (isset($_GET['xoa'])) {
    // Lock the table
    mysqli_query($connect, "LOCK TABLES product WRITE");

    // Set isolation level
    mysqli_query($connect, "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
    // Start transaction
    mysqli_query($connect, "START TRANSACTION");

    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($connect, "DELETE FROM product WHERE product_id='$id'");

    if ($sql_xoa) {
        mysqli_query($connect, "COMMIT");
    } else {
        mysqli_query($connect, "ROLLBACK");
    }

    // Unlock the tables
    mysqli_query($connect, "UNLOCK TABLES");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm</title>
    <link href="../assets/css/boostrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body style="background-color:#D2DE32">
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
                <li class="nav-item">
                    <a class="nav-link" href="lichsugiaodich.php">Lịch sử giao dịch</a>
                </li>
            </ul>
            <div style="text-align:right">
                <a href="../include/login.php">Đăng xuất</a>
            </div>
        </div>
    </nav><br><br>
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['quanly']) && $_GET['quanly'] == 'capnhat') {
                $id_capnhat = $_GET['capnhat_id'];
                $sql_capnhat = mysqli_query($connect, "SELECT * FROM product WHERE product_id='$id_capnhat'");
                $row_capnhat = mysqli_fetch_array($sql_capnhat);
                $id_category_1 = $row_capnhat['category_id'];
            ?>
            <div class="col-md-4">
                <h4>Cập nhật sản phẩm</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['title'] ?>"><br>
                    <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['product_id'] ?>">
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh"><br>
                    <img src="../uploads/<?php echo $row_capnhat['thumbnail'] ?>" height="80" width="80"><br>
                    <label>Giá</label>
                    <input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['price'] ?>"><br>
                    <label>Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="giakhuyenmai" value="<?php echo $row_capnhat['discount'] ?>"><br>
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['description'] ?></textarea><br>
                    <label>Danh mục</label>
                    <?php
                    $sql_danhmuc = mysqli_query($connect, "SELECT * FROM category ORDER BY category_id DESC");
                    ?>
                    <select name="danhmuc" class="form-control">
                        <option value="0">-----Chọn danh mục-----</option>
                        <?php
                        while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                            if ($id_category_1 == $row_danhmuc['category_id']) {
                        ?>
                        <option selected value="<?php echo $row_danhmuc['category_id'] ?>">
                            <?php echo $row_danhmuc['category_name'] ?>
                        </option>
                        <?php
                            } else {
                        ?>
                        <option value="<?php echo $row_danhmuc['category_id'] ?>">
                            <?php echo $row_danhmuc['category_name'] ?>
                        </option>
                        <?php
                            }
                        }
                        ?>
                    </select><br>
                    <input style="background-color:blue" type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default">
                </form>
            </div>
            <?php
            } else {
            ?>
            <div class="col-md-4">
                <h4>Thêm sản phẩm</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh"><br>
                    <label>Giá</label>
                    <input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
                    <label>Giá khuyến mãi</label>
                    <input type="text" class="form-control" name="giakhuyenmai" placeholder="Giá khuyến mãi"><br>
                    <label>Mô tả</label>
                    <textarea class="form-control" name="mota"></textarea><br>
                    <label>Danh mục</label>
                    <?php
                    $sql_danhmuc = mysqli_query($connect, "SELECT * FROM category ORDER BY category_id DESC");
                    ?>
                    <select name="danhmuc" class="form-control">
                        <option value="0">-----Chọn danh mục-----</option>
                        <?php while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) { ?>
                        <option value="<?php echo $row_danhmuc['category_id'] ?>">
                            <?php echo $row_danhmuc['category_name'] ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select><br>
                    <input type="submit" name="themsanpham" value="Thêm sản phẩm">
                </form>
            </div>
            <?php
            }
            ?>
            <div class="col-md-8" style="max-height:600px;overflow-y: scroll;">
                <h4>Liệt kê sản phẩm</h4>
                <?php
                $sql_select_sp = mysqli_query($connect, "SELECT * FROM product, category WHERE product.category_id=category.category_id ORDER BY product.product_id DESC");
                ?>
                <table class="table table-bordered ">
                    <tr>
                        <th>Thứ tự</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Danh mục</th>
                        <th>Giá sản phẩm</th>
                        <th>Giá khuyến mãi</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php
                    $i = 0;
                    while ($row_sp = mysqli_fetch_array($sql_select_sp)) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_sp['title'] ?></td>
                        <td><img src="../assets/img/<?php echo $row_sp['thumbnail'] ?>" height="80" width="auto"></td>
                        <td><?php echo $row_sp['category_name'] ?></td>
                        <td><?php echo number_format($row_sp['price']) ?></td>
                        <td><?php echo number_format($row_sp['discount']) ?></td>
                        <td><a href="?xoa=<?php echo $row_sp['product_id'] ?>">Xóa</a> || <a
                                href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['product_id'] ?>">Cập nhật</a></td>
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
