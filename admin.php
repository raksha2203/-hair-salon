<?php
session_start();
$conn = new mysqli('localhost','root');
mysqli_select_db($conn,'signup');
if(!isset($_SESSION['user_id'])){
    header("location:sign-in.html");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user details</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
    .submit{
            position: relative;
            top: 3rem;
            left: 73rem;
            border: 1px solid green;
            border-radius: 7px;
            margin: 0px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
//    include 'mystore.php';
    $conn=mysqli_connect('localhost','root','','signup');
    $record=mysqli_query($conn," SELECT * FROM `registration` ");
    $row_count=mysqli_num_rows($record);
    ?>
    <form action="logout.php">
            <!-- <nav class="sticky"> -->
                <!-- <h2 class="navtitle"><span>Ladies/Gents</span></h2> -->
                
                <input type="submit" class="submit" value="Log Out" >
            <!-- </nav> -->
    </form>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-10">
 
    <table class="table table-secondary table-bordred mt-3  text-center">
        <thead>
            <th>S.No.</th>
            <th>Name</th>
            <th>contact</th>
            <th>email</th>
            <th>city</th>
            <th>gender</th>
            <th>service</th>
            <th>date</th>
            <th>time</th>
            <th>meridiem</th>
            <th>booking date/time</th>
            
        </thead>
         <tbody class="text-center text-success">
            <?php
            $i=0;
           while( $row=mysqli_fetch_array($record))
           {
          echo " 
          <tr>
           <td> ";?><?php echo ++$i;?><?php echo "</td>
           <td>$row[name]</td>
           <td>$row[contact]</td>
           <td>$row[email]</td>
           <td>$row[city]</td>
           <td>$row[gender]</td>
           <td>$row[service]</td>
           <td>$row[Date_assign]</td>
           <td>$row[time_assign]</td>
           <td>$row[meridiem]</td>
           <td>$row[booking_datetime]</td>
           <td><a href='update.php ?ID=$row[user_id]' class='btn btn-outline-success'>update</a></td>
           <td><a href='delete.php ?ID=$row[user_id]' class='btn btn-outline-success'>Delete</a></td>
          </tr> ";
           }
            ?>
         </tbody>
        
    </table>
    </div>
    <div class="col-md-4 text-center">
        <h3 class="text-success">Total</h3>
        <h1 class="bg-success"><?php  echo $row_count ;       ?></h1>
    </div>
    </div>
    </div>
</body>
</html>