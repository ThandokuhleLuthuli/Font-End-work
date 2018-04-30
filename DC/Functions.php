<?php
include("connect.php");

//This function looks for an email. it takes two arguments an email & database connection
function email_exists($email,$dbc)
{
$result=mysqli_query($dbc,"SELECT Id FROM user WHERE email='$email'");

if(mysqli_num_rows($result)==1)
{
return true;
}
else
{
return false;
}

}


function Logged_in()
{
    //if the session is started or if user is logged in
    if(isset($_SESSION['email']) || isset($_COOKIE['email']))
    {
        return true;
    }
    else
    {
         return false;
    }
}


?>
