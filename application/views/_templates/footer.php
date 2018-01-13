            </div>
            <!-- End Content -->
        	<!-- Sidebar -->
			<div id="sidebar">

				<!-- Login -->
				<div class="box login">
					<h2>Login<span></span></h2>
					<div class="login-content">
                        <?php
                            if (isset($_SESSION['username'])) {
                                echo "Herzlich Willkommen ".$_SESSION['firstname'];
                                echo '<br /> <a href="/user/logout" class="button">'. $lang['LOGIN_LOGOUT'] .'</a>';
                            } else {
                        ?>
                            <form action="/user/login" method="post">
                                <label><?php echo $lang['LOGIN_USER']; ?></label><br/>
                                <input type="text" name="username" class="field" required /><br />
                                <label><?php echo $lang['LOGIN_PASS']; ?></label><br/>
                                <input type="password" name="password" class="field" /><br />
                                <input type="submit" value="Login" class="search-submit" />
                            </form>
                        <?php
                                echo '<a href="/user/register">'. $lang['LOGIN_REGISTER'] .'</a>';
                            }
                        ?>
					</div>
				</div>

				<!-- Search -->
				<div class="box search">
					<h2><?php echo $lang['SEARCH_TITLE']; ?><span></span></h2>
					<div class="box-content">
						<form action="/product/search" method="post">

							<label><?php echo $lang['SEARCH_KEYWORD']; ?></label>
							<input type="text" name="term" class="field" />

							<label><?php echo $lang['SEARCH_CAT']; ?></label>
							<select class="field">
                            <?php
                                require APP . 'models/category.class.php';
								$categories = Category::getCategories();
                                foreach ($categories as $key => $value) {
							        echo "<option value=\"\">$value</option>";
                                }
                            ?>
							</div>
							<input type="submit" class="search-submit" value=<?php echo $lang['SEARCH']; ?> />
						</form>
					</div>
				</div>
				<!-- End Search -->

				<!-- Categories -->
				<div class="box categories">
					<h2><?php echo $lang['CATEGORY']; ?><span></span></h2>
					<div class="box-content">
						<ul>
                            <?php
                                require APP . 'views/_templates/navigation.php';
								$categories = Category::getCategories();
                                Navigation::GenerateCategoryList($categories);
                            ?>
						</ul>
					</div>
				</div>
				<!-- End Categories -->

			</div>
			<!-- End Sidebar -->

			<div class="cl">&nbsp;</div>
		</div>
		<!-- End Main -->

		<!-- Side Full -->
		<div class="side-full">

			<!-- More Products -->
			<div class="more-products">
				<div class="more-products-holder">
					<ul>
                        <?php
                            require_once APP . 'models/product.php';
                            $p = ProductObj::getProducts();
                            $numItems = count($p);
                            $i = 0;
                            if (is_array($p)) {
                                foreach ($p as $rows) {
                                    if (++$i === $numItems) {
                                        echo '<li class="last">';
                                        echo '<a href="/product/category/' . $rows->category . '"><img src="/product/image/' . $rows->id . '" width="100" height="160"/></a>';
                                        echo '</li>';
                                    } else {
                                        echo '<li>';
                                        echo '<a href="/product/category/' . $rows->category . '"><img src="/product/image/' . $rows->id . '" width="100" height="160"/></a>';
                                        echo '</li>';
                                        echo "\n";
                                    }
                                }
                            }
                            ?>
					</ul>
				</div>
				<div class="more-nav">
					<a href="#" class="prev">previous</a>
					<a href="#" class="next">next</a>
				</div>
			</div>
			<!-- End More Products -->
		</div>
		<!-- End Side Full -->

		<!-- Footer -->
		<div id="footer">
			<p class="left">
                <?php
                $footerlinks = ["home" => $lang['FOOTER_HOME'],
                    "account" => $lang['FOOTER_ACCOUNT'],
                    "contact" => $lang['FOOTER_CONTACT_US']];

                foreach ($menuitems as $key => $value) {
                    $menuitem = strtolower($key);
                    echo "<a href=\"/$menuitem\">$value</a>";
                    echo '<span>|</span>';
                }
                ?>
                <a href="application/views/_templates/lang.php?lang=en"><img src="/css/images/en.png" /></a>
				<span>|</span>
                <a href="application/views/_templates/lang.php?lang=de"><img src="/css/images/de.png" /></a>
			</p>
			<p class="right">
				&copy; 2018 Zollihood Shop
			</p>
		</div>
		<!-- End Footer -->

	</div>
	<!-- End Shell -->
</body>

</html>
