<h1><?php echo $lang['SHOPPING_CART'];?>:</h1></br>
<table>
  <thead align="left" style="display: table-header-group; width: 100%">
  <tr>
     <th><?php echo $lang['SHOPPING_CART_COUNT'];?></th>
     <th><?php echo $lang['SHOPPING_CART_PRODUCT_NAME'];?></th>
     <th><?php echo $lang['SHOPPING_CART_PRICE'];?></th>
     <th><?php echo $lang['SHOPPING_CART_CATEGORY_NAME'];?></th>
  </tr>
  </thead>
<tbody>
<?php 
$total = 0;
foreach ($cart as $rows) :?>
  <tr class="item_row">
        <td> <?php echo $rows->id; ?></td>
        <td> <?php echo $rows->name; ?></td>
        <td> <?php echo $rows->price; ?></td>
        <td> <?php echo $rows->category; ?></td>
  </tr>
<?php endforeach;?>
</tbody>
</table>
<a href="/cart/clear" class="button">Clear</a>
<?php
    if (!empty($cart))
        echo '<a href="/cart/shipment" class="button">Order</a>';
?>
