<?php $sitename = "Support" ?>
<?php require_once ('ui/header.php') ?>

support
<?php 
    require_once("db.php");
    $db = DB::getInstance();
    $db->getConnection();
 ?>


<?php require_once ('ui/footer.php') ?>