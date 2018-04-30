<?php
include("connect.php");
if(isset($_GET["email"]) && isset($_GET["token"]))
{
    $email=$dbc->real_escape_string($_GET["email"]);
    $token=$dbc->real_escape_string($_GET["token"]);

    $data=$dbc->query(" SELECT Id FROM user WHERE email='email' AND  token='$token'");
    $pw=$_POST["password"];
    //if the email exists, update the password

    if( $data->num_rows > 0)
        {
          $data=$dbc->query("UPDATE user SET password='$pw' WHERE email='$email'");
        }
        else
        {
        echo"Please Check Your Link";
        }

}
else
{
    header("location:Login.php");
    exit();
}



?>

<!doctype html>

<html>
 <head> 
     
 <title> Reset Password| Durban-Cypher </title>
 <link rel="stylesheet" href="DCcss.css" type="text/css"/>
</head>

 <body>
<!-- fieldsets #1 -->
<fieldset>
         <h2 class="fs-title">RESET YOUR PASSWORD</h2>
        <h3 class="fs-subtitle">We Told You Not To Worry :-)</h3>
        <input type="password" name="password" placeholder="New Password" />
     <input type="submit" name="reset" class="next action-button" value="Reset" />
</fieldset>
</form>
 </body>

</html>