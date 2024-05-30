<?php include_once 'header.php'?>
<form method="post">
    <div class="restore_container">
        <div class="restore-contact-header">
            <h5>Reset Password</h5>
        </div>

        <div style="text-align: center;color:red">
            <?php 
    require_once '../database/connect.php';

// Hàm để tạo hash từ mật khẩu
   
    if(isset($_POST["submit"])){
        $getEmail = $_POST["email"];
        $sql ="SELECT * FROM user WHERE email=?";
        $stmt=mysqli_prepare($connect,$sql);
        mysqli_stmt_bind_param( $stmt,'s',$getEmail);
        mysqli_stmt_execute($stmt);
        $result =mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if($row && $row['email'] == $getEmail){
        echo"<span >We will sent a message to ".$row['email']."</span>";
            require_once 'sendmail.php';
    }  else{
            echo"<span>Incorect email!</span>";
        }
    }
?>
        </div>
        <label for="email">Email</label>
        <input type="text" placeholder="Enter Your Email" name="email" required>
        <div class="text-container" align="center">
            <button class="restore_submit-btn" name="submit">Submit</button>
            <span>or <a href="login.php">Cancel</a></span>
        </div>
    </div>
</form>

<?php include_once 'footer.php'?>