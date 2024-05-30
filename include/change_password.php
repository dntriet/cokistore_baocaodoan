<?php include_once 'header.php';   
require_once '../database/connect.php';?>

<form method="post">
    <div class="restore_container">

        <div class="restore-contact-header">
            <h5>Change your password</h5>
        </div>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Your email" required>
        <label for="email">Code</label>
        <input type="text" name="code" placeholder="Enter the code we sent" required>
        <label for="email">New password</label>
        <input type="password" name="password" placeholder="Your email" required>
        <label for="email">Repeat password</label>
        <input type="password" name="password_repeat" placeholder="Your email" required>

        <div class="text-container" align="center">
            <button class="restore_submit-btn" type="submit" name="submit">Submit</button>
            <span>or <a href="login.php">Cancel</a></span>
        </div>
    </div>
</form>
<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $code = $_POST['code'];
    $pwd = $_POST['password'];
    $pwdRepeat = $_POST['password_repeat'];

    if($pwd!==$pwdRepeat){
        echo '<p style="color:red;text-align:center;font-size:22px">Password do not match!</p>';
        exit;
    }
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($connect,$sql);
    if(!$result){
        echo'<p style="color:red;text-align:center;font-size:22px">Email do not match!</p>';
    }
    else{
        $row = mysqli_fetch_array($result);
        if($code !== $row['code_password']){
            echo'<p style="color:red;text-align:center;font-size:22px"> Wrong code!</p>';
        }  else{
            $newCode = substr(md5(uniqid()), 0, 5);
            $pwdHash = password_hash($pwd,PASSWORD_DEFAULT);
            $updateQuery = "UPDATE `user` SET `password`='$pwdHash',`code_password`='$newCode' WHERE email = '$email'";
            mysqli_query($connect,$updateQuery);
        }
    }
      
    
}

?>