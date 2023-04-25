<?php

session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ./login.php");
}


if (isset($_POST['prod_id'])) {
    $prod_id = $_POST['prod_id'];
    $order_count = $_POST['order_count'];
    echo $prod_id;
    $conn = mysqli_connect('localhost', 'root', '', 'college_inv');

    $sup_id = (int) mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE prod_id='$prod_id' "))['sup_id'];
    $rate = (int) mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE prod_id='$prod_id' "))['rate'];
    $amount = (int) $rate * (int) $order_count;

    $result = mysqli_query($conn, "INSERT INTO orders (prod_id,order_count, amount, sup_id) VALUES ('$prod_id', '$order_count','$amount', '$sup_id')");

    if (!$result) {
        header('Location: ./order.php?error=Error Inserting');
    } else {
        header('Location: ./order.php?error=Successfully Inserted');
    }

} else {
    header('Location: ./order.php');
}

?>