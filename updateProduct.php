<?php

session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ./login.php");
}


if (isset($_POST['prod_name'])) {
    $name = $_POST['prod_name'];
    $cat_id = $_POST['cat_id'];
    $sup_id = $_POST['sup_id'];
    $rate = $_POST['rate'];


    $conn = mysqli_connect('localhost', 'root', '', 'college_inv');
    if ($_POST['update'] == '0' || $_POST['update'] == 0) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products WHERE prod_name='$name'")) > 0) {
            header('Location: ./products.php?error=Already Exist');
        }
        $result = mysqli_query($conn, "INSERT INTO products (prod_name, cat_id, sup_id, rate) VALUES ('$name', '$cat_id', '$sup_id', '$rate')");

        if (!$result) {
            header('Location: ./products.php?error=Error Inserting');
        } else {
            header('Location: ./products.php?error=Successfully Inserted');
        }

    } else {
        $id = $_POST['update'];
        $result = mysqli_query($conn, "UPDATE products SET prod_name = '$name', cat_id='$cat_id', sup_id='$sup_id', rate='$rate' WHERE prod_id='$id'");

        if (!$result) {
            header('Location: ./products.php?error=Error Updating');
        } else {
            header('Location: ./products.php?error=Successfully Updated');
        }
    }
} else {
    header('Location: ./products.php');
}