<?php require APP . 'views/_templates/lang.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta content="initial-scale=1.0" name="viewport"/>
    <title>MMs Book Store</title>
	<link rel="stylesheet" href="/css/style.css" type="text/css" media="all" />
    <link rel="icon" type="image/ico" href="/css/images/favicon.ico">

	<!-- JS -->
	<script src="/js/jquery-1.4.1.min.js" type="text/javascript"></script>
	<script src="/js/jquery.jcarousel.pack.js" type="text/javascript"></script>
    <script src="/js/jquery-func.js" type="text/javascript"></script>
    <script src="/js/scripts.js" type="text/javascript"></script>
	<!-- End JS -->

</head>

<body>

	<!-- Shell -->
	<div class="shell">

		<!-- Header -->
		<div id="header">
            <h1 id="logo"><a href="/home"></a></h1>

			<!-- Cart -->
			<div id="cart">
				<a href="/cart" class="cart-link"><?php echo $lang['SHOPPING_CART']; ?></a>
				<div class="cl">&nbsp;</div>
				<span><?php echo $lang['SHOPPING_CART_ARTICLE']; ?>: <strong id="cartproducts">0</strong></span>
				<span>Total: <strong id="cartprice">0.00 CHF</strong></span>
			</div>
			<!-- End Cart -->

			<!-- Navigation -->
			<div id="navigation">
				<ul>
				<?php
                    $menuitems = ["home" => $lang['MENU_HOME'],
                    "product" => $lang['MENU_PRODUCTS'],
                    "account" => $lang['MENU_ACCOUNT'],
                    "contact" => $lang['MENU_CONTACT_US']];

                            foreach ($menuitems as $key => $value) {
                                $menuitem = strtolower($key);
                                if ($value === $sitename)
                                    echo "<li><a href=\"/$menuitem\" class=\"active\">$value</a></li>";
                                else
                                    echo "<li><a href=\"/$menuitem\">$value</a></li>";
                            }
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
            
