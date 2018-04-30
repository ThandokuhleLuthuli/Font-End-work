<?php
include("connect.php");
//fetch record by id
$id= $_GET['Id'];
if(isset($_POST["submit"]))

 $delete= mysqli_query($dbc,"DELETE FROM `user` WHERE id='$id'");
 header("locaton:MemberList.php");
 

?>
<input type="submit" name="submit" value="Delete Member" return="Confirm('Are You Sure?')" />