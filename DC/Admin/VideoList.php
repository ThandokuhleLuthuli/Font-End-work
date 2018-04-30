<?php

include("connect.php");
?>
<a href="Dashboard.html">Go Back</a><br> <br>
<table>
<tr>
<th><h4>Id</h4> </th>
<th><h4>Video Title</h4></th>
<th><h4>Video Description</h4></th>
<th><h4>Explicit</h4></th>
<th><h4>Type</h4></th>
<th><h4>url</h4></th>
</tr>
<?php

//fetching records
$record = mysqli_query($dbc,"SELECT * FROM video");
while($data=mysqli_fetch_array($record))
{
 ?>
    <tr>

   <td> <?php echo $data['vid_id']; ?></td>
   <td> <?php echo $data['title']; ?></td>
   <td> <?php echo $data['description']; ?></td>
   <td> <?php echo $data['explicit']; ?></td>
   <td> <?php echo $data['type']; ?></td>
   <td> <?php echo $data['url']; ?></td>
   <td><a href="del.php?=Id<?php echo $date['vid_id'] ?>">Delete</a></td>

    </tr>

   <?php 
}

?>
</table>



