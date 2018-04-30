<?php
include("connect.php");
if(isset($_POST["fp"]))
{
$email=$dbc->real_escape_string($_POST["email"]);
$data=$dbc->query(" SELECT Id FROM user WHERE email='$email' ");
$output="";

//if the email exists , generate a random string and send it as an email else return an error message

    if( $data->num_rows > 0)
    {
        $str="012345679qwertyzxcvbnm";
        $str=str_shuffle($str);
        $str=substr($str,0,10 );
        $url="http://localhost:1234/DC/ResetPassword.php?token=$str&email=$email";
         mail($email,"Reset Password","To reset ypur password, click on this link:$url","From:thandokluthuli@gmail.com\r\n");
         $dbc->query("UPDATE user SET token='$str' WHERE='$email'");
         echo "<b>Please Check Your Email</b>";
    }
    else
    {
     $output= "<b> This Email Does Not Exist </b>"       ;
    }



}

?>



<!doctype html>

<html>
 <head> 
     
 <title> Forgot Password| Durban-Cypher </title>
 <link rel="stylesheet" href="DCcss.css" type="text/css"/>
</head>

 <body>
   <div id="pw" class="pw"> <h2 class="fs-title">Looks like you have a problem</h2>  </div>  
   <div><p> <?php echo $output;?></P> </div>
 <form id="msform" action="ForgotPassword.php" method="post">
<!-- fieldsets #1 -->
<fieldset>
         <h2 class="fs-title">Forgot Your Password?</h2>
        <h3 class="fs-subtitle">Don't Sweat :-)</h3>
        <input type="email" name="email" placeholder="Email" />
     <input type="submit" name="fp" class="next action-button" value="Send" />
</fieldset>
</form>
 </body>

</html>


