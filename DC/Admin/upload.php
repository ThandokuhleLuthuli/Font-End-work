<?php

include("connect.php");

if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$desc = $_POST['description'];
	$explicit = $_POST['explicit'];
	$type = $_FILES['video']['type'];
	$ext = explode("/",$type);
	
	$rand = rand(0,999999999);
	$ntitle = $rand . $title.$rand;

	move_uploaded_file($_FILES['video']['tmp_name'], "DC/videos/".$ntitle.".".$ext[1]);

	$url ="http://".$_SERVER['HTTP_HOST']."DC/videos/".$ntitle.".".$ext[1];

	$sql ="INSERT INTO video(title, description, explicit, type, url) VALUES('$title', '$desc', '$explicit', '$type', '$url')";
	if(mysqli_query($dbc, $sql) == true){


		echo $title."has been uploaded.";
	}

	else
		echo "Something went wrong: ".mysql_error();
}
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<input type="text" name="title" placeholder="Video Title"><br>
<textarea cols="50" rows="10" name="description" placeholder="Video Description"></textarea><br>
<label> Explicit:</label> <select  name="explicit">
<option value="yes">Yes</option>
<option value="no">No</option>
</select><br>
<br> <label> Upload File: </labbel>&nbsp;  <input type="file" name="video" required> <br> <br>
<input type="submit" name="submit" value="upload">
</form>