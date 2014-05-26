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
<h1 class="h-text-1">Registration form</h1>


<?php

if (!check_session()) {
	$registered = false;
	if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"]) && isset($_POST["email"])) {
			if($_POST["username"]!="" && $_POST["password"]!="" && $_POST["email"]!="" && $_POST["password"] == $_POST["password2"]) { 
			$user = $_POST["username"];
			$pass = $_POST["password"];
			$mail = $_POST["email"];
			$exists = false;
			
			if(sqlfilter($user) && sqlfilter($pass) && sqlfilter($mail)) {
				$con=mysqli_connect("localhost","root","ilovesql","anelia");
				$result=mysqli_query($con,"SELECT * FROM users WHERE name = \"".$user."\"");
				$row = mysqli_fetch_row($result);
				if($row != null) {
					$exists=true;
				}
				
				if(!$exists) {
					$result=mysqli_query($con,"SELECT t1.id+1 AS Missing FROM users AS t1 LEFT JOIN users AS t2 ON t1.id+1 = t2.id WHERE t2.id IS NULL ORDER BY t1.id LIMIT 1");
					$row=mysqli_fetch_array($result);
					$id = $row[0];
					
					if(mysqli_query($con,"INSERT INTO users(id,name,password,email) VALUES(".$id.",\"".$user."\",\"".md5($pass)."\",\"".$mail."\")")) {
						echo "Registration susccessfull please proceed to the <a href=\"login.php\">login</a> page.";
						$registered = true;
					}
					
				} else {
					echo "There's already a user with that username";
				}
			} else {
				echo "Please use only upper-case, lower-case characters and numbers.";
			}
		} else {
				echo "Please fill in all the fields.";
		}
	}
	
	if (!$registered) {
		echo file_get_contents("register.html");
	}
	
} else {
	header("Location: ./index.php");
}

?>



</div>
<div id="col-right">
<img src="images/jack.png"/>
</div>
</div>
</div>
</body>
</html>