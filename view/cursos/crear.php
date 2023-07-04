<?php
    require 'view/header.php';
    require 'view/menu.php';
?>

<div class="container-fluid" id="contendorprincipal">    
    <h1><?php echo $this->mensaje;?></h1>

    <?php if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true): ?>
        <form class="form-control" action="<?php echo constant('URL'); ?>cursos/insertarcurso" method="POST">
            <?php require 'form.php'; ?>
        </form>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            No tienes permiso para acceder a esta página. Inicia sesión primero.
        </div>
    <?php endif; ?>
</div>

<?php require 'view/footer.php'; ?>

