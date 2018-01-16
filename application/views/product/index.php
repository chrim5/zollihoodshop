<div class="products" id="productslist">
<ul>
<?php 
$total = 0;
foreach ($products as $rows) :?>
    <li class="item">
        <div class="itemwrapper">
            <div class="leftiteminfo">
                <img src="/product/image/<?php echo $rows->id; ?>" width="130">
                <?php
                    if ($_SESSION['admin']) {
                        echo '<a href="/product/addimage/' . $rows->id . '">change image</a></br>';
                        echo '<a href="/product/update/' . $rows->id . '">update product</a>';
                    }
                ?>
            </div>
            <div class="rightiteminfo">
                <h2><?php echo $rows->name; ?></h2>
                <h3><?php echo $rows->price; ?>.- CHF</h3>
                <p><?php echo $rows->details; ?></p>
                <?php
                    if ($_SESSION['username']) {
                    echo '<a href="/cart/add/' . $rows->id . '">add to cart</a>';
                    }
                ?>
            </div>
        </div>
    </li>
<?php endforeach;?>
</ul>
<?php
    if ($_SESSION['admin'])
        echo '<a href="/product/additem">new item</a>';
?>
</div>
