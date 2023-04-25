<?php

session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ./login.php");
}


if(isset($_POST['prod_id'])){    
    $prod_id = $_POST['prod_id'];
    $order_count = $_POST['order_count'];

    $conn = mysqli_connect('localhost', 'root', '', 'college_inv');

    $sup_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sup_id FROM products WHERE prod_id='$prod_id' "))['sup_id'];
        $rate = mysqli_fetch_assoc(mysqli_query($conn, "SELECT rate FROM products WHERE prod_id='$prod_id' "))['rate'];
    $amount = $rate*$order_count;
    
    $result = mysqli_query($conn, "INSERT INTO orders (order_count, amount, sup_id, prod_id) VALUES ('$order_count', '$amount', '$sup_id', '$prod_id')");

    if(!$result){
        header('Location: ./order.php?error=Error Inserting');
    }else{
        header('Location: ./order.php?error=Successfully Inserted');
    }
 
}else{
    header('Location: ./order.php');
}