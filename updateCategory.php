<?php

session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ./login.php");
}


if(isset($_POST['cat_name'])){
    $name = $_POST['cat_name'];
    $conn = mysqli_connect('localhost', 'root', '', 'college_inv');
    if($_POST['update'] == '0' || $_POST['update'] == 0){
        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cat WHERE cat_name='$name'")) > 0){
        header('Location: ./category.php?error=Already Exist');
        }
        $result = mysqli_query($conn, "INSERT INTO cat VALUES (NULL,'$name')");

    if(!$result){
        header('Location: ./category.php?error=Error Inserting');
    }else{
        header('Location: ./category.php?error=Successfully Inserted');
    }
    
}else{
    $id = $_POST['update'];
    $name = $_POST['cat_name'];

    $result = mysqli_query($conn, "UPDATE cat SET cat_name = '$name' WHERE cat_id='$id'");

    if(!$result){
        header('Location: ./category.php?error=Error Updating');
    }else{
        header('Location: ./category.php?error=Successfully Updated');
    }    
}
}else{
    header('Location: ./category.php');
}