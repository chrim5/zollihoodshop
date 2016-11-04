<?php $sitename = "Contact" ?>
<?php require_once ('ui/header.php') ?>


<?php require_once ('ui/footer.php') ?>

<script>
    $.get("dummy.php", function(data){
        console.log(data);
        $("#content").html(data);
    });
</script>
