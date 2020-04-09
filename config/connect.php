<?php
if(!defined('SECURITY')){
    die('Bạn không có quyền truy cập trang này!!!');
}
$connect= mysqli_connect('localhost','root','','mobile_shop');
if($connect){
    mysqli_query($connect,"SET NAMES 'utf8'");
}else{
    die('Không thể kết nối tới Database!!!');
}
?>