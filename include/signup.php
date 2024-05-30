<?php include_once 'header.php'?>
<form action="../database/signup.db.php" method="post">
    <div class="sign-up_container">
        <div class="signup-contact-header">
            <h5>Sign up</h5>
        </div>
        <p style="font-family: Tilt Neon;">Please fill in this form to create an account</p>
        <hr>
        <?php
        if(isset($_GET['error'])){
            if($_GET['error']=='emptyinput'){
                echo "<p style='color:red; text-align:center'>Fill in all field!</p>";
            }
            if($_GET['error']=='usernametaken'){
                echo "<p style='color:red; text-align:center'>User already exist</p>";
            }
            if($_GET['error']=='invalidemail'){
                echo "<p style='color:red;text-align:center'>Incorrect email format!</p>";
            }
            if($_GET['error']=='passworddontmatch'){
                echo "<p style='color:red; text-align:center'> Password don't match! </p>";
            }
        }
        ?>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" class="input-form">
        <label for="fname"><b>Full Name</b></label>
        <input type="text" placeholder="Enter Full Name" name="fname" class="input-form">
        <label for="tel"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Phone Number" name="tel" class="signup_phone">
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" class="signup_password">
        <label for="psw-repeat"><b>Repeat password</b></label>
        <input type="password" placeholder="Repeat password" name="psw-repeat" class="signup_rptpassword">
        <label for="">
            <input type="checkbox" checked="checked" name="subs"> Subscribe to our newsletter?
        </label>
        <div class="clearfix">
            <a href="login.php"><button type="button" class="cancelbtn">Cancel</button></a>
            <button type="submit" name="submit" class="signupbtn">Sign Up</button>
        </div>
    </div>
    </div>
    </div>
</form>

<?php include_once 'footer.php';?>