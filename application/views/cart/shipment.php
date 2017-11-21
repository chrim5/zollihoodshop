<b>Your order details:</b>
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
<br />
<b>Delivery choice:</b>
<br />
<form id="order-form" action="/cart/order" method="post" onsubmit="return myFunction()">
    <input type="radio" name="shipment" value="Post Priority" required>Post Priority<br />
    <input type="radio" name="shipment" value="Express (1 Day delivery)" required>Express (1 Day delivery)<br />
    <input type="radio" name="shipment" value="DHL" required>DHL<br />
    <input type="submit" class="search-submit" value="Order">
</form>
<p id="order-confirm"></p>

<script>
    function myFunction() {
        var x;
        if (confirm("Please confirm your order!") == true) {
            x = "Order confirmed!!";
        } else {
            x = "You pressed Cancel!";
            return false;
            event.preventDefault();
        }
        document.getElementById("order-confirm").innerHTML = x;
    }
</script>