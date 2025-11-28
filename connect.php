<?php
 session_start();
 $conn = new mysqli('localhost','root');
 mysqli_select_db($conn,'signup');
 $name = $_POST['name'];
 $email = $_POST['email']; 
 $username = $_POST['username'];
 $password = $_POST['password'];
 $cpassword = $_POST['cpassword'];

 // database connection

//  $conn = new mysqli('localhost','root','','signup');
$s="SELECT  * from info where username='$username'&& email='$email'";
$result=mysqli_query($conn,$s);
    $num=mysqli_num_rows($result);
    if($num==1){
      echo"<script>
      alert('Account already exist, please sign in!');
      window.location.href='sign-in.html';
      </script>";
    }elseif($password !== $cpassword){
      echo "<script>
      alert('Password Mismached');
      window.location.href='sign-up.html';
      </script>";
    }else{
      $q="INSERT INTO `info` (`name`, `email`, `username`, `pass`, `confirmpass`) VALUES ('$name' ,'$email','$username','$password','$cpassword')";
      mysqli_query($conn,$q);
      echo"<script>
            alert('signup successfull');
            window.location.href='sign-in.html';
            </script>";
 }
?>