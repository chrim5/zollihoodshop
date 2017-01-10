this is the cart view
<table>
  <thead align="left" style="display: table-header-group">
  <tr>
     <th>Num </th>
     <th>Name</th>
     <th>Price</th>
     <th>Category</th>
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
<a href="cart/clear" class="button">Clear</a>
<?php
    if (!empty($cart))
        echo '<a href="cart/shippment" class="button">Order</a>';
?>
