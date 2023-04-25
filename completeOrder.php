<?php

session_start();
if (!isset($_SESSION['iid'])) {
    echo "Hello";
    header("Location: ./supplier_login.php");
}

$conn = mysqli_connect('localhost', 'root', '', 'college_inv');

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $result = mysqli_query($conn, "UPDATE orders SET status = '1' WHERE order_id='$id'");
    $prod_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM orders WHERE order_id='$id'"))['prod_id'];
    $order_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM orders WHERE order_id='$id'"))['order_count'];

    if (!$result) {
        header('Location: ./supplier_pending_order.php?error=Error Approving');
    } else {
        $old_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE prod_id='$prod_id'"))['prod_count'];
        $new = $old_count + $order_count;
        $result = mysqli_query($conn, "UPDATE products SET prod_count = '$new' WHERE prod_id='$prod_id'");
        header('Location: ./supplier_pending_order.php?error=Successfully Approving');
    }
} else {
    header('Location: ./supplier_pending_order.php');
}