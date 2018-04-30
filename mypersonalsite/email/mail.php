 <?php

$name= $_POST["name"];
$email=$_POST["email"];
$message=$_POST["message"];

$to='Thandokluthuli@gmail.com';
$subject"Your Personal Site contact form";
$msg=$name."".$email."".$message;
mail($to,$subject,$message);
echo"Your Emal Was Sent Successfully";
?>