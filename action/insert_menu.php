<?php
// Report all PHP errors
error_reporting(E_ALL);

// Force errors to be displayed on the screen
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$menu_id = $_POST["menu_id"];
$menu_name = $_POST["menu_name"];
$menu_price = $_POST["menu_price"];
$menu_image = $_POST["menu_image"];
$type_id = $_POST["type_id"];

include "connect.php";

$sql = "INSERT INTO `menus`(`menu_id`, `menu_name`, `menu_price`, `menu_image`, `type_id`) VALUES ('$menu_id','$menu_name','$menu_price','$menu_image','$type_id')";

$result = mysqli_query($con, $sql);

if(!$result){
    echo "Error";
}else{
    header("location: ../index.php");
    exit;
}