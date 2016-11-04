<?php $sitename = "Support" ?>
<?php require_once ('ui/header.php') ?>

support
<?php 
    require_once("classes/category.class.php");
    var_dump(Category::getCategories());
 ?>


<?php require_once ('ui/footer.php') ?>