


<?php
include("connect.php");

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$sql = mysqli_query($dbc, "SELECT * FROM video WHERE vid_id='$id'");

	while($row = mysqli_fetch_assoc($sql))
	{
	$name = $row['title'];
	$desc = $row['description'];
	$url = $row['url'];
	$type = $row['type'];


	if($row['explicit'] == "yes")
		$explicit = "(Explicit)";

	else 
		$explicit ="";
}

	echo "<h3>$name$explicit</h3>";
	//echo "<embed src='$url' width='640' height='320'></embed>";
	echo "<video width='640' height='320' controls='false' autoplay ><source src='$url' type='$type'></video> ";
	echo "<br><p>$desc</p>";
}

else
	echo "Video not found";


?>