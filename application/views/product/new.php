<form action="/product/create" method="post">
  Name:<br>
  <input type="text" name="name" required><br>
  Details:<br>
  <input type="text" name="details" required><br>
  Price:<br>
  <input type="number" name="price" required><br>
  Reduced Price:<br>
  <input type="number" name="reducedprice" required><br>
  Category:<br>
  <select name="category" required>
    <option selected="1">Choose one</option>
    <?php
foreach($categories as $c) { ?>
    <option value="<?php echo $c->id?>"><?php echo $c->name ?></option>
<?php
} ?>
  </select>
  <input type="submit" value="Submit" class="search-submit">
</form>
