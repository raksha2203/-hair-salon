<?php
session_start();
$conn = new mysqli('localhost','root');
mysqli_select_db($conn,'signup');

if(!isset($_SESSION['user_id'])){
  header("location:sign-in.html");
  die();
}
$user = $_SESSION['email'];
$query = mysqli_query($conn,"select * from info where email = '$user'");
$row = mysqli_fetch_array($query);

$id = $row['id'];
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email']; 
$city = $_POST['city'];
$gender = $_POST['gender'];
$service = $_POST['service'];
$date = $_POST['date'];
$time = $_POST['time'];
$meridiem = $_POST['meridiem'];

// database connection

//  $conn = new mysqli('localhost','root','','signup');
// $s="select *from info where name='$name'&& email='$email'";
// $result=mysqli_query($conn,$s);
//    $num=mysqli_num_rows($result);
//    if($num==1){
//      echo"<script>
//      alert('username already taken');
//      window.location.href='sign-up.html';
//      </script>";
//    }
  $q="INSERT INTO `registration` (`name`, `contact`, `email`, `city`, `gender`, `service`, `Date_assign`, `time_assign`, `meridiem`,`user_id`) VALUES ('$name' ,'$contact','$email','$city','$gender','$service','$date','$time','$meridiem','$id')";
  mysqli_query($conn,$q);
  echo"<script>
        alert('Booking successfull');
        window.location.href='userdata.php';
        </script>";
?>