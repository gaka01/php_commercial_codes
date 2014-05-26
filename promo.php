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
<h1 class="h-text-1">WELCOME </h1>
<p class="text-1">



<?php
if(check_session()) {
	$con=mysqli_connect("localhost","root","ilovesql","anelia");
	$id = current_id();
	if (isset($_POST["promo"])) {
		$code = $_POST["promo"];
		$exists=false;
		
		$result=mysqli_query($con,"SELECT * FROM promocodes WHERE code = \"".$code."\"");
		$data=mysqli_fetch_row($result);
		
		if($data!=null) {
			if ($data[1]==0) {
				$result=mysqli_query($con,"INSERT INTO promocodes (code,id) VALUES (\"".$code."\",".$id.") ON DUPLICATE KEY UPDATE id = VALUES(id)");
				echo "Promo code Added successfully";
			} else if ($data[1]==$id) {
				echo "You have already entered that code.";
			} else {
				echo "Invalid promo code.";
			}
			
			
		} else {
			echo "Invalid promo code.";
		}
		
		
		
		
	}
	echo file_get_contents("promo.html");
	$result=mysqli_query($con,"SELECT * FROM promocodes WHERE id = ".$id);
	while($row = mysqli_fetch_array($result)) {
		echo "<p>".$row['code']."</p>";
	}
	
} else {
	echo "Please <a href=\"login.php\">login</a> first!";
}

?>



</p>
</div>
<div id="col-right">
<img src="images/jack.png"/>
</div>
</div>
</div>
</body>
</html>