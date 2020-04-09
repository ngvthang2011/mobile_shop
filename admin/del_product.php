<?php
session_start();
if(isset($_SESSION['mail']) && isset($_SESSION['mail'])){
    define('SECURITY', true);
    include_once('../config/connect.php');

    $prd_id=$_GET['prd_id'];
    $sql="DELETE FROM product WHERE prd_id=$prd_id";
    $query=mysqli_query($connect,$sql);

    header('location: index.php?page_layout=product');
}else{
    header('location: index.php');
}
?>