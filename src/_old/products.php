<?php $sitename = "Support" ?>
<?php require_once ('ui/header.php') ?>

Products

<?php
    require_once("classes/product.class.php");

    $selected_category = $_GET["category"];

    echo "<br>";
    echo $selected_category;
    echo "<br>";

    var_dump(Product::getProductsByCategory($selected_category));
?>

<?php require_once ('ui/footer.php') ?>
