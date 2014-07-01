<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<base href="<?=BASEURL?>" />

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Dedicated to delicious British Food @ Gordon&#39;s Crown</title>

<link rel="stylesheet" type="text/css" href="./media/css/screen.css" media="screen" />
<link rel="stylesheet" type="text/css" href="./media/css/print.css" media="print" />

<script type="text/javascript" src="./media/js/jquery.min.js"></script>

</head>
<body class="<?=CSS_CLASS?>"><!-- class corresponds to current navigation menu -->
	
	<div id="canvas">
		<div id="header">
			<h1>
				<a href="./" title="Gordon&#39;s Crown - Dedicated to delicious British Food">
					<img alt="Gordon&#39;s Crown - Dedicated to delicious British Food" src="./media/img/header.png" />
				</a>
			</h1>
		</div>
		<ul id="menu">
			<li class="home"><a href="./">Home</a></li>
			<li class="menu"><a href="./menu">Menu</a></li>
			<li class="contact"><a href="./contact">Contact</a></li>
			<?php if(!isset($_SESSION['login'])): ?>
			<li class="login"><a href="./auth/login">Login</a></li><!-- show when logged-off -->
			<?php else: ?>
			<li class="logout"><a href="./auth/logout">Logout</a></li> <!-- show when logged-in -->			
			<?php endif; ?>
		</ul>
		<div id="content">