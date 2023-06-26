<?php
    require 'view/header.php';
    require 'view/menu.php';
?>
<div class="container-fluid" id="contendorprincipal">    
    <h1><?php echo $this->mensaje;?></h1>
    <div><?php echo $this->mensajeResultado;?></div>
    <form class="form-control" action="<?php echo constant('URL'); ?>estudiante/actualizarestudiantes" method="POST">
        <?php require 'form.php'; ?>
    </form>
</div>
<?php
    require 'view/footer.php';
?>