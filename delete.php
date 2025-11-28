<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:sign-in.html");
    die();
}
$id=$_GET['ID'];
$conn = new mysqli('localhost','root');
mysqli_select_db($conn,'signup');
mysqli_query($conn,"DELETE FROM `registration` WHERE ID='$id'");
header("location:admin.php");
?>