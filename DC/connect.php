<?php
//database connection string
$dbc=mysqli_connect("localhost","root","Luthuli@96","dc");
//error handling
if(mysqli_connect_errno())
{
	echo"Failure to Connect to Database".mysqli_connect_errno();
}
?>