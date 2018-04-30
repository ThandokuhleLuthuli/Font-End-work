<?php

//the session has to be started in ordder to be destroyed
session_start();
//end the session
session_destroy();
//end the cookie
setcookie("email",'',time()-3600);
//redirect
header("location:Login.php");

?>