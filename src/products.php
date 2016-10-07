<?php $sitename = "Support" ?>
<?php require_once ('header.php') ?>

Products
<?php
    echo mb_convert_encoding($_SERVER["QUERY_STRING"], 'UTF-8');
?>

<?php require_once ('footer.php') ?>
