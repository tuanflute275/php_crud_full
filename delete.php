<?php
include_once 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM product WHERE id = '$id'";
if(mysqli_query($conn, $sql)){
    header('Location: index.php');
}else{
    echo mysqli_error($conn);
}

?>