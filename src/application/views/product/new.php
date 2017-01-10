<form action="/product/create" method="post">
  Name:<br>
  <input type="text" name="name"><br>
  Details:<br>
  <input type="text" name="details"><br>
  Price:<br>
  <input type="text" name="price"><br>
  Reduced Price:<br>
  <input type="text" name="reducedprice"><br>
  Category:<br>
  <select name="category">
    <option selected="1">Choose one</option>
    <?php
foreach($categories as $c) { ?>
    <option value="<?php echo $c->id?>"><?php echo $c->name ?></option>
<?php
} ?>
  </select>
  <input type="submit" value="Submit" class="search-submit">
</form>
