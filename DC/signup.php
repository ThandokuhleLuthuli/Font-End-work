<?php 
include("connect.php");
include("Functions.php");
if(Logged_in()==true)
{// when the user is logged in,it will be redirected to view.php
    header("location:view.php");
    //this meas it will not execute any script below that
    exit();
}


if(isset($_POST["signup"]))
{  $output="";
    $email=$_POST["email"];
    $password=$_POST["pass"];
    $confirm=$_POST["cpass"];
    $date= date("F,d Y");
    $terms=isset($_POST['terms']);
    if(strlen($password)<6 || strlen($password)>6)
    {
        $output="Please Make Sure The Length of Your Pasword is 6 Charatcters";
    }
    else if($password!==$confirm)
    {
         $output=" Please Make sure Both Passwords Match";
    }
     else if(email_exists($email,$dbc))
    {
        $output="This email is already registered";
    }
    else if(!$terms)
    {
        $output="Please Agree to Our terms & conditions";
    }
    else{
        $password=md5($password);
        $ins="INSERT INTO  user (email,password,confirmpassword,date) VALUES ('$email','$password','$confirm','$date')";
        if(mysqli_query($dbc,$ins))
        {
            $output="User Registered";
         //header("location:watch.php");
        }
        
       

    }
   
}


?>


<!doctype html>
<html>
<head>
 <meta charset="UTF-8">
 <meta name="Viewport" content="width=device-width,initial-scale=1.0">
 <meta http-eqiv="X-UA-Compatible" content="ie-edge">
<script src="FormValidation.js" type="text/javascript"></script>

 <title>Sign up | Durban Cypher</title>
 <link rel="stylesheet" href="DCcss.css" type="text/css"/>
</head>
<body>
<!--Navigation-->
<nav class="active">
        <ul>
            <li class="logo">
             Durban Cypher
            </li>
            <li>
            <a href="Login.php">LOGIN |</a>
            </li>
            <li>
             <a href="signup.php">SIGN UP |</a>
            </li>
            <li>
             <a href="">ABOUT US  | </a>
            </li>
            <li>
            <a href="">HOME | </a>
            </li>
        </ul>
    </nav> <br> <br> <br>
    <div style=" text-align:center; color:black; font-weigth:bold;"> <p> <?php echo $output;?> </p> </div>

<form id="msform" action="signup.php" method="post" onsubmit="return Validate()" > 
<!-- fieldsets #1 -->
<fieldset>
         <h2 class="fs-title">First Thing's First</h2>
        <h3 class="fs-subtitle">Register</h3>
        <input type="email" name="email" id="name" placeholder="Email" />
        <input type="password" name="pass"  id="pass" placeholder="Password" />
        <input type="password" name="cpass"  id="cpass" placeholder="Confirm Password" />
        <br><br>
            <input type="checkbox" name="terms"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="terms" style="padding-right:52px;font-family:arial, sans-serif; font-size:0.7em;"><a href="" style="text-decoration:none;color:black;" >I agree with the terms and conditons</a></label> 
            
     <input type="submit" name="signup" class="next action-button" value="Sign Up" onClick="return Validate()" />
</fieldset>
</form>
<br>
<footer>
<form action="signup.php" method="post" class="fform" >
    <fieldset>
        <h2 class="fs-title" >CONTACT US</h2>
        <h3 class="fs-subtitle">Email Us</h3>
        <input type="text" name="name" placeholder="Name"/>
        <input type="email" name="email" placeholder="Email" />
            <textarea name="message" placeholder="Your Message"></textarea>
            <br /><br />
            <input type="submit" name="submit" value="Send" />
        </fieldset>
</form> 

<h2 class="fs-title" >FIND US!</h2>
<div id="map"></div>
<script> 
function initMap(){
var uluru= {lat:-29.8579,lng:31.0292}
//new map
var map = new google.maps.Map(document.getElementById('map') , {  zoom:10,center:uluru});
// //new marker
var marker = new google.maps.Marker({
    position: uluru,
    map: map
  });
// //info window
var infoWindow= new google.maps.InfoWindow({ content:'<h1>Durban,South Africa</h1>'});
 marker.addListener('click',function(){ infoWindow.open(map,marker)});

}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARsQz1f6K13SkuhOU-QYrknLn3hwSDFBU&callback=initMap">
</script>

</footer>
</body>

</html>

