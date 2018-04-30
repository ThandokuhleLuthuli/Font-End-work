<?php
include("connect.php");
?>
<a href="Dashboard.html">Go Back</a><br> <br>
<table>
<tr>
<th><h4>Id</h4> </th>
<th><h4>Email</h4></th>
<th><h4>Date Registred</h4></th>
</tr>
<?php

//fetching records
$record = mysqli_query($dbc,"SELECT * FROM user");
while($data=mysqli_fetch_array($record))
{
 ?>
    <tr>

   <td> <?php echo $data['Id']; ?></td>
   <td> <?php echo $data['email']; ?></td>
   <td> <?php echo $data['date']; ?></td>
   <td><a href="del.php?=Id<?php echo $date['Id'] ?>">  Delete </a></td>

    </tr>

   <?php 
}

?>
</table>