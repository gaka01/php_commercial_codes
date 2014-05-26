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
<h1 class="h-text-1">WELCOME</h1>
<p class="text-1"><strong>Lorem Ipsum is simply</strong> dummy text of
the printing and typesetting industry. Lorem Ipsum has been the
industry's standard dummy text ever since the 1500s, when an unknown
printer took a galley of type and scrambled.</p>
<ul class="list-1">
  <li>Lorem Ipsum as their default model text</li>
  <li>There are many variations of passages</li>
  <li>Contrary to popular belief, Lorem Ipsum is not</li>
  <li>Many desktop publishing packages and web page</li>
  <li>There are many variations of passages</li>
</ul>
<p class="text-1">Lorem Ipsum is simply dummy text of the printing and
typesetting industry. Lorem Ipsum has been the industry's standard
dummy text ever since the 1500s, when an unknown printer took a galley
of type and scrambled it to make a type specimen book. It has survived
not only five centuries, but also the leap into electronic typesetting,
remaining essentially unchanged. It was popularised in the 1960s with
the release of Letraset sheets containing Lorem Ipsum passages,</p>
<p class="border-1">&nbsp;</p>
<h2 class="h-text-2">About us</h2>
<p class="text-1">There are many variations of passages of Lorem Ipsum
available, but the majority have suffered alteration in some form, by
injected humour, or randomised words which don't look even slightly
believable. If you are going to use a passage of Lorem Ipsum, you need
to be sure there isn't anything embarrassing hidden. There are many
variations of passages of Lorem Ipsum available, but the majority have
suffered.</p>
<p class="text-1">All the Lorem Ipsum generators on the Internet tend
to repeat predefined chunks as necessary, making this the first true
generator on the Internet. It uses a dictionary of over 200 Latin
words, combined with a handful of model sentence structures, to
generate Lorem Ipsum which looks reasonable. </p>
</div>
<div id="col-right">
<img src="images/jack.png"/>
</div>
</div>
</div>
</body>
</html>
