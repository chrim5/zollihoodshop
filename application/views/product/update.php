<form action="/product/update" method="post">
    Name:<br>
    <input type="text" name="name" value="<?php echo $item->name; ?>" required><br>
    Details:<br>
    <input type="text" name="details" value="<?php echo $item->details; ?>" required><br>
    Price:<br>
    <input type="number" name="price" value="<?php echo $item->price; ?>" required><br>
    Reduced Price:<br>
    <input type="number" name="reducedprice" value="<?php echo $item->reducedprice; ?>" required><br>
    Category:<br>
    <select name="category" required>
        <option selected="1" value="<?php echo $item->category; ?>">Choose one</option>
        <?php
        foreach($categories as $c) { ?>
            <option value="<?php echo $c->id?>"><?php echo $c->name ?></option>
            <?php
        } ?>
    </select>
    <input type="submit" value="Submit" class="search-submit">
</form>