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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style6.css">
    <title>Document</title>
</head>
<body>
    <div class="image">
        <img src="images/images/bookAppointment.jpg" alt="Nothing">
    </div>
    <div class="hppp">
        <h1>BOOK AN APPOINTMENT ONLINE</h1>
        <p>Our online bookings service operates between 10:00a.m. and 6:00p.m.</p>
        <p>During opening hours, we'll call you back within 1 hour to confirm your appointment. Outside opening hours we will call you soon after 10:00am</p>
        <p>Your data is safe with us! We will only use your details to process your salon booking, and won't share them with third parties.</p>
    </div>
    <div class="cont">
        <form action="connect2.php" method="post">
            <div class="register">
                <div class="row">
                    <ul class="Left">
                        <li><i class="fa fa-user" aria-hidden="true"></i><input type="text" required="" name="name" data-validation="required" data-validation-error-msg="Name is required" placeholder="Name*"></li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i><input type="number" required="" id="phone" name="contact" maxlength="10" data-validation="required" data-validation-error-msg="Contact is required" placeholder="Contact*"></li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><input type="email" required="" name="email" placeholder="Email Id*"></li><br>
                        <li class="half"><i class="fa fa-map-marker" aria-hidden="true"></i>
                            <select name="city" data-validation="required" required="" data-validation-error-msg="City is required" class="select">
                            <option value="" disabled selected >City*</option>
                            <option value="Gwalior">Gwalior</option>
                            <option value="Bhopal">Bhopal</option>
                            <option value="Indore">Indore</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <ul class="right">
                        <li><i class="fa fa-male" aria-hidden="true"></i>
                            <select name="gender" data-validation="required" required="" data-validation-error-msg="Services is required" id="gender" onchange="populate(this.id,'service')" class="select">
                            <option value="" disabled selected>Gender*</option>
                            <option value="Ladies">Ladies</option>
                            <option value="Gents">Gents</option>
                            </select>
                        </li><br>
                        <li><i class="fa fa-scissors" aria-hidden="true"></i>
                            <select name="service" id="service" class="select">
                            <option value="" disabled selected>service*</option>
                            </select>
                        </li><br>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i><input type="date" required="" name="date" data-validation="required" data-validation-error-msg="Preferred Date is required" placeholder="Preferred Date*" id="datepicker"></li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i><input type="text" required="" name="time" data-validation="required" data-validation-error-msg="Preferred Time is required" placeholder="Preferred Time*"/>
                            <select name="meridiem" id="meri">
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <button type="submit" class="submit">Book&nbsp;Appointment</button>
            <!-- <input type="submit" class="btn-solid" value="book Appointment"> -->
        </form>
    </div>
    <h3>If you want to see your previous booking data, just click on the button<h3>
    <button type="button" class="submit" onclick="document.location='userdata.php'">Your Appointment Details</button>
    <!-- <a class="btn-solid" href="userdata.php">Your Appointment Details</a> -->
    <script>
        function populate(s1,s2)
        {
            var s1 = document.getElementById("gender");
            var s2 = document.getElementById("service");
            s2.innerHTML = "";
            if(s1.value == "Ladies")
            {
                var optionArray = ['hair Cut|Hair Cut','ironing|Ironing','global colouring|Global Colouring','blow dry|Blow Dry','root touch up|Root Touch Up','shampoo & conditioning|Shampoo & Conditioning','head massage|Head Massage','roller setting|Roller Setting','oiling|Oiling','party make up|Party Make Up','engagement make up|Engagement Make Up','bridal & reception make up|Bridal & Reception Make Up','base make up|Base Make Up','eye make up|Eye Make Up','keratin|Keratin','smoothening|Smoothening','rebonding|Rebonding','perming|Perming','colour protection|Colour Protection','volumizing|Volumizing','advanced hair moisturising|Advanced Hair Moisturising','scalp treatments|Scalp Treatments','spa treatments|Spa Treatments','bleach|Bleach','luxury facials/rituals|Luxury Facials/Rituals','clean ups|Clean Ups','body polishing/rejuvenation|Body Polishing/Rejuvenation','threading|Threading','manicure|Manicure','spa pedicure|Spa Pedicure','pedicure|Pedicure','waxing|Waxing','spa manicure|Spa Manicure','nail paint|Nail Paint','nail art|Nail Art','nail filling|Nail Filling','Other|Other'];
            }
            else if(s1.value == "Gents")
            {
                var optionArray = ['Cut and Hair Care|Cut and Hair Care','Shampoo & Conditioning|Shampoo & Conditioning','Head Massage|Head Massage','Beard Styling|Beard Styling','Hair/Beard Colouring|Hair/Beard Colouring','Hair Colour (Ammonia & Ammonia Free)|Hair Colour (Ammonia & Ammonia Free)','Hi - Lites|Hi - Lites','Beard Colour|Beard Colour','Straighteninge|Straighteninge','Smoothening|Smoothening','Rebonding|Rebonding','Perming|Perming','Hair Spa|Hair Spa','Advanced Moisturising|Advanced Moisturising','Scalp Treatments|Scalp Treatments','Colour Protection|Colour Protection','Clean Ups|Clean Ups','Facials|Facials','Organic Treatments|Organic Treatments','Manicure|Manicure','Pedicure|Pedicure','Beard Trim|Beard Trim','Beard Colour|Beard Colour','Beard Styling|Beard Styling','Shave|Shave','Luxury Shave & Beard Spa|Luxury Shave & Beard Spa','Other|Other'];

            }
            for(var option in optionArray)
            {
                var pair = optionArray[option].split("|");
                var newoption = document.createElement("option");
                newoption.value = pair[0];
                newoption.innerHTML = pair[1];
                s2.options.add(newoption);
            }
        }
    </script>
</body>
</html>