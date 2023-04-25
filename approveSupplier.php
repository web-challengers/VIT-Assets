<?php

session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ./login.php");
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'college_inv');
    $result = mysqli_query($conn, "UPDATE supplier SET status = '1' WHERE sup_id='$id'");

    if (!$result) {
        header('Location: ./supplier.php?error=Error Approving');
    } else {
        header('Location: ./supplier.php?error=Successfully Approving');
    }
} else {
    header('Location: ./supplier.php');
}