<?php

session_start();
if (isset($_SESSION['iid'])) {
    echo "Hello";
    header("Location: ./supplier_home.php");
}


if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password != $cpassword) {
        header('Location: ./supplier_sign_up.php?error=Password Mismatched');
    }
    $conn = mysqli_connect('localhost', 'root', '', 'college_inv');
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM supplier WHERE email='$email'")) > 0) {
        header('Location: ./supplier_sign_up.php?error=Already Exist');
    }
    $result = mysqli_query($conn, "INSERT INTO supplier(sup_name, password, email) VALUES ('$name', '$password','$email'    )");

    if (!$result) {
        header('Location: ./supplier_sign_up.php?error=Error Inserting');
    } else {
        header('Location: ./supplier_sign_up.php?error=Successfully Inserted, You will get approved Successfully!!');
    }
}
?>