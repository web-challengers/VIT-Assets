<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ./login.php");
}

if (isset($_GET['id'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "college_inv";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to delete a record
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE prod_id='$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ./products.php?error=Deleted Succesfully');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

}