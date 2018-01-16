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
        echo '        
            </ul>
        </div>
        <!-- FIXME generate slider-nav dynamically -->
        <div id="slider-nav">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
        </div>
    </div>';
    echo '
    <!-- End Content Slider -->

    <!-- Products -->
    <div class="products">
        <div class="cl">&nbsp;</div>
        <ul>';
            $i = 0;
            foreach ($p as $rows) {
                if(++$i > 4) break;
                echo '<li>';
                    echo '<a href="/product/category/' . $rows->category . '"><img src="/product/image/' . $rows->id . '"></a>';
                    echo '<div class="product-info">';
                        echo '<h3>' . $rows->name . '</h3>';
                        echo '<div class="product-desc">';
                            echo '<h4>New</h4>';
                            echo '<p>' . $rows->details . '<br /></p>';
                            echo '<strong class="price">' . $rows->price . ' CHF</strong>';
                        echo '</div>
                    </div>
                </li>';
                };
            echo '
        </ul>
        <div class="cl">&nbsp;</div>
    </div>
    <!-- End Products -->';
    ?>