<?php
// SIGN UP
function emptyInputSignup($fname, $email,$phoneNumber, $psw, $pswRepeat){
    $result;
    if(empty($fname) || empty($email) || empty($phoneNumber) || empty($psw) || empty($pswRepeat)){
        $result=true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidUid($fname){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$fname)){
        $result = true;
    }
    else{
        $result= false;
    }
    return $result;
}
function invalidEmail($email){
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result= false;
    }
    return $result;
}
function pwdMatch($psw, $pswRepeat){
    $result;
    if($psw !== $pswRepeat){
    $result =true;
    }
    else{
        $result=false;
    }
    return $result;
}

function uidExists($connect, $email){
    $result;
    $sql="SELECT * FROM user WHERE email= ?  ;";
    $stmt = mysqli_stmt_init($connect);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../include/signup.php?error=sqlError");
            exit();
    }
    else {
        mysqli_stmt_bind_param($stmt,'s',$email);
        mysqli_stmt_execute($stmt);
        $rerultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($rerultData)){
            return $row;
        }
        else {
            $result = false;
            return $result;
        }
    }
    mysqli_stmt_close($stmt);
}

function createUser($connect, $fname, $email, $phoneNumber, $psw){
    $uidExists =uidExists($connect,$email);
    $code_password = substr(md5(uniqid()), 0, 5);
    $_SESSION['codepassword']=$uidExists['code_password'];
    $sql ="INSERT INTO user(fullname,email,phone_number,password,code_password) VALUES (?,?,?,?,?)";
    $stmt=mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../include/signup.php?error=sqlFailed");
            exit();
    }
    $hashPsw = password_hash($psw,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,'sssss',$fname,$email,$phoneNumber,$hashPsw,$code_password);
    mysqli_stmt_execute($stmt);
    header("location: ../include/login.php");
            exit();
}
// END SIGN UP
// LOGIN
function login($uname,$psw){
    $result;
    if(empty($uname) || empty($psw)){
        $result =true;
    }
    else{
        $result = false;
    }
    return $result;
}
// ADMIN LOGIN
function loginAdmin($connect,$adEmail,$adPassword){
    $result;
    $sql = "SELECT * FROM admin WHERE ad_email =? AND ad_password =?";
    $stmt=mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:../include/login.php?error=sqlFailed");
            exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $adEmail, $adPassword);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $row =mysqli_num_rows($resultData);
    if($row>0){
        $result = true;
    }
    else{
            $result = false;
        }
return $result;
}
// END ADMIN LOGIN


//USER LOGIN
function loginUser($connect,$uname,$psw){
    $uidExists =uidExists($connect,$uname,$uname);
    if($uidExists === false){
    header("location:../include/login.php?error=wronglogin");
        exit();
    }
    $pswHash = $uidExists["password"];
    $checkPsw = password_verify($psw,$pswHash);
    if($checkPsw === false){
        header("location:../include/login.php?error=wrongpassword");
            exit();
    }
    else if($checkPsw === true){
        session_start();
        $_SESSION['username'] = $uidExists["fullname"];
        $_SESSION['useruid'] = $uidExists["email"];
        $_SESSION['psw'] = $uidExists['password'];
        header("location: ../include/product.php");
        exit();
    }
}
//END USER LOGIN


// END LOGIN

//CHECK PASSWORD
function generateHash($psw) {
    return password_hash($psw, PASSWORD_DEFAULT);
}

    // Hàm để kiểm tra mật khẩu có khớp với hash hay không
function verifyPassword($psw, $hash) {
    return password_verify($psw, $hash);
}

function loadStar($connect,$yellow,$white){
    $sql = "SELECT * FROM star LIMIT 1";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_fetch_array($result);
            //sao vàng
            for($i=0 ; $i<$yellow ; $i++) {
                echo "<svg width='22px' height='22px'>
                <image href='../assets/img/$row[0]' width='100%' height='100%'/>
            </svg>";
        }
        // không sao
        for($i=0 ; $i<$white ; $i++) {
                echo "<svg width='22px' height='22px'>
                <image href='../assets/img/$row[1]' width='100%' height='100%'/>
            </svg>";
        }
}