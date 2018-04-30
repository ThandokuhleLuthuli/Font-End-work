<?php

include("connect.php");
include("Functions.php");

if(Logged_in())
{
	echo "Welcome";

?>

<a href="Logout.php" style="float:right; text-decoration:none; color:black; padding:10px; margin-right:40px; ">Logout</a>
<?php
} 
else 
{
 header("location:Login.php");
 exit();
}



?>
<form method="post" action="search.php">
	<input type="search" cols="100" name="txtSearch" required >
	<input  type="submit" name="submit" value="Search">
</form> 
<?php

include("connect.php");

$query = mysqli_query($dbc,"SELECT * FROM video");

while($row = mysqli_fetch_array($query)){
	$id = $row['vid_id'];
	$name = $row['title'];
	$desc = $row['description'];
	$url = $row['url'];
	$type = $row['type'];

	if($row['explicit'] == "yes")
		$explicit = "(Explicit)";

	else 
		$explicit ="";

	echo "<h3>$name$explicit</h3>";
	//echo "<embed src='$url' width='640' height='320'></embed>";
	echo "<video width='640' height='320' controls='false' ><source src='$url' type='$type'></video> ";
	echo "<br><p>$desc</p><br><hr>";
}


?>