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
<h1 class="h-text-1">Login form</h1>

<?php
$login = false;

if(!check_session()) {
	if(isset($_POST["username"]) && isset($_POST["password"])) {
		$user = $_POST["username"];
		$pass = $_POST["password"];
		
		if(sqlfilter($user) && sqlfilter($pass)) {
			$con=mysqli_connect("localhost","root","ilovesql","anelia");
			$result=mysqli_query($con,"SELECT * FROM users WHERE name = \"".$user."\"");
			while($row = mysqli_fetch_array($result)) {
				if ($row['name'] == $user && $row['password'] == md5($pass)) {
					$uid = $row['id'];
					$hpass = $row['password'];
					$login = true;
				}
			}
		}
	}

	if ($login) {
		$session =(intval(time()/3)).md5($_SERVER["REMOTE_ADDR"].$hpass);
		if (mysqli_query($con,"INSERT INTO sessions(id, session) VALUES(".$uid.",\"".$session."\") ON DUPLICATE KEY UPDATE session=VALUES(session)")) {
			setcookie("session",$uid."_".$session,time()+86400);
			echo "Login successfull";
			header("Location: index.php");
			
		}
		
		
	} else {
		if (isset($user) or isset($pass)) {
			echo "Invalid username or password";
		}
		echo file_get_contents("login.html");
	}
} else {
	header("Location: index.php");
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