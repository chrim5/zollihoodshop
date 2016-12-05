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
                                echo "Herzlich Willkommen ".$_SESSION['username'];
                                echo '<a href="logout.php">logout</a>';
                            } else {
                        ?>
                                                <form action="login.php" method="post">
                                                    <label>Username or E-Mail</label><br/>
                                                    <input type="text" name="username" class="field" /><br />
                                                    <label>Password</label><br/>
                                                    <input type="password" name="password" class="field" />
                        <?php
                            }
                        ?>
					</div>
				</div>

				<!-- Search -->
				<div class="box search">
					<h2>Search by <span></span></h2>
					<div class="box-content">
						<form action="" method="post">

							<label>Keyword</label>
							<input type="text" class="field" />

							<label>Category</label>
							<select class="field">
                            <?php
                                require_once("application/models/category.class.php");
								$categories = Category::getCategories();
                                foreach ($categories as $key => $value) {
							        echo "<option value=\"\">$value</option>";
                                }
                            ?>
						</select>

							<div class="inline-field">
								<label>Price</label>
								<select class="field small-field">
								<option value="">$10</option>
							</select>
								<label>to:</label>
								<select class="field small-field">
								<option value="">$50</option>
							</select>
							</div>

							<input type="submit" class="search-submit" value="Search" />

							<p>
								<a href="#" class="bul">Advanced search</a><br />
								<a href="#" class="bul">Contact Customer Support</a>
							</p>

						</form>
					</div>
				</div>
				<!-- End Search -->

				<!-- Categories -->
				<div class="box categories">
					<h2>Categories <span></span></h2>
					<div class="box-content">
						<ul>
                            <?php
                                require_once("application/views/_templates/navigation.php");
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
						<li>
							<a href="#"><img src="css/images/harry_potter_und_das_verwunschene_kind_teil_eins_und_zwei_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/bauernleben_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/unsere_wunderbaren_jahre_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/mind_control_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/im_schatten_unserer_wuensche_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/schlafende_hunde_inspector_rebus_19_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/am_anderen_ende_der_nacht_die_china_trilogie_3_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/harry_potter_und_das_verwunschene_kind_teil_eins_und_zwei_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/bauernleben_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/unsere_wunderbaren_jahre_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/mind_control_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/im_schatten_unserer_wuensche_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/schlafende_hunde_inspector_rebus_19_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/am_anderen_ende_der_nacht_die_china_trilogie_3_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/harry_potter_und_das_verwunschene_kind_teil_eins_und_zwei_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/bauernleben_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/unsere_wunderbaren_jahre_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/mind_control_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/im_schatten_unserer_wuensche_small.jpg" alt="" /></a>
						</li>
						<li>
							<a href="#"><img src="css/images/schlafende_hunde_inspector_rebus_19_small.jpg" alt="" /></a>
						</li>
						<li class="last">
							<a href="#"><img src="css/images/am_anderen_ende_der_nacht_die_china_trilogie_3_small.jpg" alt="" /></a>
						</li>
					</ul>
				</div>
				<div class="more-nav">
					<a href="#" class="prev">previous</a>
					<a href="#" class="next">next</a>
				</div>
			</div>
			<!-- End More Products -->

			<!-- Text Cols -->
			<div class="cols">
				<div class="cl">&nbsp;</div>
				<div class="col">
					<h3 class="ico ico1">Donec imperdiet</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare
						dui.
					</p>
					<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
				</div>
				<div class="col">
					<h3 class="ico ico2">Donec imperdiet</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare
						dui.
					</p>
					<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
				</div>
				<div class="col">
					<h3 class="ico ico3">Donec imperdiet</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare
						dui.
					</p>
					<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
				</div>
				<div class="col col-last">
					<h3 class="ico ico4">Donec imperdiet</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet, metus ac cursus auctor, arcu felis ornare
						dui.
					</p>
					<p class="more"><a href="#" class="bul">Lorem ipsum</a></p>
				</div>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Text Cols -->

		</div>
		<!-- End Side Full -->

		<!-- Footer -->
		<div id="footer">
			<p class="left">
				<a href="#">Home</a>
				<span>|</span>
				<a href="#">Support</a>
				<span>|</span>
				<a href="#">My Account</a>
				<span>|</span>
				<a href="#">About us</a>
				<span>|</span>
				<a href="#">Contact</a>
				<span>|</span>
                <a href="index.php?lang=en"><img src="css/images/en.png" /></a>
				<span>|</span>
                <a href="index.php?lang=de"><img src="css/images/de.png" /></a>
			</p>
			<p class="right">
				&copy; 2016 MMs Book Store 
			</p>
		</div>
		<!-- End Footer -->

	</div>
	<!-- End Shell -->
</body>

</html>
