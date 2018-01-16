    <!-- Content Slider -->
    <div id="slider" class="box">
        <div id="slider-holder">
            <ul>
                <?php
                require_once APP . 'models/product.php';
                $p = ProductObj::getProducts();
                foreach ($p as $rows) {
                    $hotprice = 0;
                    if($rows->reducedprice != null && $rows->reducedprice != 0) {
                        $hotprice = 100-100/$rows->price*$rows->reducedprice;
                    }
                    if ($rows->price != null && $hotprice >= 20) {
                        echo '<li class="last">';
                        echo '<a href="/product/category/' . $rows->category . '"><img src="/product/image/' . $rows->id . '" height="252"/></a>';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </div>
        <!-- FIXME generate slider-nav dynamically -->
        <div id="slider-nav">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
        </div>
        ?>
    </div>
    <!-- End Content Slider -->

    <!-- Products -->
    <div class="products">
        <div class="cl">&nbsp;</div>
        <ul>
            <li>
                <a href="#"><img src="css/images/harry_potter_und_das_verwunschene_kind_teil_eins_und_zwei.jpg" alt="" /></a>
                <div class="product-info">
                    <h3>LOREM IPSUM</h3>
                    <div class="product-desc">
                        <h4>New</h4>
                        <p>Lorem ipsum dolor sit<br />amet</p>
                        <strong class="price">$58.99</strong>
                    </div>
                </div>
            </li>
            <li>
                <a href="#"><img src="css/images/harry_potter_und_das_verwunschene_kind_teil_eins_und_zwei.jpg" alt="" /></a>
                <div class="product-info">
                    <h3>LOREM IPSUM</h3>
                    <div class="product-desc">
                        <h4>New</h4>
                        <p>Lorem ipsum dolor sit<br />amet</p>
                        <strong class="price">$58.99</strong>
                    </div>
                </div>
            </li>
            <li class="last">
                <a href="#"><img src="css/images/harry_potter_und_das_verwunschene_kind_teil_eins_und_zwei.jpg" alt="" /></a>
                <div class="product-info">
                    <h3>LOREM IPSUM</h3>
                    <div class="product-desc">
                        <h4>New</h4>
                        <p>Lorem ipsum dolor sit<br />amet</p>
                        <strong class="price">$58.99</strong>
                    </div>
                </div>
            </li>
        </ul>
        <div class="cl">&nbsp;</div>
    </div>
    <!-- End Products -->

