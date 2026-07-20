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

$sql = "UPDATE `menus` 
        SET
        `menu_name`='$menu_name',
        `menu_price`='$menu_price',
        `menu_image`='$menu_image',
        `type_id`='$type_id' 
        WHERE menu_id = '$menu_id' ";

$result = mysqli_query($con, $sql);

if(!$result){
    echo "Error";
}else{
    header("location: ../index.php");
    exit;
}