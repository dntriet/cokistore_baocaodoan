<?php include "../database/connect.php" ?>
<?php 
    function myBill($connect){
        $name = $_POST['name'];
        $mail = $_POST['email'];

        $query = "SELECT * FROM orders WHERE fullname='$name' AND email='$mail'";
        $result = mysqli_query($connect, $query);
        $i = 0;
        while($row = mysqli_fetch_array($result)){
            $i++;
            echo "
                <tr>
                    <td>$i</td>
                    <td class='datelBill'>$row[order_date]</td>
                    <td>$row[quantity]</td>
                    <td>$row[price]</td>
                    <td><a style='cursor: pointer;' class='btn_detailBill'>Chi tiết</a></td>
                </tr>
            ";
        }
    }

    function mydetailBill($connect){
        $date = $_POST['date'];
        $query = "SELECT * FROM giaodich WHERE date_giaodich ='$date'";
        $result = mysqli_query($connect, $query);
        $i = 0;
        while($row = mysqli_fetch_array($result)){
                $i++;
            if($row['order_status']==0)
            {
                $row['order_status']='<span style="color:red">Đã hủy</span>';
            }
            else if($row['order_status']==1){
                $row['order_status']= '<span style="color:green">Đã xác nhận</span>';
            }
            else{
                $row['order_status']='<span style="color:#F3B664">Chờ xử lý</span>';
            }
            echo "
                <tr>
                    <td>$row[title]</td>
                    <td>$row[quantity]</td>
                    <td>$row[price]</td>
                    <td>$row[order_status]</td>
                </tr>
            ";
        }
    }

    function myProfile($connect){
        $name = $_POST['name'];
        $mail = $_POST['email'];
        // $avata = $_POST['avatar_Old'];

        $query = "SELECT * FROM user WHERE fullname='$name' AND email='$mail'";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result)){
            echo '
            <form class="simple-form">
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" value="'."$row[fullname]".'" disabled>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="'."$row[email]".'" disabled>

                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" value="'."$row[phone_number]".'" disabled>

                <label for="avatar">Ảnh đại diện:</label>
                <input type="file" id="avatar" name="avatar" value="">

                <input type="button" value="Cập nhập" class="btnUpdate">

                <i style="display: flex; justify-content: space-between;">
                    <a class="profile_pass" style="cursor: pointer; text-decoration: underline;">Đổi mật khẩu</a>
                    <a class="profile_change" style="cursor: pointer; text-decoration: underline;">Chỉnh sửa</a>
                </i>
            </form>
            ';
        }
    }

    function changeInfor($connect){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $name_O = $_POST['name_Old'];
        $mail_O = $_POST['email_Old'];


        $query = "  UPDATE user
                    SET fullname = '$name', email = '$email', phone_number = '$phone'
                    WHERE fullname = '$name_O' AND email = '$mail_O'"
                ;

        $query_Update = "UPDATE orders
                        SET fullname = '$name', email = '$email'
                        WHERE fullname = '$name_O' AND email = '$mail_O'";
                        
        $result_Update = mysqli_query($connect, $query_Update);
        $result = mysqli_query($connect, $query);

        return $result.''.$result_Update;
    }
    function changePassword($connect) {
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['change_pwd'];
        $name = $_POST['name'];
        $mail = $_POST['email'];

        $sqlSelectPwd = "SELECT * FROM user WHERE fullname = '$name' AND email = '$mail' "; // Thay đổi trường username nếu cần thiết
        $result = mysqli_query($connect, $sqlSelectPwd);
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($oldPassword, $row['password'])) {
            $pwdHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $sqlChangePwd = "UPDATE user SET password = '$pwdHash' WHERE fullname = '$name' AND email = '$mail'";
            $updateResult = mysqli_query($connect, $sqlChangePwd);

            if ($updateResult) {
                echo "Mật khẩu đã được thay đổi thành công.";
            } else {
                echo "Không thể thay đổi mật khẩu.";
            }
        }
        else {
            echo "Mật khẩu cũ không đúng.";
        }
    }

?>
<?php 
    if(isset($_POST['action'])){
        $action = $_POST['action'];
        if($action == 'myBill') myBill($connect);
        if($action == 'mydetailBill') mydetailBill($connect);
        if($action == 'myProfile') myProfile($connect);
        if($action == 'changeInfo') changeInfor($connect);
        if($action == "changePassord") changePassword($connect);
    }
?>