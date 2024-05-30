<?php
include '../database/connect.php';

if (isset($_POST["submit"])) {
    $name = $_POST['name-contact'];
    $email = $_POST['email-contact'];
    $message = $_POST['message-contact'];
    $phone = $_POST['phone-contact'];

    $sql = "INSERT INTO contact (fullname, email, phone_number, note) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $phone, $message);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $response = true;
        } else {
            $response = false;
        }

        mysqli_stmt_close($stmt);
    } else {
        $response = false;
    }

    mysqli_close($connect);
} else {
    $response = false;
}
header('Content-Type: application/json');
echo json_encode($response);
exit();