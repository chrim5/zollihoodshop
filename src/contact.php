<?php $sitename = "Contact" ?>
<?php require_once ('header.php') ?>


<?php require_once ('footer.php') ?>

<script>
    $.get("dummy.php", function(data){
        console.log(data);
        $("#content").html(data);
    });
</script>
