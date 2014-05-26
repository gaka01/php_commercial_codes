<?php
include("functions.php");

if (check_session()) {
	$con=mysqli_connect("localhost","root","ilovesql","anelia");
	mysqli_query($con,"DELETE FROM sessions WHERE id=".explode("_",$_COOKIE['session'])[0]);
	setcookie("session","",time()-3600);
	echo "you logged out";
}
header("Location: ./index.php");


?>