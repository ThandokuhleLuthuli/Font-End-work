<?php
include("connect.php");
if(isset($_POST['submit']))
{

$searchText = $_POST['txtSearch'];
$sql = mysqli_query($dbc, "SELECT * FROM video WHERE title LIKE '%$searchText%'");

echo "Search results for ".$searchText."<br>";

while($row = mysqli_fetch_array($sql)){
	$id = $row['vid_id'];
	$name = $row['title'];
	$desc = $row['description'];

	echo "<a href='http://".$_SERVER['HTTP_HOST']."Admin/watch.php?id=$id'>$name</a><br><p>$desc</p>";
}
}
?>
<form method="post" action="search.php">
<input type="text" name="txtSearch"/> &nbsp;&nbsp; <input type="submit" name="submit" value="Search" />
	

</form>