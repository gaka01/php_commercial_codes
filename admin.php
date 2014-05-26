<html>
<head>
  <meta charset="UTF-8">
  <title>Jack Daniels</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="container">
<div id="header">
</div>
<div id="nav">
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="promoinfo.php">Promotion</a></li>
  
  
  
<?php
include("functions.php");
if (!check_session()) {
	echo "<li><a href=\"login.php\"> Login </a></li>";
	echo "<li><a href=\"register.php\"> Register </a></li>";
} else {
	echo "<li><a href=\"promo.php\"> Promo Entry </a></li>";
	echo "<li><a href=\"logout.php\"> Logout </a></li>";
	if (is_moderator()) {
		echo "<li><a href=\"admin.php\"> Admin panel </a></li>";
	}
}
?>

</ul>
</div>
<div id="site-content">
<div id="col-left">
<p class="text-1">

<?php
if(check_session() && is_moderator()) {
	if (isset($_POST['button'])) {
		$con=mysqli_connect("localhost","root","ilovesql","anelia");
		$result=mysqli_query($con,"SELECT * FROM promocodes WHERE id != 0");
		$array=[];
		while($row = mysqli_fetch_array($result)) {
			$array[] = $row;
		}
		$rand=rand(0,count($array)-1);
		$result=mysqli_query($con,"SELECT * FROM users WHERE id = \"".$array[$rand]['id']."\"");
		$user=mysqli_fetch_row($result);
		echo "<strong>Winner:</strong> ".$user[1]." email:".$user[3];
	}
} else {
	header("Location: ./index.php");
}

?>


<form method="POST" action="admin.php">
<input type="submit" name="button" value="Chose a winner">
</form>



</p>
</div>
</div>
</div>
</body>
</html>