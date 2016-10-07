<?php require_once ('navigation.php') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>MMs Book Store</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

	<!-- JS -->
	<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
	<script src="js/jquery-func.js" type="text/javascript"></script>
	<!-- End JS -->

</head>

<body>

	<!-- Shell -->
	<div class="shell">

		<!-- Header -->
		<div id="header">
			<h1 id="logo"><a href="#">shoparound</a></h1>

			<!-- Cart -->
			<div id="cart">
				<a href="#" class="cart-link">Shopping cart</a>
				<div class="cl">&nbsp;</div>
				<span>Article: <strong>4</strong></span>
				<span>Total: <strong>250.00 CHF</strong></span>
			</div>
			<!-- End Cart -->

			<!-- Navigation -->
			<div id="navigation">
				<ul>
				<?php
					$menuitems = array("Index", "Support", "Account", "Contact");
                    Navigation::GenerateMenu($menuitems);
				?>
				</ul>
			</div>
			<!-- End Navigation -->
		</div>
		<!-- End Header -->

		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>

			<!-- Content -->
			<div id="content">
            
