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
<h1 class="h-text-1">Welcome<?php if(check_session()) echo ", ".current_username(); ?></h1>
<p class="text-1">We do things a little differently around here – and that’s what gives Jack Daniel’s its distinctive character. We charcoal mellow our whiskey drop by drop, then let it age in our own handcrafted barrels. And we don’t follow a calendar. Our Tennessee Sippin’ Whiskey is ready only when our tasters say it is. We use our senses, just like Jack Daniel himself did. In fact, more than a century later, our Tennessee Whiskey is still judged the same way. By the way it looks. By the way it smells. And, of course, by the way it tastes.</p>
</div>
<div id="col-right">
<img src="images/jack.png"/>
</div>
</div>
</div>
</body>
</html>