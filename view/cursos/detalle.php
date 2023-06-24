<?php
    require 'view/header.php';
    require 'view/menu.php';
?>
<div class="container-fluid" id="contendorprincipal">
    <h1><?php echo $this->mensaje;?></h1>

    <form>
        <?php require 'form.php'; ?>
    </form>

</div>
<?php
    require 'view/footer.php';
?>
