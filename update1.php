<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    
</head>
<body>

<?php 

$id =$_GET['ID'];
    $conn=mysqli_connect('localhost','root','','signup');
    $record=mysqli_query($conn," SELECT * FROM `registration` WHERE id=$id");
    $row_count=mysqli_num_rows($record);
    $data=mysqli_fetch_array($record);
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto border border-success mt-3 ">
            
            <form action="" method="POST" enctype="multipart/form-data">
 <div class="mb-3">
 <p class="text-center fw-bold fs-3 text-success">Update</p>
 </div>
 <div class="mb-3">
  <label  class="form-label">Name</label>
  <input name="name" type="text" value="<?php echo $data['name'] ?>" class="form-control"  placeholder="Enter Name">
</div>
<div class="mb-3">
  <label  class="form-label">contact</label>
  <input name="contact" type="text" value="<?php echo $data['contact'] ?>"  class="form-control"  placeholder="Enter contact">
</div>
<div class="mb-3">
  <label  class="form-label">email</label>
  <input name="email" type="text" value="<?php echo $data['email'] ?>"  class="form-control"  placeholder="Enter email">
</div>
<div class="mb-3">
  <label  class="form-label">city</label>
  <input name="city" type="text" value="<?php echo $data['city'] ?>"  class="form-control"  placeholder="Enter city">
</div>
<div class="mb-3">
  <label  class="form-label">gender</label>
  <input name="gender" type="text" value="<?php echo $data['gender'] ?>"  class="form-control"  placeholder="Enter gender">
</div>
<div class="mb-3">
  <label  class="form-label">service</label>
  <input name="service" type="text" value="<?php echo $data['service'] ?>"  class="form-control"  placeholder="Enter service">
</div>
<div class="mb-3">
  <label  class="form-label">date</label>
  <input name="date" type="text" value="<?php echo $data['Date_assign'] ?>"  class="form-control"  placeholder="Enter date">
</div>
<div class="mb-3">
  <label  class="form-label">time</label>
  <input name="time" type="text" value="<?php echo $data['time_assign'] ?>"  class="form-control"  placeholder="Enter time">
</div>
<div class="mb-3">
  <label  class="form-label">meridiem</label>
  <input name="meridiem" type="text" value="<?php echo $data['meridiem'] ?>"  class="form-control"  placeholder="Enter meridiem">
</div>
<input type="hidden"name="ID" value="<?php echo $data['id'] ?>">
<button type="submit" name="update"  class="bg-success fs-4 fw-bold my-3 form-control text-white">Update</button>
</form>
  </div>
  </div>
</div>
                           <!---php update code-->
                            <?php
                            if(isset($_POST['update']))
                            {
                              $id=$_POST['ID'];
                                $name = $_POST['name'];  
                                $contact = $_POST['contact'];
                                $email =  $_POST['email'];
                                $city =  $_POST['city'];
                                $gender =  $_POST['gender'];
                                $service =  $_POST['service'];
                                $date =  $_POST['Date_assign'];
                                $time =  $_POST['time_assign'];
                                $meridiem =  $_POST['meridiem'];
              
                                $conn=mysqli_connect('localhost','root','','signup');
                                mysqli_query($conn,"UPDATE `registration` SET `name`='$name',
                                `contact`='$contact',`email`='$email',`city`='$city',`gender`='$gender',`service`='$service',`Date_assign`='$date',`time_assign`='$time',`meridiem`='$meridiem' WHERE id = $id");
                                header("location:userdata.php");
                            }
                            ?>
</body>
</html>