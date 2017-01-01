<div class="products">
<ul>
<?php 
$total = 0;
foreach ($products as $rows) :?>
    <li class="item">
        <div class="itemwrapper">
            <div class="leftiteminfo">
                <img src="/product/image/<?php echo $rows->id; ?>" width="130">
            </div>
            <div class="rightiteminfo">
<h2>
                <?php echo $rows->name; ?>
</h2>
                <?php echo $rows->price; ?>
                <a href="cart/add/<?php echo $rows->id; ?>">add to cart</a>
            </div>
        </div>
    </li>
<?php endforeach;?>
</ul>
</div>
