    <?php include_once 'header.php' ?>
    <form action="../database/login.db.php" method="post">
        <div class="login-contact-header">
            <h5>Customer Login</h5>
        </div>
        <div class="imgcontainer">
            <img src="../assets/img/istockphoto-1300845620-612x612.jpg" alt="Avatar" class="avatar">
        </div>
        <div style="text-align:center;">
            <?php
            if (isset($_GET["error"])) {
                echo"<i class='fa-solid fa-volume-high fa-shake' style='color: #c21414; margin-right:4px;'></i>";
                if ($_GET['error'] == "emptyinput") {
                    echo "<span>Fill in all fields!</span>";
                } else if ($_GET['error'] == "wronglogin") {
                    echo "<span>Incorrect login infomation!</span>";
                } else if ($_GET['error'] == 'wrongpassword') {
                    echo '<span>Wrong Password! Please try again.</span>';
                }
            }
           ?>
        </div>

        <div class="login_container">
            <label for="uname"><b>Username</b></label>
            <input class="login_input-username" type="text" placeholder="Enter Username" name="uname" required>
            <br>
            <label for="psw"><b>Password</b></label>
            <input class="login_input-password" type="password" placeholder="Enter Password" name="psw" required>
            <div class="submit-btn">
                <button type="submit" name="submit" class="login_btn-login">Login</button>
                <div class="login_newcustomer">
                    <span>New Customer?</span>
                    <a href="signup.php" class="to-sign_up">Sign up -></a>
                </div>
            </div>

        </div>
        <div class="submit_container" style="background-color:#f1f1f1">
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me | <span class="psw">Forgot <a
                        href="restore_password.php">password?</a></span>
            </label>
        </div>
    </form>

    <?php include_once 'footer.php' ?>