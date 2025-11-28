<?php
 session_start();
 $conn = new mysqli('localhost','root');
 mysqli_select_db($conn,'signup');
 $email = $_POST['email']; 
 $password= $_POST['password'];

 // database connection

//  $conn = new mysqli('localhost','root','','signup');
$s="select *from info where email='$email' && pass='$password'";

$result=mysqli_query($conn,$s);
$num=mysqli_num_rows($result);
// if($num==1){
  $row=mysqli_fetch_array($result);
  if($row['email'] =='admin@gmail.com' && $row['pass'] == '#123admiN'){
    $_SESSION['user_id']=$row['id'];
  echo"<script>
    alert('Welcome Admin');
    window.location.href='admin.php';
    </script>";
  }
  elseif($num==1){
    $_SESSION['user_id']=$row['id'];
    $_SESSION['email']=$row['email'];
    echo"<script>
    alert('signin successfull');
    window.location.href='registration.php';
    </script>";
    }
    else{
     echo"<script>
         alert('invalid email/password');
         window.location.href='sign-in.html';
         </script>";
        }
 

?>